<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountingMoment extends Model
{
    protected $fillable = [
        'description', 'accountingaccount','type'
    ];
}
