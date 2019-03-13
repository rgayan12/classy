<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{



    protected $fillable = ['name', 'category_id', 'duration', 'qualification_id', 'description', 'fees', 'company_id', 'status'];



    public function company()
    {
        return $this->belongsTo('App\Company');
    }
    public function qualification()
    {
        return $this->belongsTo('App\Qualification');
    }
    public function category()
    {
        return $this->belongsTo('App\category');
    }

}
