<?php
namespace Modules\User\Src\Repositories;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Hash;
use Modules\User\Src\Models\User;
use Modules\User\Src\Repositories\UserRepositoryInterface;


class UserRepository extends BaseRepository implements UserRepositoryInterface {

    public function getModel()
    {
        return User::class;
    }

    public function getUsers($limit)
    {
       return $this->model->paginate($limit);
    }

    public function setPassword($password, $id)
    {
       return $this->update($id, ['password' => Hash::make($password)]);
    }

    public function getAllUsers() {
        return $this->model->select(['id', 'name', 'email', 'group_id', 'created_at'])->latest();
    }
    public function checkPassword($password, $id)
    {
        $user             = $this->find($id);

        if( $user ) {
            $hashPassword = $user->password;
            return Hash::check($password, $hashPassword);
        }

        return false;
    }
}
