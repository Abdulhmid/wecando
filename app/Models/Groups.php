<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Groups extends Model {

    protected $table = 'groups';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
        
	public function scopeTakeData(){
		return self::select('id','group_name','description','created_by',
							'created_at')->orderBy('id', 'desc');
	}

}
?>

