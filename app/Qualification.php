<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    protected $fillable = ['name'];

    public static function qualification()
    {
        return static::pluck('name', 'id');
    }
}
