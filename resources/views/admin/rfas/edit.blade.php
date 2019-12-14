@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.rfa.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.rfas.update", [$rfa->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">{{ trans('cruds.rfa.fields.title') }}</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($rfa) ? $rfa->title : '') }}">
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.rfa.fields.title_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('document_number') ? 'has-error' : '' }}">
                <label for="document_number">{{ trans('cruds.rfa.fields.document_number') }}</label>
                <input type="text" id="document_number" name="document_number" class="form-control" value="{{ old('document_number', isset($rfa) ? $rfa->document_number : '') }}">
                @if($errors->has('document_number'))
                    <em class="invalid-feedback">
                        {{ $errors->first('document_number') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.rfa.fields.document_number_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('rfa_code') ? 'has-error' : '' }}">
                <label for="rfa_code">{{ trans('cruds.rfa.fields.rfa_code') }}</label>
                <input type="text" id="rfa_code" name="rfa_code" class="form-control" value="{{ old('rfa_code', isset($rfa) ? $rfa->rfa_code : '') }}">
                @if($errors->has('rfa_code'))
                    <em class="invalid-feedback">
                        {{ $errors->first('rfa_code') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.rfa.fields.rfa_code_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('type_id') ? 'has-error' : '' }}">
                <label for="type">{{ trans('cruds.rfa.fields.type') }}</label>
                <select name="type_id" id="type" class="form-control select2">
                    @foreach($types as $id => $type)
                        <option value="{{ $id }}" {{ (isset($rfa) && $rfa->type ? $rfa->type->id : old('type_id')) == $id ? 'selected' : '' }}>{{ $type }}</option>
                    @endforeach
                </select>
                @if($errors->has('type_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('type_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('submit_date') ? 'has-error' : '' }}">
                <label for="submit_date">{{ trans('cruds.rfa.fields.submit_date') }}</label>
                <input type="text" id="submit_date" name="submit_date" class="form-control date" value="{{ old('submit_date', isset($rfa) ? $rfa->submit_date : '') }}">
                @if($errors->has('submit_date'))
                    <em class="invalid-feedback">
                        {{ $errors->first('submit_date') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.rfa.fields.submit_date_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('issueby_id') ? 'has-error' : '' }}">
                <label for="issueby">{{ trans('cruds.rfa.fields.issueby') }}</label>
                <select name="issueby_id" id="issueby" class="form-control select2">
                    @foreach($issuebies as $id => $issueby)
                        <option value="{{ $id }}" {{ (isset($rfa) && $rfa->issueby ? $rfa->issueby->id : old('issueby_id')) == $id ? 'selected' : '' }}>{{ $issueby }}</option>
                    @endforeach
                </select>
                @if($errors->has('issueby_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('issueby_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('assign_id') ? 'has-error' : '' }}">
                <label for="assign">{{ trans('cruds.rfa.fields.assign') }}</label>
                <select name="assign_id" id="assign" class="form-control select2">
                    @foreach($assigns as $id => $assign)
                        <option value="{{ $id }}" {{ (isset($rfa) && $rfa->assign ? $rfa->assign->id : old('assign_id')) == $id ? 'selected' : '' }}>{{ $assign }}</option>
                    @endforeach
                </select>
                @if($errors->has('assign_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('assign_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('note_1') ? 'has-error' : '' }}">
                <label for="note_1">{{ trans('cruds.rfa.fields.note_1') }}</label>
                <textarea id="note_1" name="note_1" class="form-control ckeditor">{{ old('note_1', isset($rfa) ? $rfa->note_1 : '') }}</textarea>
                @if($errors->has('note_1'))
                    <em class="invalid-feedback">
                        {{ $errors->first('note_1') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.rfa.fields.note_1_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('file_upload_1') ? 'has-error' : '' }}">
                <label for="file_upload_1">{{ trans('cruds.rfa.fields.file_upload_1') }}</label>
                <div class="needsclick dropzone" id="file_upload_1-dropzone">

                </div>
                @if($errors->has('file_upload_1'))
                    <em class="invalid-feedback">
                        {{ $errors->first('file_upload_1') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.rfa.fields.file_upload_1_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('create_by_id') ? 'has-error' : '' }}">
                <label for="create_by">{{ trans('cruds.rfa.fields.create_by') }}</label>
                <select name="create_by_id" id="create_by" class="form-control select2">
                    @foreach($create_bies as $id => $create_by)
                        <option value="{{ $id }}" {{ (isset($rfa) && $rfa->create_by ? $rfa->create_by->id : old('create_by_id')) == $id ? 'selected' : '' }}>{{ $create_by }}</option>
                    @endforeach
                </select>
                @if($errors->has('create_by_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('create_by_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('action_by_id') ? 'has-error' : '' }}">
                <label for="action_by">{{ trans('cruds.rfa.fields.action_by') }}</label>
                <select name="action_by_id" id="action_by" class="form-control select2">
                    @foreach($action_bies as $id => $action_by)
                        <option value="{{ $id }}" {{ (isset($rfa) && $rfa->action_by ? $rfa->action_by->id : old('action_by_id')) == $id ? 'selected' : '' }}>{{ $action_by }}</option>
                    @endforeach
                </select>
                @if($errors->has('action_by_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('action_by_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('comment_by_id') ? 'has-error' : '' }}">
                <label for="comment_by">{{ trans('cruds.rfa.fields.comment_by') }}</label>
                <select name="comment_by_id" id="comment_by" class="form-control select2">
                    @foreach($comment_bies as $id => $comment_by)
                        <option value="{{ $id }}" {{ (isset($rfa) && $rfa->comment_by ? $rfa->comment_by->id : old('comment_by_id')) == $id ? 'selected' : '' }}>{{ $comment_by }}</option>
                    @endforeach
                </select>
                @if($errors->has('comment_by_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('comment_by_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('information_by_id') ? 'has-error' : '' }}">
                <label for="information_by">{{ trans('cruds.rfa.fields.information_by') }}</label>
                <select name="information_by_id" id="information_by" class="form-control select2">
                    @foreach($information_bies as $id => $information_by)
                        <option value="{{ $id }}" {{ (isset($rfa) && $rfa->information_by ? $rfa->information_by->id : old('information_by_id')) == $id ? 'selected' : '' }}>{{ $information_by }}</option>
                    @endforeach
                </select>
                @if($errors->has('information_by_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('information_by_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('receive_date') ? 'has-error' : '' }}">
                <label for="receive_date">{{ trans('cruds.rfa.fields.receive_date') }}</label>
                <input type="text" id="receive_date" name="receive_date" class="form-control date" value="{{ old('receive_date', isset($rfa) ? $rfa->receive_date : '') }}">
                @if($errors->has('receive_date'))
                    <em class="invalid-feedback">
                        {{ $errors->first('receive_date') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.rfa.fields.receive_date_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('note_2') ? 'has-error' : '' }}">
                <label for="note_2">{{ trans('cruds.rfa.fields.note_2') }}</label>
                <textarea id="note_2" name="note_2" class="form-control ckeditor">{{ old('note_2', isset($rfa) ? $rfa->note_2 : '') }}</textarea>
                @if($errors->has('note_2'))
                    <em class="invalid-feedback">
                        {{ $errors->first('note_2') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.rfa.fields.note_2_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('comment_status_id') ? 'has-error' : '' }}">
                <label for="comment_status">{{ trans('cruds.rfa.fields.comment_status') }}</label>
                <select name="comment_status_id" id="comment_status" class="form-control select2">
                    @foreach($comment_statuses as $id => $comment_status)
                        <option value="{{ $id }}" {{ (isset($rfa) && $rfa->comment_status ? $rfa->comment_status->id : old('comment_status_id')) == $id ? 'selected' : '' }}>{{ $comment_status }}</option>
                    @endforeach
                </select>
                @if($errors->has('comment_status_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('comment_status_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('note_3') ? 'has-error' : '' }}">
                <label for="note_3">{{ trans('cruds.rfa.fields.note_3') }}</label>
                <textarea id="note_3" name="note_3" class="form-control ">{{ old('note_3', isset($rfa) ? $rfa->note_3 : '') }}</textarea>
                @if($errors->has('note_3'))
                    <em class="invalid-feedback">
                        {{ $errors->first('note_3') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.rfa.fields.note_3_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('for_status_id') ? 'has-error' : '' }}">
                <label for="for_status">{{ trans('cruds.rfa.fields.for_status') }}</label>
                <select name="for_status_id" id="for_status" class="form-control select2">
                    @foreach($for_statuses as $id => $for_status)
                        <option value="{{ $id }}" {{ (isset($rfa) && $rfa->for_status ? $rfa->for_status->id : old('for_status_id')) == $id ? 'selected' : '' }}>{{ $for_status }}</option>
                    @endforeach
                </select>
                @if($errors->has('for_status_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('for_status_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('document_status_id') ? 'has-error' : '' }}">
                <label for="document_status">{{ trans('cruds.rfa.fields.document_status') }}</label>
                <select name="document_status_id" id="document_status" class="form-control select2">
                    @foreach($document_statuses as $id => $document_status)
                        <option value="{{ $id }}" {{ (isset($rfa) && $rfa->document_status ? $rfa->document_status->id : old('document_status_id')) == $id ? 'selected' : '' }}>{{ $document_status }}</option>
                    @endforeach
                </select>
                @if($errors->has('document_status_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('document_status_id') }}
                    </em>
                @endif
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection

@section('scripts')
<script>
    var uploadedFileUpload1Map = {}
Dropzone.options.fileUpload1Dropzone = {
    url: '{{ route('admin.rfas.storeMedia') }}',
    maxFilesize: 200, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 200
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="file_upload_1[]" value="' + response.name + '">')
      uploadedFileUpload1Map[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedFileUpload1Map[file.name]
      }
      $('form').find('input[name="file_upload_1[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($rfa) && $rfa->file_upload_1)
          var files =
            {!! json_encode($rfa->file_upload_1) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="file_upload_1[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@stop