<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table    = "properties";
    protected $guarded  = [];
    protected $casts = [
        'facilities' => 'array',
        'rules' => 'array',
        'highlights' => 'array',
        'images' => 'array',
    ];
}
