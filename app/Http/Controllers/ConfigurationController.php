<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models as Md;

class ConfigurationController extends Controller
{
    protected $model;
    protected $title = "Setting Website";
    protected $url = "configuration";
    protected $folder = "module.configuration";
    protected $form;

    public function __construct(Md\Configuration $model)
    {
    	$this->model = $model;
    }

    public function getIndex()
    {
        $data['title'] = $this->title;
        $data['breadcrumb'] = $this->url;
        return view($this->folder.'.index', $data);
    }

    public function postStore(Request $request){
    	$this->model->truncate();

        $data = [];

        /*
		** Global
        */
        $input['key']       = "email";
        $input['value']     = $request->get('email');
        array_push($data, $input);

        $input['key']       = "phone";
        $input['value']     = $request->get('phone');
        array_push($data, $input);

        $input['key']       = "fax";
        $input['value']     = $request->get('fax');
        array_push($data, $input);

        $input['key']       = "address";
        $input['value']     = $request->get('address');
        array_push($data, $input);

        if( \Input::hasFile('fav')){
            $image = \Input::file('fav');
            $nameFileImage = $this->saveImage($image);
            $input['key']       = "fav";
            $input['value']     = $nameFileImage;
            array_push($data, $input);
        }else{
            $input['key']       = "fav";
            $input['value']     = $request->get('favData');
            array_push($data, $input);	
        }

        /*
		** Media Social
        */
        $input['key']       = "facebook";
        $input['value']     = $request->get('facebook');
        array_push($data, $input);

        $input['key']       = "twitter";
        $input['value']     = $request->get('twitter');
        array_push($data, $input);

        $input['key']       = "google";
        $input['value']     = $request->get('google');
        array_push($data, $input);

        $input['key']       = "instagram";
        $input['value']     = $request->get('instagram');
        array_push($data, $input);

        $input['key']       = "path";
        $input['value']     = $request->get('path');
        array_push($data, $input);

        /*
		** Meta Title
        */
        $input['key']       = "author";
        $input['value']     = $request->get('author');
        array_push($data, $input);

        $input['key']       = "title";
        $input['value']     = $request->get('title');
        array_push($data, $input);

        $input['key']       = "keywords";
        $input['value']     = $request->get('keywords');
        array_push($data, $input);

        $input['key']       = "description";
        $input['value']     = $request->get('description');
        array_push($data, $input);

        $this->model->insert($data);

        $redirect = $this->url;

        return redirect($redirect)->with('message','Configuration Success Change!');

    }

    private function saveImage($file){
        $name = time().preg_replace('/\s+/', '', $file->getClientOriginalName());
        $destinationPath = "images/";
        \Image::make($file->getRealPath())->resize("179px", "103px")->save($destinationPath . $name);

        return $destinationPath.$name;
    }

}
