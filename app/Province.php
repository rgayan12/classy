<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{


    protected $fillable = ['name'];

    public static function province()
    {
        return static::pluck('name', 'id');
    }
}
