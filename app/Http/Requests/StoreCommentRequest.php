<?php

namespace App\Http\Requests;

use App\Models\AboutZawMinHtwe;
use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return AboutZawMinHtwe::find($this->aboutZawMinHtwe_id);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
//        exists:about_zaw_min_htwes,id ပို့စ်ထဲမှာ ရှိတဲ့ဟာ ဖြစ်ကို ဖြစ်ရမည်
        return [
            "aboutZawMinHtwe_id"=>"required|exists:about_zaw_min_htwes,id",
            "message" => "required|max:250"
        ];
    }
}
