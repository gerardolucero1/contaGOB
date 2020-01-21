<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    protected $fillable = [
        'institution', 'accountnumber','accountingaccount','issuecheck','enable','fundingsource','type'
    ];
}
