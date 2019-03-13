<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audition extends Model
{
    //
    protected $fillable = ['name', 'audition_date', 'audition_time', 'fees', 'seat', 'details', 'status', 'venue_id', 'owner'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'audition_category')->withTrashed();
    }

    public function companies()
    {
        return $this->belongsToMany(Company::class, 'audition_company')->withTrashed();
    }

    public function venues()
    {
        return $this->belongsTo(Venue::class, 'venue_id');
    }


}