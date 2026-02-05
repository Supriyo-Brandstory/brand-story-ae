<?php

namespace App\Models;

use App\Core\BaseModel;

class Enquiry extends BaseModel
{
    protected string $table = 'enquiries';
    protected $fillable = [
        'type',
        'name',
        'email',
        'phone',
        'company',
        'designation',
        'services',
        'budget',
        'message',
        'calculator_data'
    ];
}
