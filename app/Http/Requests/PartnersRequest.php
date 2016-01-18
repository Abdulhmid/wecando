<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PartnersRequest extends Request
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
            'description' => 'required',
            'image'  => 'max:2000|mimes:jpeg,gif,png'
        ];
        $last    = \GLobalHelper::lastUrl();  

        if(is_numeric($last)) : 
            $rules['name'] = 'required';
            // $rules['order'] = 'required';
        else :
            $rules['name'] = 'required';
            // $rules['order'] = 'required';
        endif;

        return $rules;
    }
}
