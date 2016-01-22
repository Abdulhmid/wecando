<?php


class ConfigurationHelper {

    public static function takeValue($key){
        $data =  \App\Models\Configuration::where('key', $key);
        if($data->count() < 1 ) return "";

        return $data->first()->value;
    }

}