@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.user.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <td>
                            {{ $user->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.img_user') }}
                        </th>
                        <td>
                            @if($user->img_user)
                                <a href="{{ $user->img_user->getUrl() }}" target="_blank">
                                    <img src="{{ $user->img_user->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <td>
                            {{ $user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.dob') }}
                        </th>
                        <td>
                            {{ $user->dob }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.gender') }}
                        </th>
                        <td>
                            {{ App\User::GENDER_SELECT[$user->gender] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.workphone') }}
                        </th>
                        <td>
                            {{ $user->workphone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.team') }}
                        </th>
                        <td>
                            {{ $user->team->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.jobtitle') }}
                        </th>
                        <td>
                            {{ $user->jobtitle->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email_verified_at') }}
                        </th>
                        <td>
                            {{ $user->email_verified_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.roles') }}
                        </th>
                        <td>
                            @foreach($user->roles as $key => $roles)
                                <span class="label label-info">{{ $roles->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.approved') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $user->approved ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.indenture') }}
                        </th>
                        <td>
                            @foreach($user->indentures as $key => $indenture)
                                <span class="label label-info">{{ $indenture->code }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
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
            <a class="nav-link" href="#issueby_rfas" role="tab" data-toggle="tab">
                {{ trans('cruds.rfa.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#assign_rfas" role="tab" data-toggle="tab">
                {{ trans('cruds.rfa.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#create_by_rfas" role="tab" data-toggle="tab">
                {{ trans('cruds.rfa.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#action_by_rfas" role="tab" data-toggle="tab">
                {{ trans('cruds.rfa.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#comment_by_rfas" role="tab" data-toggle="tab">
                {{ trans('cruds.rfa.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#information_by_rfas" role="tab" data-toggle="tab">
                {{ trans('cruds.rfa.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_create_tasks" role="tab" data-toggle="tab">
                {{ trans('cruds.task.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_user_alerts" role="tab" data-toggle="tab">
                {{ trans('cruds.userAlert.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="issueby_rfas">
            @includeIf('admin.users.relationships.issuebyRfas', ['rfas' => $user->issuebyRfas])
        </div>
        <div class="tab-pane" role="tabpanel" id="assign_rfas">
            @includeIf('admin.users.relationships.assignRfas', ['rfas' => $user->assignRfas])
        </div>
        <div class="tab-pane" role="tabpanel" id="create_by_rfas">
            @includeIf('admin.users.relationships.createByRfas', ['rfas' => $user->createByRfas])
        </div>
        <div class="tab-pane" role="tabpanel" id="action_by_rfas">
            @includeIf('admin.users.relationships.actionByRfas', ['rfas' => $user->actionByRfas])
        </div>
        <div class="tab-pane" role="tabpanel" id="comment_by_rfas">
            @includeIf('admin.users.relationships.commentByRfas', ['rfas' => $user->commentByRfas])
        </div>
        <div class="tab-pane" role="tabpanel" id="information_by_rfas">
            @includeIf('admin.users.relationships.informationByRfas', ['rfas' => $user->informationByRfas])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_create_tasks">
            @includeIf('admin.users.relationships.userCreateTasks', ['tasks' => $user->userCreateTasks])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_user_alerts">
            @includeIf('admin.users.relationships.userUserAlerts', ['userAlerts' => $user->userUserAlerts])
        </div>
    </div>
</div>

@endsection