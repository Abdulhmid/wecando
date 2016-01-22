<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model {

    protected $table = 'setting';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
        
	public function scopeTakeData(){
		return self::select('*')->orderBy('id', 'asc');
	}

}
?>

