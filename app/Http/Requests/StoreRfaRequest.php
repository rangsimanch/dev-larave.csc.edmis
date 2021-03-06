<?php

namespace App\Http\Requests;

use App\Rfa;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreRfaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('rfa_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'submit_date'  => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'receive_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'indentures.*' => [
                'integer',
            ],
            'indentures'   => [
                'array',
            ],
        ];
    }
}
