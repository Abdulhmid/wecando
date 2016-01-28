<?php


class CampaignHelper {


    /*
	** Get Donatur
    */

    public static function takeDonatur($id){
    	return \App\Models\Donate::where(['campaign_id' => $id, 'donation.status' => 1])->join('users','users.id','=','donation.user_id')
                                ->selectRaw('image,fullname, sum(donate) as donateUsers')
                                ->groupBy('users.id')
                                ->get();
    }

    public static function takeTotalDonate($id){
        return \App\Models\Donate::where(['campaign_id' => $id,'status' => 1])->sum('donate');
    }

    public static function takeTotalDonateVerify($id){
        return \App\Models\Donate::where(['campaign_id' => $id,'status' => 1])->sum('donate');
    }

}