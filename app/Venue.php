<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    //
    protected $fillable = ['name', 'address', 'address_option', 'city', 'province_id', 'postal_code', 'country_id', 'created_by', 'status' ];

    public static function venue()
    {
        return static::pluck('name', 'id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id')->withTrashed();
    }
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id')->withTrashed();
    }

    public function audition()
    {
        return $this->belongsTo(Audition::class, 'audition_id')->withTrashed();
    }
    public static function venues()
    {
        return static::pluck('name', 'id');
    }
}
