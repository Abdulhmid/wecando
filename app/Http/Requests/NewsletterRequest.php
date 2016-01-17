<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class NewsletterRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'content' => 'required',
            'image'  => 'max:2000|mimes:jpeg,gif,png'
        ];
        $last    = \GLobalHelper::lastUrl();  

        if(is_numeric($last)) : 
            // $rules['group_name'] = 'required|unique:groups,group_name,'.$last.',id';
            $rules['title'] = 'required';
        else :
            $rules['title'] = 'required';
        endif;

        return $rules;
    }
}
