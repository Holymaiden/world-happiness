<?php

namespace App\Services;

use App\Models\User;
use App\Services\BaseRepository;
use App\Services\Contracts\UserContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserService extends BaseRepository implements UserContract
{
        /**
         * @var
         */
        protected $model;

        public function __construct(User $user)
        {
                $this->model = $user->whereNotNull('id');
        }

        public function paginated(Request $request)
        {
                $search = [];

                $limit = $request->input('length');

                if (empty($request->input('search'))) {
                        $users = $this->model->paginate($limit);
                } else {
                        $search = $request->input('search');

                        $users = $this->model->where('name', 'LIKE', "%{$search}%")
                                ->orWhere('email', 'LIKE', "%{$search}%")
                                ->paginate($limit);

                        $totalFiltered = $this->model->where('name', 'LIKE', "%{$search}%")
                                ->orWhere('email', 'LIKE', "%{$search}%")
                                ->count();
                }

                $data = [];

                if (!empty($users)) {
                        // providing a dummy id instead of database ids
                        foreach ($users as $user) {
                                $nestedData['id'] = $user->id;
                                $nestedData['email'] = $user->email;

                                $data[] = $nestedData;
                        }
                }

                return [
                        'total_page' => $users->lastPage(),
                        'total_data' => $totalFiltered ?? 0,
                        'code' => 200,
                        'data' => $data,
                ];
        }

        /**
         * Store Data
         */
        public function store(array $request)
        {
                // create new one if email is unique
                $userEmail =  $this->model->where('email', $request['email'])->first();

                if (empty($userEmail)) {
                        $users =  $this->model->create([
                                'email' => $request['email'],
                                'password' => Hash::make($request['password']),
                        ]);

                        // Check if data is created
                        if (!$users) {
                                throw new \Exception("User Gagal Dibuat", 400);
                        }

                        // user created
                        return $users;
                } else {
                        // user already exist
                        throw new \Exception("User already exists", 400);
                }
        }

        /**
         * Update Data By ID
         */
        public function update(array $request, $id)
        {
                $dataOld = $this->model->find($id);

                $dataNew = [];

                if ($request['password'] == '') {
                        $dataNew['password'] = $dataOld->password;
                } else {
                        $dataNew['password'] = Hash::make($request['password']);
                }

                $dataNew['email'] = $request['email'];

                $update = $dataOld->update($dataNew);
                // Check if data is updated
                if (!$update) {
                        throw new \Exception("User Gagal Diupdate", 400);
                }

                return $dataNew;
        }
}
