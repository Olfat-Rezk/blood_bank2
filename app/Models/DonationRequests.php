<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationRequests extends Model 
{

    protected $table = 'donation_requests';
    public $timestamps = true;
    protected $fillable = array('name', 'phone', 'hospital_name', 'bages_number');

    public function city()
    {
        return $this->morphToMany('App\Models\City', 'clientable');
    }

    public function bloodType()
    {
        return $this->morphToMany('App\Models\BloodType', 'clientable');
    }

    public function Client()
    {
        return $this->morphToMany('App\Models\Client', 'clientable');
    }

    public function notification()
    {
        return $this->morphToMany('App\Models\Notification', 'clientable');
    }

}