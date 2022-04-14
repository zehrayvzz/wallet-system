<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\Request;

class AssignPromotionRequest extends Request
{
    public function rules()
    {
        return [
            'code' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'code' => trans('models.promotion_code.code'),
        ];
    }
}
