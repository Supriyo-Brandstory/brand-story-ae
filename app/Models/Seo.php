<?php

namespace App\Models;

use App\Core\BaseModel;

class Seo extends BaseModel
{
    protected string $table = 'seo';
    protected $fillable = ['page_url', 'meta_title', 'meta_description', 'other_script_or_tag', 'created_at', 'updated_at'];
}
