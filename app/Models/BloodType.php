<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodType extends Model 
{

    protected $table = 'blood_types';
    public $timestamps = true;
    protected $fillable = array('name');

    public function clients()
    {
        return $this->morphedByMany('App\Models\Client', 'clientable');
    }

    public function donationRequest()
    {
        return $this->morphToMany('App\Models\DonationRequests', 'clientable');
    }

}