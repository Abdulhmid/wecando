<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class commentNewsletter extends Model {

    protected $table = 'newsletter_comments';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
        
	public function scopeTakeData(){
		return self::select('*')->orderBy('id', 'desc');
	}

}
?>

