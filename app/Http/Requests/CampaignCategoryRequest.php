<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CampaignCategoryRequest extends Request
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
        ];
        $last    = \GLobalHelper::lastUrl();  


        if(is_numeric($last)) : 
            $rules['name'] = 'required|unique:campaign_category,name,'.$last.',id';
        else :
            $rules['name'] = 'required';
        endif;

        return $rules;
    }
}
