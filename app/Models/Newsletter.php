<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model {

    protected $table = 'newsletter';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
        
	public function scopeTakeData(){
		return self::select('id','title','image','content','created_by',
							'created_at')->orderBy('id', 'desc');
	}

}
?>

