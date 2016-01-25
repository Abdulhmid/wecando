<?php


class ConfigurationHelper {

    public static function takeValue($key){
        $data =  \App\Models\Configuration::where('key', $key);
        if($data->count() < 1 ) return "";

        return $data->first()->value;
    }

    public static function takeState(){
    	return \App\Models\States::all();
    }

    /*
	** User Data
    */

    public static function takeUserName($id){
    	return \App\Models\Users::find($id)->fullname;
    }

}