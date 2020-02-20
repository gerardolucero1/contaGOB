<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    //
    protected $fillable = [
        'name', 'rfc','address','suburb'
    ];
}
