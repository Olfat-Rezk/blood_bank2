<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('password', 'name', 'email','phone','last_donation_date','city_id','blood_type_id');

    public function bloodType()
    {
        return $this->morphMany('App\Models\BloodType', 'clientable');
    }

    public function donationRequest()
    {
        return $this->morphedByMany('App\Models\DonationRequests', 'clientable');
    }

    public function post()
    {
        return $this->morphedByMany('App\Models\Post', 'clientable');
    }

    public function city()
    {
        return $this->morphedByMany('App\Models\City', 'clientable');
    }
    protected $hidden = [
        'password',
        'api_token',
    ];

}
