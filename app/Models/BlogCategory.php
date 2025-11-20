<?php
namespace App\Models;

use App\Core\BaseModel;

class BlogCategory extends BaseModel
{
    protected string $table = 'blog_categories';
    protected $fillable = ['name', 'slug', 'description'];
}
