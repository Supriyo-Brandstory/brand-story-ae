<?php

namespace App\Models;

use App\Core\BaseModel;

class Robots extends BaseModel
{
    protected string $table = 'robots';
    protected $fillable = ['content', 'updated_at'];
}
