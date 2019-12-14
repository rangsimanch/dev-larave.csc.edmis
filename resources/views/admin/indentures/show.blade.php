@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.indenture.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.indentures.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.indenture.fields.id') }}
                        </th>
                        <td>
                            {{ $indenture->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.indenture.fields.name') }}
                        </th>
                        <td>
                            {{ $indenture->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.indenture.fields.code') }}
                        </th>
                        <td>
                            {{ $indenture->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.indenture.fields.start_dk') }}
                        </th>
                        <td>
                            {{ $indenture->start_dk }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.indenture.fields.destination_dk') }}
                        </th>
                        <td>
                            {{ $indenture->destination_dk }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.indentures.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#indenture_file_managers" role="tab" data-toggle="tab">
                {{ trans('cruds.fileManager.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#indenture_tasks" role="tab" data-toggle="tab">
                {{ trans('cruds.task.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#indenture_users" role="tab" data-toggle="tab">
                {{ trans('cruds.user.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#indenture_rfas" role="tab" data-toggle="tab">
                {{ trans('cruds.rfa.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="indenture_file_managers">
            @includeIf('admin.indentures.relationships.indentureFileManagers', ['fileManagers' => $indenture->indentureFileManagers])
        </div>
        <div class="tab-pane" role="tabpanel" id="indenture_tasks">
            @includeIf('admin.indentures.relationships.indentureTasks', ['tasks' => $indenture->indentureTasks])
        </div>
        <div class="tab-pane" role="tabpanel" id="indenture_users">
            @includeIf('admin.indentures.relationships.indentureUsers', ['users' => $indenture->indentureUsers])
        </div>
        <div class="tab-pane" role="tabpanel" id="indenture_rfas">
            @includeIf('admin.indentures.relationships.indentureRfas', ['rfas' => $indenture->indentureRfas])
        </div>
    </div>
</div>

@endsection