<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InternalAdminClassification extends Model
{
    protected $fillable = [
        'key', 'description','area','leadership'
    ];
}
