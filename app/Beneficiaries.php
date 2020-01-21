<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beneficiaries extends Model
{
    //
    protected $fillable = [
        'name', 'rfc','address','suburb'
    ];
}
