<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassifierRevenueCategory extends Model
{
    protected $fillable = [
        'key', 'description','account'
    ];
}
