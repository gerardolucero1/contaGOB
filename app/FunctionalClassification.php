<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FunctionalClassification extends Model
{
    protected $fillable = [
        'key', 'description'
    ];
}
