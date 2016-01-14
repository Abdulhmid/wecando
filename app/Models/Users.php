<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model {

    public $incrementing = false;
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function groups() {
        return $this->hasOne('App\Model\Groups', 'group_id', 'group_id');
    }

    public function scopeTakeData(){
        return self::orderBy('id','desc')->join('groups','groups.id','=','users.id_group')
                                         ->select('users.id','username','email','fullname','image','groups.group_name as group',
                                                  'status','users.created_at')->get();
    }

}
?>
