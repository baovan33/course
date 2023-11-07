<?php
namespace Modules\Categories\Src\Repositories;

use App\Repositories\RepositoryInterface;

interface CategoriesRepositoryInterface extends RepositoryInterface {

    public function getCategories();
    public function getAllCategories();
}
