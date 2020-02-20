<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BankAccount;

class Budget extends Model
{
    public function cuenta()
 {
 return $this->belongsTo(BankAccount::class);
 }
}
