<?php

namespace App\Models;

use App\Core\BaseModel;

class Page extends BaseModel
{
    protected string $table = 'pages';
    protected $fillable = ['title', 'slug', 'template', 'content', 'custom_class'];
}
