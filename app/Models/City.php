<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model 
{

    protected $table = 'cities';
    public $timestamps = true;
    protected $fillable = array('name', 'governorate_id');

    public function governorate()
    {
        return $this->morphToMany('App\Models\Governorate', 'clientable');
    }

    public function donatioRequest()
    {
        return $this->morphedByMany('App\Models\DonationRequests', 'clientable');
    }

}