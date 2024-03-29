<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\Auth\Rules\Password;

class UserUpdateCrudRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->get("id") ?? request()->route("id");

        return [
            "email" =>
                "required|unique:" .
                config("permission.table_names.users", "users") .
                ",email," .
                $id,
            "name" => "required",
            "password" => ["confirmed", Password::defaults()],
        ];
    }
}
