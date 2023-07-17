<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class signreq extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        // formdata.append("name", Name.value);
        // formdata.append("phone", phone.value);
        // formdata.append("email", email.value);
        return [
            "name"=>"required|string",
            "email"=> "required|email|unique:users",
            "phone"=> "required|unique:users,phone|size:11|regex:/^[0-9+  ]*$/"
        ];
    }
}
