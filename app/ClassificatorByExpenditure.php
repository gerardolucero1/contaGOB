<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassificatorByExpenditure extends Model
{
    protected $fillable = [
        'key', 'description','account'
    ];
}
