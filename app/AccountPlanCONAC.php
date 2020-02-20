<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountPlanCONAC extends Model
{
    protected $fillable = [
        'key', 'description','nature','clasification'
    ];
}
