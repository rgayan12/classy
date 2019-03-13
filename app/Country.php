<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name'];

    public static function country()
    {
        return static::pluck('name', 'id');
    }
}
