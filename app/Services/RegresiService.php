<?php

namespace App\Services;

use App\Models\Regresi;
use App\Services\Contracts\RegresiContract;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class RegresiService implements RegresiContract
{
        /**
         * @var
         */
        protected $model, $regresi, $sum, $new_regresi, $prediction;

        public function __construct($tahun = '2019', $orderBy = 'score')
        {
                $this->model = Regresi::whereNotNull('id')->where('tahun', $tahun)->orderBy($orderBy, 'desc');
        }

        public function paginated(int $per_page)
        {
                $data = $this->model
                        ->paginate($per_page);

                return $data;
        }

        public function data(int $per_page = 5)
        {
                $data = $this->model->get();

                $regresi = [];

                //! Regresi Linier Berganda 
                //? x1 = ekonomi
                //? x2 = kesehatan
                //? x3 = kebebasan
                //? y = score
                foreach ($data as $value) {
                        $regresi[$value->negara->nama]['negara'] = $value->negara->nama;
                        $regresi[$value->negara->nama]['x1y'] = $value['ekonomi'] * $value['score'];
                        $regresi[$value->negara->nama]['x2y'] = $value['kesehatan'] * $value['score'];
                        $regresi[$value->negara->nama]['x3y'] = $value['kebebasan'] * $value['score'];

                        $regresi[$value->negara->nama]['x1x2'] = $value['ekonomi'] * $value['kesehatan'];
                        $regresi[$value->negara->nama]['x1x3'] = $value['ekonomi'] * $value['kebebasan'];
                        $regresi[$value->negara->nama]['x2x3'] = $value['kesehatan'] * $value['kebebasan'];

                        $regresi[$value->negara->nama]['x1_2'] = $value['ekonomi'] * $value['ekonomi'];
                        $regresi[$value->negara->nama]['x2_2'] = $value['kesehatan'] * $value['kesehatan'];
                        $regresi[$value->negara->nama]['x3_2'] = $value['kebebasan'] * $value['kebebasan'];
                        $regresi[$value->negara->nama]['y_2'] = $value['score'] * $value['score'];
                }

                $this->regresi = $regresi;

                $regresi = $this->ArrToCollection($regresi, $per_page);

                return $regresi;
        }

        public function sum()
        {
                $data = $this->model->get();
                $regresi = $this->regresi;

                $sum = [];


                foreach ($data as $value) {
                        $sum['x1'] = isset($sum['x1']) ? $sum['x1'] + $value['ekonomi'] : $value['ekonomi'];
                        $sum['x2'] = isset($sum['x2']) ? $sum['x2'] + $value['kesehatan'] : $value['kesehatan'];
                        $sum['x3'] = isset($sum['x3']) ? $sum['x3'] + $value['kebebasan'] : $value['kebebasan'];
                        $sum['y'] = isset($sum['y']) ? $sum['y'] + $value['score'] : $value['score'];
                }

                foreach ($regresi as $value) {
                        $sum['x1y'] = isset($sum['x1y']) ? $sum['x1y'] + $value['x1y'] : $value['x1y'];
                        $sum['x2y'] = isset($sum['x2y']) ? $sum['x2y'] + $value['x2y'] : $value['x2y'];
                        $sum['x3y'] = isset($sum['x3y']) ? $sum['x3y'] + $value['x3y'] : $value['x3y'];

                        $sum['x1x2'] = isset($sum['x1x2']) ? $sum['x1x2'] + $value['x1x2'] : $value['x1x2'];
                        $sum['x1x3'] = isset($sum['x1x3']) ? $sum['x1x3'] + $value['x1x3'] : $value['x1x3'];
                        $sum['x2x3'] = isset($sum['x2x3']) ? $sum['x2x3'] + $value['x2x3'] : $value['x2x3'];

                        $sum['x1_2'] = isset($sum['x1_2']) ? $sum['x1_2'] + $value['x1_2'] : $value['x1_2'];
                        $sum['x2_2'] = isset($sum['x2_2']) ? $sum['x2_2'] + $value['x2_2'] : $value['x2_2'];
                        $sum['x3_2'] = isset($sum['x3_2']) ? $sum['x3_2'] + $value['x3_2'] : $value['x3_2'];
                        $sum['y_2'] = isset($sum['y_2']) ? $sum['y_2'] + $value['y_2'] : $value['y_2'];
                }

                $this->sum = $sum;

                return $sum;
        }

        public function regresi()
        {
                $data = $this->model->get();
                $sum = $this->sum;

                $new_regresi = [];

                foreach ($data as $value) {
                        $new_regresi['x1y'] = $sum['x1y'] - $this->divZero(($sum['x1'] * $sum['y']), count($data));
                        $new_regresi['x2y'] = $sum['x2y'] - $this->divZero(($sum['x2'] * $sum['y']), count($data));
                        $new_regresi['x3y'] = $sum['x3y'] - $this->divZero(($sum['x3'] * $sum['y']), count($data));

                        $new_regresi['x1x2'] = $sum['x1x2'] - $this->divZero(($sum['x1'] * $sum['x2']), count($data));
                        $new_regresi['x1x3'] = $sum['x1x3'] - $this->divZero(($sum['x1'] * $sum['x3']), count($data));
                        $new_regresi['x2x3'] = $sum['x2x3'] - $this->divZero(($sum['x2'] * $sum['x3']), count($data));

                        $new_regresi['x1_2'] = $sum['x1_2'] - $this->divZero(($sum['x1'] * $sum['x1']), count($data));
                        $new_regresi['x2_2'] = $sum['x2_2'] - $this->divZero(($sum['x2'] * $sum['x2']), count($data));
                        $new_regresi['x3_2'] = $sum['x3_2'] - $this->divZero(($sum['x3'] * $sum['x3']), count($data));
                        $new_regresi['y_2'] = $sum['y_2'] - $this->divZero(($sum['y'] * $sum['y']), count($data));

                        $new_regresi['b1'] = $this->divZero(($new_regresi['x2_2'] * $new_regresi['x1y'] - $new_regresi['x1x2'] * $new_regresi['x2y']), ($new_regresi['x1_2'] * $new_regresi['x2_2'] - $new_regresi['x1x2'] * $new_regresi['x1x2']));
                        $new_regresi['b2'] = $this->divZero(($new_regresi['x1_2'] * $new_regresi['x2y'] - $new_regresi['x1x2'] * $new_regresi['x1y']), ($new_regresi['x1_2'] * $new_regresi['x2_2'] - $new_regresi['x1_2'] * $new_regresi['x1_2']));
                        $new_regresi['b3'] = $this->divZero(($new_regresi['x1x2'] * $new_regresi['x3y'] - $new_regresi['x1x3'] * $new_regresi['x2y'] + $new_regresi['x1x3'] * $new_regresi['x2x3'] - $new_regresi['x2x3'] * $new_regresi['x1x2']), ($new_regresi['x1_2'] * $new_regresi['x2_2'] * $new_regresi['x3_2'] - pow($new_regresi['x1x2'], 2) * $new_regresi['x3_2'] - $new_regresi['x1_2'] * pow($new_regresi['x2x3'], 2) + 2 * $new_regresi['x1x2'] * $new_regresi['x1x3'] * $new_regresi['x2x3'] - pow($new_regresi['x1x3'], 2) * $new_regresi['x2_2'] + pow($new_regresi['x1x2'], 2) * $new_regresi['x2_2'] + pow($new_regresi['x1x3'], 2) * $new_regresi['x1_2']));
                        $new_regresi['a'] = $this->divZero($sum['y'] - $new_regresi['b1'] * $sum['x1'] - $new_regresi['b2'] * $sum['x2'] - $new_regresi['b3'] * $sum['x3'], count($data));
                        $new_regresi['r'] = $this->divZero(($new_regresi['x1y'] * $new_regresi['x2y'] * $new_regresi['x3y']), (sqrt($new_regresi['x1_2'] * $new_regresi['x2_2'] * $new_regresi['x3_2']) * sqrt($new_regresi['y_2'])));
                }


                $this->new_regresi = $new_regresi;

                return $new_regresi;
        }

        public function prediction(int $per_page)
        {
                $data = $this->model->get();
                $new_regresi = $this->new_regresi;

                $prediction = [];

                foreach ($data as $value) {
                        $prediction[] = [
                                'nama' => $value->negara->nama,
                                'flag' => $value->negara->flag,
                                'prediction_score' => $new_regresi['a'] + $new_regresi['b1'] * $value->ekonomi + $new_regresi['b2'] * $value->kesehatan + $new_regresi['b3'] * $value->kebebasan,
                                'prediction_ekonomi' => $new_regresi['b1'] * $value->ekonomi,
                                'prediction_kesehatan' => $new_regresi['b2'] * $value->kesehatan,
                                'prediction_kebebasan' => $new_regresi['b3'] * $value->kebebasan,
                        ];
                }
                // Sort by score
                usort($prediction, function ($a, $b) {
                        return (float) $b['prediction_score'] <=> (float) $a['prediction_score'];
                });

                $this->prediction = $prediction;

                // Paginate prediction
                $prediction = $this->ArrToCollection($prediction, $per_page);

                return $prediction;
        }

        public function getStatistic()
        {
                $prediction = $this->prediction;

                $data = [];
                $categori = [];

                foreach ($prediction as $value) {
                        $categori[] = $value['nama'];
                        $data[] = $value['prediction_score'];
                }

                return [
                        'categori' => $categori,
                        'data' => $data,
                ];
        }

        public function divZero($x, $y)
        {
                if ($y == 0) {
                        return 0;
                } else {
                        return $x / $y;
                }
        }

        protected function ArrToCollection($items, $perPage = 10, $page = null, $options = [])
        {
                $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
                $items = $items instanceof Collection ? $items : Collection::make($items);
                return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
        }
}
