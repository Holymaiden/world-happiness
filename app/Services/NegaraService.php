<?php

namespace App\Services;

use App\Models\Negara;
use App\Services\BaseRepository;
use App\Services\Contracts\NegaraContract;
use Illuminate\Http\Request;


class NegaraService extends BaseRepository implements NegaraContract
{
        /**
         * @var
         */
        protected $model;

        public function __construct(Negara $data)
        {
                $this->model = $data->whereNotNull('id');
        }

        public function paginated(array $request)
        {
                $data = $this->model->where('nama', 'like', '%' . $request['query'] . '%')
                        ->orderBy($request['sort_field'], $request['sort'])
                        ->paginate($request['per_page']);

                return $data;
        }

        /**
         * Store Data
         */
        public function store(array $request)
        {
                // create new one if nama is unique
                $name =  $this->model->where('nama', $request['nama'])->first();

                if (empty($name)) {
                        $data =  $this->model->create([
                                'nama' => $request['nama'],
                        ]);

                        // Check if data is created
                        if (!$data) {
                                throw new \Exception("Negara Gagal Dibuat", 400);
                        }

                        // data created
                        return $data;
                } else {
                        // data already exist
                        throw new \Exception("Negara already exists", 400);
                }
        }

        /**
         * Update Data By ID
         */
        public function update(array $request, $id)
        {
                $dataOld = $this->model->find($id);

                $dataNew = [];

                $dataNew['nama'] = $request['nama'];

                $update = $dataOld->update($dataNew);

                if (!$update) {
                        throw new \Exception("Negara Gagal Diupdate", 400);
                }

                return $dataNew;
        }

        /**
         * Select nama
         */
        public function selectNama()
        {
                return $this->model->select('id', 'nama')->get();
        }

        public function getCount()
        {
                return $this->model->count();
        }
}
