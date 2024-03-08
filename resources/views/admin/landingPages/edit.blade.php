@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.landingPage.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.landing-pages.update", [$landingPage->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.landingPage.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $landingPage->title) }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.landingPage.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.landingPage.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description', $landingPage->description) }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.landingPage.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="heading">{{ trans('cruds.landingPage.fields.heading') }}</label>
                <input class="form-control {{ $errors->has('heading') ? 'is-invalid' : '' }}" type="text" name="heading" id="heading" value="{{ old('heading', $landingPage->heading) }}" required>
                @if($errors->has('heading'))
                    <div class="invalid-feedback">
                        {{ $errors->first('heading') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.landingPage.fields.heading_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sub_heading">{{ trans('cruds.landingPage.fields.sub_heading') }}</label>
                <input class="form-control {{ $errors->has('sub_heading') ? 'is-invalid' : '' }}" type="text" name="sub_heading" id="sub_heading" value="{{ old('sub_heading', $landingPage->sub_heading) }}">
                @if($errors->has('sub_heading'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sub_heading') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.landingPage.fields.sub_heading_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="banner_image">{{ trans('cruds.landingPage.fields.banner_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('banner_image') ? 'is-invalid' : '' }}" id="banner_image-dropzone">
                </div>
                @if($errors->has('banner_image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('banner_image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.landingPage.fields.banner_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="introduction">{{ trans('cruds.landingPage.fields.introduction') }}</label>
                <textarea class="form-control {{ $errors->has('introduction') ? 'is-invalid' : '' }}" name="introduction" id="introduction" required>{{ old('introduction', $landingPage->introduction) }}</textarea>
                @if($errors->has('introduction'))
                    <div class="invalid-feedback">
                        {{ $errors->first('introduction') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.landingPage.fields.introduction_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="confirmation_message">{{ trans('cruds.landingPage.fields.confirmation_message') }}</label>
                <textarea class="form-control {{ $errors->has('confirmation_message') ? 'is-invalid' : '' }}" name="confirmation_message" id="confirmation_message">{{ old('confirmation_message', $landingPage->confirmation_message) }}</textarea>
                @if($errors->has('confirmation_message'))
                    <div class="invalid-feedback">
                        {{ $errors->first('confirmation_message') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.landingPage.fields.confirmation_message_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="about">{{ trans('cruds.landingPage.fields.about') }}</label>
                <textarea class="form-control {{ $errors->has('about') ? 'is-invalid' : '' }}" name="about" id="about">{{ old('about', $landingPage->about) }}</textarea>
                @if($errors->has('about'))
                    <div class="invalid-feedback">
                        {{ $errors->first('about') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.landingPage.fields.about_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="photo">{{ trans('cruds.landingPage.fields.photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                </div>
                @if($errors->has('photo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('photo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.landingPage.fields.photo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="facebook">{{ trans('cruds.landingPage.fields.facebook') }}</label>
                <input class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}" type="text" name="facebook" id="facebook" value="{{ old('facebook', $landingPage->facebook) }}">
                @if($errors->has('facebook'))
                    <div class="invalid-feedback">
                        {{ $errors->first('facebook') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.landingPage.fields.facebook_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="twitter">{{ trans('cruds.landingPage.fields.twitter') }}</label>
                <input class="form-control {{ $errors->has('twitter') ? 'is-invalid' : '' }}" type="text" name="twitter" id="twitter" value="{{ old('twitter', $landingPage->twitter) }}">
                @if($errors->has('twitter'))
                    <div class="invalid-feedback">
                        {{ $errors->first('twitter') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.landingPage.fields.twitter_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="linkedin">{{ trans('cruds.landingPage.fields.linkedin') }}</label>
                <input class="form-control {{ $errors->has('linkedin') ? 'is-invalid' : '' }}" type="text" name="linkedin" id="linkedin" value="{{ old('linkedin', $landingPage->linkedin) }}">
                @if($errors->has('linkedin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('linkedin') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.landingPage.fields.linkedin_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    Dropzone.options.bannerImageDropzone = {
    url: '{{ route('admin.landing-pages.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="banner_image"]').remove()
      $('form').append('<input type="hidden" name="banner_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="banner_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($landingPage) && $landingPage->banner_image)
      var file = {!! json_encode($landingPage->banner_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="banner_image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
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
<script>
    Dropzone.options.photoDropzone = {
    url: '{{ route('admin.landing-pages.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="photo"]').remove()
      $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($landingPage) && $landingPage->photo)
      var file = {!! json_encode($landingPage->photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
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
@endsection