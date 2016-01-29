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

    public static function checkImageCommentar($created_by){
      $userCheck = \App\Models\Users::where(['created_by' => '$created_by']);
      if ($userCheck->count() > 0) {
        if (file_exists(public_path()."/".$userCheck->first()->image) && !empty($userCheck->first()->image))
        {
            return asset($userCheck->first()->image);
        }else{
          return asset("/images/default/no_image.jpg");
        }
      }else{
        return asset("/images/default/no_image.jpg");
      }

    }

    public static function countCommentNewsletter($id){
      return App\Models\commentNewsletter::where(['newsletter_id' => $id,'status' => 1])->count();
    }

    public static function commentNewsletter($id){
      $data = App\Models\commentNewsletter::where(['newsletter_id' => $id,'status' => 1]);
      if ($data->count() > 0) {
        $return = "";
        foreach ($data->get() as $key => $value) {
          $url = '' ;
          $return .= '<li class="media">
                <div class="post-comment" style="padding-left: 5px;">
                    <a class="pull-left" href="#">
                        <img class="media-object" style="max-height:127px;max-width:137px;" src="'.self::checkImageCommentar($value->created_by).'" alt="">
                    </a>
                    <div class="media-body">
                        <span><i class="fa fa-user"></i>Posted by <a href="#">'.$value->created_by.'</a></span>
                        <p>'.GlobalHelper::softTrim($value->comment,79).'</p>
                        <ul class="nav navbar-nav post-nav">
                            <li><a href="#"><i class="fa fa-clock-o"></i>'.GlobalHelper::formatDate($value->created_at,'d F Y').'</a></li>
                            <!-- <li><a href="#"><i class="fa fa-reply"></i>Reply</a></li> -->
                        </ul>
                    </div>
                </div>
            </li>';
        }
        return $return;

      }else{
        return "<label style='text-align:center'>Belum Ada Komentar</label>";
      }

    }

}