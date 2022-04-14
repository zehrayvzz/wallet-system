<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\Request as BaseRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class Request extends BaseRequest
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
            //
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors()->getMessages();

        $errors = $errors[array_key_first($errors)];
        $error = $errors[array_key_first($errors)];

        $failed = $validator->failed();

        $isRegex = $failed['password']['Regex'] ?? null;
        if(!is_null($isRegex)){
            $error = trans('errors.auth.password.regex');
        }

        $isRegex = $failed['new_password']['Regex'] ?? null;
        if(!is_null($isRegex)){
            $error = trans('errors.auth.password.regex');
        }

        $error = [
            'code'    => 'validation',
            'title'   => trans('errors.common.error'),
            'message' => $error,
        ];

        $response = response()->json($error, 400);

        throw new HttpResponseException($response);
    }
}
