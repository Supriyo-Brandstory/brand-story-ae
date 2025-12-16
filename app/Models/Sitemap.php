<?php

namespace App\Models;

use App\Core\BaseModel;

class Sitemap extends BaseModel
{
    protected string $table = 'sitemaps';
    protected $fillable = ['content', 'created_at', 'updated_at'];
}
