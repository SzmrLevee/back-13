<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Macbook extends Model
{
    protected $fillable = [
        'name',
        'chip',
        'introduced',
        'base_ram',
    ];

    protected $casts = [
        'introduced' => 'date',
        'base_ram' => 'integer',
    ];
}
