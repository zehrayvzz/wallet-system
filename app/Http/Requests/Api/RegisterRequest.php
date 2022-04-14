<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\Request;

class RegisterRequest extends Request
{
    public function rules()
    {
        return [
            'first_name' => 'required|min:2',
            'last_name'  => 'required|min:2',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|min:6|max:20|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{6,}$/',
        ];
    }

    public function attributes()
    {
        return [
            'first_name' => trans('models.user.first_name'),
            'last_name'  => trans('models.user.last_name'),
            'email'      => trans('models.user.email'),
            'password'   => trans('models.user.password'),
        ];
    }
}
