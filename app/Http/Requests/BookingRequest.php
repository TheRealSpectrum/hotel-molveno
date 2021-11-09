<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
            "check_in" => "required|date|after:yesterday",
            "check_out" => "required|date|after:check_in",
            "adults" => "required|integer|min:1",
            "children" => "required|integer|gte:0",
            "room_amount" => "required|gte:1",
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
                // "check_in" => "date",
            ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            "room_amount.gte" =>
                "The room amount must be greater than or equal to 1.",
            "adults.min" => "The amount of adults must be at least 1.",
        ];
    }
}
