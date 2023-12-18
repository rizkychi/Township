@extends('_template.master-admin')

@section('page_title', 'Anggota')

@section('title', 'Anggota')

@section('content')
<!-- Table -->
<div class="row">
  <div class="col">
    <div class="card">
      <!-- Card header -->
      <div class="card-header">
        <div class="row">
          <div class="col-8">
            <h3 class="mb-0">Anggota</h3>
            <p class="text-sm mb-0">
              List yang menjadi anggota Jogmatis.
            </p>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">
            <a href="{{ route('admin.anggota.create') }}" class="btn btn-sm btn-primary">
              <span class="btn-inner--icon"><i class="fas fa-plus"></i> Tambah Anggota</span>
            </a>
          </div>
        </div>
      </div>
      <div class="table-responsive py-4">
        <table class="table table-flush w-100 dtx">
          <thead class="thead-light">
            <tr>
              <th>No</th>
              <th>ID Lokal</th>
              <th>ID NAS KODE REG</th>
              <th>Nama</th>
              <th>No. HP</th>
              <th>Tempat Lahir</th>
              <th>Tanggal Lahir</th>
              <th>Alamat</th>
              <th>Tanggal Register TKSCI</th>
              <th>Jenis Kendaraan</th>
              <th>Warna Kendaraan</th>
              <th>Tahun Kendaraan</th>
              <th>Nopol Kendaraan</th>
              <th>Status</th>
              <th>Keterangan</th>
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
      dom: 'Bfrtip',
      buttons: [
          {
              extend: 'excel',
              text: '<span class="text-success"><i class="fa fa-file-excel"></i>  Excel</span>',
              titleAttr: 'Excel',
              action: newexportaction,
              exportOptions: {
                  columns: ':not(:last-child)',
              }
          }
      ],
      processing: true,
      serverSide: true,
      ajax: "{{ route('admin.anggota.json') }}",
      language: {
        paginate: {
          previous: "<i class='fas fa-angle-left'>",
          next: "<i class='fas fa-angle-right'>"
        }
      },
      columns: [{
          data: 'DT_RowIndex',
          name: 'DT_RowIndex'
        },
        {
          data: 'id_lokal',
          name: 'id_lokal'
        },
        {
          data: 'kode_reg',
          name: 'kode_reg'
        },
        {
          data: 'nama',
          name: 'nama'
        },
        {
          data: 'no_hp',
          name: 'no_hp'
        },
        {
          data: 'tempat_lahir',
          name: 'tempat_lahir',
          visible: false
        },
        {
          data: 'tgl_lahir',
          name: 'tgl_lahir',
          visible: false
        },
        {
          data: 'alamat',
          name: 'alamat',
          visible: false
        },
        {
          data: 'tgl_reg_tksci',
          name: 'tgl_reg_tksci',
          visible: false
        },
        {
          data: 'kendaraan_jenis',
          name: 'kendaraan_jenis',
          visible: false
        },
        {
          data: 'kendaraan_warna',
          name: 'kendaraan_warna',
          visible: false
        },
        {
          data: 'kendaraan_tahun',
          name: 'kendaraan_tahun',
          visible: false
        },
        {
          data: 'kendaraan_nopol',
          name: 'kendaraan_nopol',
          visible: false
        },
        {
          data: 'status_label',
          name: 'status_label',
          visible: false
        },
        {
          data: 'keterangan',
          name: 'keterangan',
          visible: false
        },
        {
          data: 'action',
          name: 'action',
          orderable: false,
          searchable: false
        },
      ],
    });
    
    $('[data-toggle="tooltip"]').tooltip()

    $('.dtx').on('click', 'a.btn-lihat', function(e) {
      e.stopPropagation();
      e.preventDefault();

      _id = $(this).data('id');
      
      $.post('{{ route("admin.anggota.detail") }}', { id: _id, _token: "{{ csrf_token() }}"}, function(result){
        rs = JSON.parse(result);
        console.log(rs)
        Swal.fire({
          title: 'Detail anggota',
          width: '800px',
          html: `
            <table class="table table-sm table-custom">
              <tr>
                <th class="col-md-2">ID Lokal</th>
                <td class="col-auto">:</td>
                <td class="col-md-4">${rs.id_lokal ?? '-'}</td>
                <th class="col-md-2">Tanggal Reg TKSCI</th>
                <td class="col-auto">:</td>
                <td class="col-auto">${rs.tgl_reg_tksci ?? '-'}</td>
              </tr> 
              <tr>
                <th>ID_NAS KODE_REG</th>
                <td>:</td>
                <td>${rs.kode_reg ?? '-'}</td>
                <th class="col-md-2">Status</th>
                <td class="col-auto">:</td>
                <td class="col-auto"><span class="badge badge-${rs.status_label_color}" title="${rs.keterangan}">${rs.status_label}</span></td>
              </tr>
              <tr>
                <th>Nama</th>
                <td>:</td>
                <td colspan="4">${rs.nama ?? '-'}</td>
              </tr>
              <tr>
                <th>Tempat/Tanggal Lahir</th>
                <td>:</td>
                <td colspan="4">${rs.tempat_lahir ?? '-'}, ${rs.tgl_lahir ?? '-'}</td>
              </tr>
              <tr>
                <th>No. HP (Whatsapp)</th>
                <td>:</td>
                <td colspan="4">${rs.no_hp ?? '-'}</td>
              </tr>
              <tr>
                <th>Alamat</th>
                <td>:</td>
                <td colspan="4">${rs.alamat ?? '-'}</td>
              </tr>
            </table>
            <table class="table table-sm">
              <thead>
                <tr class="table-primary">
                  <th scope="col">Jenis Kijang</th>
                  <th scope="col">Warna</th>
                  <th scope="col">Nomor Polisi</th>
                  <th scope="col">Tahun</th>
                </tr>
              </thead>
              <tbody>
                <tr class="table-light">
                  <td>${rs.kendaraan_jenis ?? '-'}</td>
                  <td>${rs.kendaraan_warna ?? '-'}</td>
                  <td>${rs.kendaraan_nopol ?? '-'}</td>
                  <td>${rs.kendaraan_tahun ?? '-'}</td>
                </tr>
              </tbody>
            </table>
          `,
        });
      });
    });
  });
</script>
@endpush