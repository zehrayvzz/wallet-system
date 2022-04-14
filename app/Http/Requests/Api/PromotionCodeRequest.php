<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\Request;

class PromotionCodeRequest extends Request
{
    public function rules()
    {
        return [
            'start_date' => 'required|date_format:Y-m-d H:i|before_or_equal:end_date',
            'end_date'   => 'required|date_format:Y-m-d H:i|after_or_equal:start_date',
            'amount'     => 'required',
            'quota'      => 'required|integer',
        ];
    }

    public function attributes()
    {
        return [
            'start_date' => trans('models.promotion_code.start_date'),
            'end_date'   => trans('models.promotion_code.end_date'),
            'amount'     => trans('models.promotion_code.amount'),
            'quota'      => trans('models.promotion_code.quota'),
        ];
    }
}
