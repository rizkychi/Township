@extends('_template.master-admin')

@section('page_title', 'Iklan')

@section('title', 'Iklan')

@section('content')
<!-- Table -->
<div class="row">
  <div class="col">
    <div class="card">
      <!-- Card header -->
      <div class="card-header">
        <div class="row">
          <div class="col-8">
            <h3 class="mb-0">Iklan</h3>
            <p class="text-sm mb-0">
              Manajemen tampilan iklan website Jogmatis.
            </p>
          </div>
        </div>
      </div>
      <div class="table-responsive py-4">
        <table class="table table-flush w-100 dtx">
          <thead class="thead-light">
            <tr>
              <th>No</th>
              <th>Gambar</th>
              <th>Url</th>
              <th>Posisi</th>
              <th>Published</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
  $(function() {
    var table = $('.dtx').DataTable({
      paging: false,
      searching: false,
      info: false,
      ordering: false,
      processing: true,
      serverSide: true,
      ajax: "{{ route('admin.ads.json') }}",
      columns: [{
          data: 'DT_RowIndex',
          name: 'DT_RowIndex'
        },
        {
          data: 'image',
          name: 'image',
          render: function (data, type, row, meta) {
            square = 'https://fakeimg.pl/300x250'
            long = 'https://fakeimg.pl/1000x120'
            if (data == null) {
              switch (row.id) {
                case 1: img = long; break;
                case 2: img = long; break;
                case 3: img = square; break;
                case 4: img = square; break;
              }
            } else {
              img = data
            }
            return '<img style="max-width:200px; width: 100%" src="' + img + '" />'
          }
        },
        {
          data: 'url',
          name: 'url',
          render: function (data, type, row, meta) {
            if (data == null) {
              url = ''
            } else {
              url = '<a href="' + data + '" class="" title="Edit"><i class="fas fa-external-link-alt"></i></a>'
            }
            return url;
          }
        },
        {
          data: 'position',
          name: 'position'
        },
        {
          data: 'active',
          name: 'active',
          render: function (data, type, row, meta) {
            if (data == true) {
              button = '<span class="badge badge-success">Yes</span>';
            } else {
              button = '<span class="badge badge-warning">No</span>';
            }
            return button;
          }
        },
        {
          data: 'action',
          name: 'action',
          orderable: false,
          searchable: false
        },
      ],
    });
  });
</script>
@endpush