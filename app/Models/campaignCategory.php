<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class campaignCategory extends Model {

    protected $table = 'campaign_category';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
        
	public function scopeTakeData(){
		return self::select('*')->orderBy('id', 'desc');
	}

    public function campaign()
    {
        return $this->hasMany(Campaign::class, 'category_id','id');
    }

}
?>

