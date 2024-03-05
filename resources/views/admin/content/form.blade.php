@php
$rute = isset($data) ? route('admin.content.update', ['content' => $data->id]) : route('admin.content.store');
$formtype = isset($data) ? 'Edit' : 'Tambah';
@endphp

@extends('_template.master-admin')

@section('page_title', $formtype.' Banner')

@section('title', $formtype.' Banner')

@section('content')

<!-- Table -->
<div class="row">
  <div class="col">
    <div class="card">
      <!-- Card header -->
      <div class="card-header">
        <div class="row">
          <div class="col-8">
            <h3 class="mb-0">{{ $formtype }} Konten</h3>
          </div>
        </div>
      </div>

      <div class="card-body">
        <!-- Form groups used in grid -->
        <form action="{{ $rute }}" method="post">
          @csrf
          @if (isset($data))
          {{ method_field('PUT') }}
          @endif
          <div class="row">
            <div class="col-md-9">
              <div class="form-group">
                <label class="form-control-label" for="title">Judul</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Judul konten" value="{{ old('title', @$data->title) }}">
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label class="form-control-label" for="topic">Topik</label>
                <select class="form-control" id="topic" name="topic" data-toggle="select">
                  @foreach ($topics as $topic)
                    <option value="{{ $topic }}" {{ old('topic', @$data->topic) == $topic ? 'selected' : '' }}>{{ $topic }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="form-control-label" for="desc">Konten</label>
                <textarea class="form-control" id="desc" name="desc" placeholder="Isi konten">{{ old('desc', @$data->desc) }}</textarea>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-3">
              <div class="form-group">
                <label class="form-control-label" for="published">Publish?</label>
                <div class="form-switch" id="published">
                  <label class="custom-toggle">
                    <input type="checkbox" name="published" {{ old('published', @$data->published) ?? !isset($data) ? 'checked' : '' }}>
                    <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                  </label>
                </div>
              </div>
            </div>
            <div class="col-9 text-right pt-3">
              <button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i> Save</button>
              <a href="{{ route('admin.content.index') }}" class="btn btn-light"> <i class="fas fa-times"></i> Cancel</a>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
  ClassicEditor
    .create(document.querySelector('#desc'), {
      ckfinder: {
        uploadUrl: '{{route('image.upload').'?_token='.csrf_token()}}',
      }
    })
    .then(editor => {
      window.editor = editor;
    })
    .catch(handleSampleError);

  function handleSampleError(error) {
    const issueUrl = 'https://github.com/ckeditor/ckeditor5/issues';

    const message = [
      'Oops, something went wrong!',
      `Please, report the following error on ${ issueUrl } with the build id "9zhbxo8j5k4p-bnveceq7j5l6" and the error stack trace:`
    ].join('\n');

    console.error(message);
    console.error(error);
  }
</script>
@endpush