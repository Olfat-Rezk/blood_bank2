<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model 
{

    protected $table = 'notifications';
    public $timestamps = true;

    public function donationRequest()
    {
        return $this->morphedByMany('App\Models\DonationRequests', 'clientable')->withPivot('is_read');
    }

}