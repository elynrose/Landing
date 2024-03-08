@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.campaign.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.campaigns.update", [$campaign->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="list_id">{{ trans('cruds.campaign.fields.list') }}</label>
                            <select class="form-control select2" name="list_id" id="list_id" required>
                                @foreach($lists as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('list_id') ? old('list_id') : $campaign->list->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('list'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('list') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.campaign.fields.list_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="title">{{ trans('cruds.campaign.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $campaign->title) }}" required>
                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.campaign.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="body">{{ trans('cruds.campaign.fields.body') }}</label>
                            <textarea class="form-control ckeditor" name="body" id="body">{!! old('body', $campaign->body) !!}</textarea>
                            @if($errors->has('body'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('body') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.campaign.fields.body_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="link">{{ trans('cruds.campaign.fields.link') }}</label>
                            <input class="form-control" type="text" name="link" id="link" value="{{ old('link', $campaign->link) }}">
                            @if($errors->has('link'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('link') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.campaign.fields.link_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="label">{{ trans('cruds.campaign.fields.label') }}</label>
                            <input class="form-control" type="text" name="label" id="label" value="{{ old('label', $campaign->label) }}">
                            @if($errors->has('label'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('label') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.campaign.fields.label_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('frontend.campaigns.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $campaign->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection