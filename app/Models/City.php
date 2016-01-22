<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model {

    protected $table = 'city';
    protected $primaryKey = 'city_id';
    protected $guarded = ['city_id'];
    
     public function site() {
        return $this->hasMany('App\Models\Site', 'city_id', 'id');
    }
    
     public function state() {
        return $this->belongsTo('App\Models\State', 'state_id', 'state_id');
    }

}
?>

