<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    protected $fillable=[
        'name',
        'place',
        'date',
        'email',
        'phone'
    ];
}
