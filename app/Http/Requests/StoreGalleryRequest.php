<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGalleryRequest extends FormRequest
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
//        photo,about_zaw_min_htwe_id,	user_id
//        aboutZawMinHtwe_id":"8","galleries":[{},{},{},{},{},{},{},{},{},{},{}]}
        return [
                "aboutZawMinHtwe_id"=>"required",
                "galleries"=>"nullable",
                "galleries.*"=>"file|mimes:jpeg,png|max:6000",
        ];
    }
}
