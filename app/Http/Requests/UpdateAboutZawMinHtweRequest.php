<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateAboutZawMinHtweRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::authorize("update",$this->route("aboutZawMinHtwe"));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "title" => "required|unique:about_zaw_min_htwes,title,".$this->route('aboutZawMinHtwe')->id."|min:5",
            "description" => "required|min:15",
            "cover" => "nullable|file|mimes:jpeg,png|max:5120"
        ];
    }
}
