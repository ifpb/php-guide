<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Alumnus extends Model
{
    use Sortable;

    public $sortable = [
        'id',
        'name',
        'email',
        'linkedin',
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'name',
        'email',
        'linkedin'
    ];
}
