<?php

namespace App\Http\Requests\Api;


use App\Http\Requests\Request;

class LoginRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'     => 'required|email',
            'password'  => 'required|min:6|max:20',
        ];
    }

    public function attributes()
    {
        return [
            'email'     => trans('models.user.email'),
            'password'  => trans('models.user.password'),
        ];
    }
}
