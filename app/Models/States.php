<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class States extends Model {

    protected $table = 'state';
    protected $primaryKey = 'state_id';
    protected $guarded = ['state_id'];
    
    public function city() {
        return $this->hasMany('App\Models\City', 'state_id', 'state_id');
    }

}
?>

