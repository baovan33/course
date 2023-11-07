<?php
namespace Modules\Categories\Src\Repositories;

use App\Repositories\BaseRepository;
use Modules\Categories\Src\Models\Category;
use Modules\Categories\Src\Repositories\CategoriesRepositoryInterface;


class CategoriesRepository extends BaseRepository implements CategoriesRepositoryInterface {

    public function getModel()
    {
        return Category::class;
    }

    public function getCategories()
    {
        return $this->model->with('subCategories')->select(['id', 'name', 'slug', 'parent_id', 'created_at'])->where('parent_id', 0)->latest();
    }

    public function getAllCategories()
    {
        return $this->getAll();
    }


}
