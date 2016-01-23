<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model {

    protected $table = 'contact';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
        
	public function scopeTakeData(){
		return self::select('*')->orderBy('id', 'desc');
	}
}
?>

