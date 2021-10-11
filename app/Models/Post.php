<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model 
{

    protected $table = 'posts';
    public $timestamps = true;
    protected $fillable = array('img', 'content');

    public function categories()
    {
        return $this->morphToMany('App\Models\Category', 'clientable');
    }

    public function clients()
    {
        return $this->morphToMany('App\Models\Client', 'clientable');
    }

}