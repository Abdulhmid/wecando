<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models as Md;
use App\Additionals\Datatables\NewsletterCommentarDatatables;

class NewsletterCommentarController extends Controller
{
    protected $model;
    protected $title = "Data Newsletter Commentar";
    protected $url = "panel/back-comment-newsletter";
    protected $folder = "module.newsletter_comment";
    protected $form;

    public function __construct(
    	Md\commentNewsletter $model
    )
    {
        $this->model    = $model;
    }

    public function getIndex()
    {
        $data['title'] = $this->title;
        $data['breadcrumb'] = $this->url;
        return view($this->folder.'.index', $data);
    }

    public  function  getDelete($id ="")
    {
        if($id=="") return redirect($this->url);

        $data = $this->model->find($id);

        $data->delete();

        return redirect($this->url)->with('message','Data Berhasil Dihapus!');

    }

    public function getMessage()
    {
      $id = \Request::input('key_id');
      $emptyData = "";
      if(empty($id)) return $emptyData;

      $query = $this->model->find($id);

      return $query;
    }

    public function postStoreReply(Request $request){
        $input = $request->only('id','reply','message');
        $input['reply']  = $input['reply'];
        $input['message']  = preg_replace('/\s+/', '', $input['message']);

        $send['reply'] = $input['reply'] ;
        $send['mesUsers'] = $input['message'] ;
        $send['status'] = "0" ;
        $query = $this->model->find($input['id']);

        $query->update($input);

        \Mail::send('emails.reply', $send, function($messageSend) use ($query) {
            $messageSend->from('weCanDo171730@gmail.com', 'We Can Dow');
            $messageSend->to($query->email, $query->name)->subject('Message Reply');
        });

    }

    public function getData(Request $request){
        return (new NewsletterCommentarDatatables($this->model))->make();
    }
}
