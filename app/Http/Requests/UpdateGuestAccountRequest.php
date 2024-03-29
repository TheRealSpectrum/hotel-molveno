<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGuestAccountRequest extends FormRequest
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
            "first_name" => "required|min:2|string",
            "last_name" => "required|min:2|string",
            "email" => "required|email:rfc",
            "address" => "required",
            "phone" => "required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10",
        ];
    }

    public function attributes()
    {
        return [
            "email" => "email address",
            "phone" => "telephone number",
        ];
    }
}
