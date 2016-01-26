<?php


class NewsletterHelper {

    public static function otherNewsletter($key){
        $data =  \App\Models\Newsletter::whereNotIn('id', [$key])->get();
        $return = "";
        foreach ($data as $key => $value) {
            $param = url('newsletter/detail/'.$value->id.'/'.preg_replace('/\s+/', '', GlobalHelper::formatDate($value->created_at, 'd m Y')).'/'.$value->slug); 
            $return .= '<div class="media">
                            <div class="pull-left">
                            <a href="'.$param.'"><img src="'.GlobalHelper::checkImage($value->image, 'article' ).'" style="width:52px;height:52px" alt=""></a>
                       </div>
                       <div class="media-body">
                               <h4><a href="'.$param.'">'.GLobalHelper::softTrim($value->title,51).',</a></h4>
                               <p>posted on  '.GLobalHelper::formatDate($value->created_at,'d F Y').'</p>
                           </div>
                       </div>';
        }

        return $return;
    }

}