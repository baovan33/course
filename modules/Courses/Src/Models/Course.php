<?php

namespace Modules\Courses\Src\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Modules\Categories\Src\Models\Category;

class Course extends model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'code',
        'teacher_id',
        'price',
        'sale_price',
        'status',
        'is_document',
        'supports',
        'detail',
        'thumbnail',
    ];

    public function categories() {
        return $this->belongsToMany(Category::class, 'categories_courses');;
    }


}
