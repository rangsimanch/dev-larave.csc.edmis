<?php

namespace App\Http\Requests;

use App\Indenture;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyIndentureRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('indenture_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:indentures,id',
        ];
    }
}
