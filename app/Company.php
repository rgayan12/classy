<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

/**
 * Class Company
 *
 * @package App
 * @property string $name
 * @property string $city
 * @property string $address
 * @property text $description
 * @property string $logo
*/
class Company extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'address', 'address_option', 'town_city', 'province_id', 'postal_code', 'country_id', 'description', 'logo', 'city_id'];
    
    public function getImageUrl(){
        return asset($this->logo);
    }
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCityIdAttribute($input)
    {
        $this->attributes['city_id'] = $input ? $input : null;
    }
    public function setProvinceIdAttribute($input)
    {
        $this->attributes['province_id'] = $input ? $input : null;
    }
    public function setCountryIdAttribute($input)
    {
        $this->attributes['country_id'] = $input ? $input : null;
    }
    
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id')->withTrashed();
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id')->withTrashed();
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id')->withTrashed();
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_company')->withTrashed();
    }

    public function auditions()
    {
        return $this->belongsToMany(Audition::class, 'audition_company');
    }

    public function courses(){
        return $this->hasMany('App\Course');
    }
    public static function companies()
    {
        return static::pluck('name', 'id');
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'company_user');
    }



    public function scopeFilterByRequest($query, Request $request)
    {
        if ($request->input('city_id')) {
            $query->where('city_id', '=', $request->input('city_id'));
        }

        if ($request->input('categories')) {
            $query->whereHas('categories',
            function ($query) use ($request) {
                $query->where('id', $request->input('categories'));
            });
        }
        
        if ($request->input('search')) {
            $query->where('name', 'LIKE', '%'.$request->input('search').'%');
        }

        return $query;
    }
    
}
