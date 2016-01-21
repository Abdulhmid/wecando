<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model {

    protected $table = 'campaign';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
        
	public function scopeTakeData(){
		return self::select('*')->orderBy('id', 'desc');
	}

    public function category()
    {
        return $this->belongsTo(campaignCategory::class, 'id','category_id');
    }

}
?>

