<?php
namespace App\Models;

use App\Core\BaseModel;

class Blog extends BaseModel
{
    protected string $table = 'blogs';
    protected $fillable = ['blog_category_id', 'title', 'slug', 'description'];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }
}
