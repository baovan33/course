<?php

namespace Modules\Categories\Src\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Modules\Courses\Src\Models\Course;

class Category extends Model
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
        'parent_id',
    ];

    public function childrents() {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function subCategories() {
        return $this->childrents()->with('subCategories');
    }

    public function courses() {
        return $this->belongsToMany(Course::class, 'categories_courses');
    }
}
