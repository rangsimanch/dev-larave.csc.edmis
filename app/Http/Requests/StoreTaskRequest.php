<?php

namespace App\Http\Requests;

use App\Task;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreTaskRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('task_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'      => [
                'required',
            ],
            'status_id' => [
                'required',
                'integer',
            ],
            'tags.*'    => [
                'integer',
            ],
            'tags'      => [
                'array',
            ],
            'due_date'  => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'end_date'  => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
<<<<<<< HEAD
            'user_create_id' => [
                'integer',
            ],
<<<<<<< HEAD
            'indentures.*'   => [
                'integer',
            ],
            'indentures'     => [
                'array',
            ],
=======
>>>>>>> parent of 9634a6b... sprint1
=======
>>>>>>> parent of 507f806... Indenture
        ];
    }
}