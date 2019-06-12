<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumnus extends Model
{
    protected $fillable = [
        'name',
        'email',
        'linkedin'
    ];
}
