<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    public $primaryKey = 'restaurant_id';

    public function resto_img(){
        return $this->belongsTo('App\RestaurantImage', 'restaurant_id', 'restaurant_id');
    }

}
