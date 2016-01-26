<?php


class CampaignHelper {


    /*
	** Get Donatur
    */

    public static function takeDonatur($id){
    	return \App\Models\Donate::where('campaign_id', $id)->join('users','users.id','=','donation.user_id')
                                ->selectRaw('image,fullname, sum(donate) as donateUsers')
                                ->groupBy('users.id')
                                ->get();
    }

    public static function takeTotalDonate($id){
        return \App\Models\Donate::where('campaign_id', $id)->sum('donate');
    }

}