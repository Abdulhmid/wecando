<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partners extends Model {

    protected $table = 'partners';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
        
	public function scopeTakeData(){
		return self::select('id','name','image','description','created_by',
							'created_at')->orderBy('id', 'desc');
	}

}
?>

