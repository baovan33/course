<?php
namespace Modules\User\Src\Repositories;

use App\Repositories\RepositoryInterface;

interface UserRepositoryInterface extends RepositoryInterface {

    public function getUsers($limit);

    public function setPassword($password, $id);

    public function checkPassword($password, $id);

}
