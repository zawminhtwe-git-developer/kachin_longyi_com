<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
        return [
                "category_id" => "required",
                'name' => 'required|min:9|max:50',
                'sale_price' => 'required',
                'purchase_price' => 'required',
                "description" => "required",
                "balance" => "required",
                "gallery" => "required|mimetypes:image/jpeg,image/png|max:5120"
        ];
    }
}
