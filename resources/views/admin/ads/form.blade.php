@php
$rute = isset($data) ? route('admin.ads.update', ['ad' => $data->id]) : '';
$formtype = isset($data) ? 'Edit' : '';

$thumb = '';
$size_w = 0;
$size_h = 0;
$square = 'https://fakeimg.pl/300x250';
$long = 'https://fakeimg.pl/1000x120';
switch ($data->id) {
  case 1: $thumb = $data->image ?? $long;
          $size_w = 1000;
          $size_h = 120;
        break;
  case 2: $thumb = $data->image ?? $long;
          $size_w = 1000;
          $size_h = 120;
        break;
  case 3: $thumb = $data->image ?? $square;
          $size_w = 300;
          $size_h = 250;
        break;
  case 4: $thumb = $data->image ?? $square;
          $size_w = 300;
          $size_h = 250;
        break;
}
@endphp

@extends('_template.master-admin')

@section('page_title', $formtype.' Iklan')

@section('title', $formtype.' Iklan')

@section('content')

<!-- Table -->
<div class="row">
  <div class="col">
    <div class="card">
      <!-- Card header -->
      <div class="card-header">
        <div class="row">
          <div class="col-8">
            <h3 class="mb-0">{{ $formtype }} Iklan</h3>
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
          @if (isset($data))
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="form-control-label" for="url">Url</label>
                    <input type="url" name="url" class="form-control" id="url" placeholder="Http://..." value="{{ old('url', @$data->url) }}">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="form-control-label" for="file_ads">Unggah Iklan</label>
                    <input type="file" name="file_ads" class="form-control" id="file_ads" accept="image/jpg,image/jpeg" value="{{ old('file_ads') }}">
                    <input type="hidden" name="base64_ads" id="base64_ads" value="{{ old('base64_ads') }}">
                    <img class="rounded mt-2 w-100" id="thumb_ads" src="{{ old('base64_ads') }}">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <label class="form-control-label" for="file_ads">Iklan Terpasang</label>
              <div class="d-flex flex-column align-items-center">
                <div class="ads-ad border rounded shadow p-2 mb-3">
                    <a href="{{ ($data->url ?? '#') }}" target="_blank">
                        <img src="{{ $thumb }}" class="img-fluid rounded" alt="Iklan">
                    </a>
                </div>
              </div>
            </div>
          </div>
          @endif

          <div class="row">
            <div class="col-3">
              <div class="form-group">
                <label class="form-control-label" for="active">Aktif?</label>
                <div class="form-switch" id="active">
                  <label class="custom-toggle">
                    <input type="checkbox" name="active" {{ old('active', @$data->active) ?? !isset($data) ? 'checked' : '' }}>
                    <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                  </label>
                </div>
              </div>
            </div>
            <div class="col-9 text-right pt-3">
              <button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i> Save</button>
              <a href="{{ route('admin.ads.index') }}" class="btn btn-light"> <i class="fas fa-times"></i> Cancel</a>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_ads" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="modalLabel">Upload Foto Iklan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <div class="img-container">
                  <img class="w-100" id="image_ads" style="max-height: calc(100vh - 250px)">
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <button type="button" class="btn btn-primary" id="crop_ads">Upload</button>
          </div>
      </div>
  </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
    $(function() {
        var ava_ads = document.getElementById('thumb_ads');
        var image_ads = document.getElementById('image_ads');
        var input_ads = document.getElementById('file_ads');
        var crop_ads = document.getElementById('crop_ads');
        var base64_ads = document.getElementById('base64_ads');

        var $modal_ads = $('#modal_ads');
        var cropper;

        input_ads.addEventListener('change', function (e) {
            var files = e.target.files;
            var done = function (url) {
                image_ads.src = url;
                $modal_ads.modal('show');
            };

            if (files && files.length > 0) {
                let file = files[0];

                reader = new FileReader();
                reader.onload = function (e) {
                    done(reader.result);
                };
                reader.readAsDataURL(file);
            }
        });

        $modal_ads.on('shown.bs.modal', function () {
            cropper = new Cropper(image_ads, {
                aspectRatio: {{ $size_w }}/{{ $size_h }},
                viewMode: 2,
                autoCropArea: 1
            });
        }).on('hidden.bs.modal', function () {
            cropper.destroy();
            cropper = null;
        });

        crop_ads.addEventListener('click', function () {
            var canvas;
            $modal_ads.modal('hide');

            if (cropper) {
                canvas = cropper.getCroppedCanvas({
                    width: {{ $size_w }},
                    height: {{ $size_h }},
                });
                ava_ads.src = canvas.toDataURL('image/jpeg');
                base64_ads.value = canvas.toDataURL('image/jpeg');
            }
        });
    });
</script>
@endpush