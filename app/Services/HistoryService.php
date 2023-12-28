<?php

namespace App\Services;

use App\Models\Regresi;
use App\Services\BaseRepository;
use App\Services\Contracts\HistoryContract;
use Illuminate\Support\Facades\DB;

class HistoryService extends BaseRepository implements HistoryContract
{
        /**
         * @var
         */
        protected $model;

        public function __construct(Regresi $data)
        {
                $this->model = $data->whereNotNull('id');
        }

        public function paginated(array $request)
        {
                $data = $this->model
                        ->when($request['tahun'], function ($query) use ($request) {
                                return $query->where('tahun', $request['tahun']);
                        })
                        ->when($request['negara'], function ($query) use ($request) {
                                return $query->where('negara_id', $request['negara']);
                        })
                        ->when($request['query'], function ($query) use ($request) {
                                return $query->where('tahun', 'like', '%' . $request['query'] . '%')
                                        ->orWhere('ekonomi', 'like', '%' . $request['query'] . '%')
                                        ->orWhere('kesehatan', 'like', '%' . $request['query'] . '%')
                                        ->orWhere('kebebasan', 'like', '%' . $request['query'] . '%');
                        })
                        ->orderBy($request['sort_field'], $request['sort'])
                        ->paginate($request['per_page']);

                return $data;
        }

        /**
         * Store Data
         */
        public function store(array $request)
        {
                $data = $this->model->create([
                        'negara_id' => $request['negara_id'],
                        'tahun' => $request['tahun'],
                        'ekonomi' => $request['ekonomi'],
                        'kesehatan' => $request['kesehatan'],
                        'kebebasan' => $request['kebebasan'],

                ]);

                // Check if data is created
                if (!$data) {
                        throw new \Exception("History Gagal Dibuat", 400);
                }

                // data created
                return $data;
        }

        /**
         * Update Data By ID
         */
        public function update(array $request, $id)
        {
                $dataOld = $this->model->find($id);

                $dataNew = [];

                $dataNew['negara_id'] = $request['negara_id'];
                $dataNew['tahun'] = $request['tahun'];
                $dataNew['ekonomi'] = $request['ekonomi'];
                $dataNew['kesehatan'] = $request['kesehatan'];
                $dataNew['kebebasan'] = $request['kebebasan'];

                $update = $dataOld->update($dataNew);

                if (!$update) {
                        throw new \Exception("History Gagal Diupdate", 400);
                }

                return $dataNew;
        }

        /**
         * Get Tahun Unique
         */
        public function getTahun()
        {
                return DB::table('regresi')->select('tahun')->distinct()->get();
        }
}
