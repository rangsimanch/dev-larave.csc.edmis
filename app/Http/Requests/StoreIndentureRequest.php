<?php

namespace App\Http\Requests;

use App\Indenture;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreIndentureRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('indenture_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
        ];
    }
}
