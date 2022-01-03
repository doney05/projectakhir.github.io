@extends('layouts.app')
@section('title')
    Galeri Travel
@endsection
{{-- @section('content')
<div class="container mt-5">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Galeri Travel</h1>
        <a class="btn btn-sm btn-primary shadow-sm" href="javascript:void(0)" id="tombol-tambah" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Galeri Travel
        </a>
    </div>  
    <table class="table table-bordered table-sm yajra-datatable" id="table_galeri">
        <thead>
            <tr>
                <th>No</th>
                <th>Paket Travel</th>
                <th>Galeri</th>
                <th>Aksi</th>
            </tr>
        </thead>
    </table>
</div>     
 <!-- Modal -->
 <div class="modal fade" id="tambah-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-judul"></h5>          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <form id="form-tambah-edit" name="form-tambah-edit" class="form-horizontal">
             
                <div class="col-sm-12">

                    <input type="hidden" name="id" id="id">

                    <div class="form-group">
                        <label for="paket_travel" class="col-sm-12 control-label">Paket Travel</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="paket_travel" placeholder="Paket Travel" 
                            id="paket_travel" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="image" class="col-sm-12 control-label">Image</label>
                        <div class="col-sm-12">
                            <input type="file" class="form-control" name="image" placeholder="Image" 
                            id="image" value="">
                        </div>
                    </div>
                </div>
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-block" id="tombol-simpan"
                value="create">Simpan
                </button>
                </div>
            </form>
            </div>
    </div>
  </div>
    
@endsection
@push('prepend-style')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css"> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css"
        integrity="sha256-pODNVtK3uOhL8FUNWWvFQK0QoQoV3YA9wGGng6mbZ0E=" crossorigin="anonymous" />
{{-- @endpush
@push('addon-script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>

<script type="text/javascript" language="javascript"
src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" language="javascript"
src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"
integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js"
integrity="sha256-siqh9650JHbYFKyZeTEAhq+3jvkFCG8Iz+MHdr9eKrw=" crossorigin="anonymous"></script>
    <script>
         $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
        $('#tombol-tambah').click(function () {
        $('#button-simpan').val("create-post"); //valuenya menjadi create-post
        $('#id').val(''); //valuenya menjadi kosong
        $('#form-tambah-edit').trigger("reset"); //mereset semua input dll didalamnya
        $('#modal-judul').html("Tambah Galeri Travel"); //valuenya tambah pegawai baru
        $('#tambah-modal').modal('show'); //modal tampil
    });
        $(document).ready(function() {
            $('#table_galeri').DataTable({
                processing: true,
                serverSide: true, //aktifkan server-side 
                responsive: true,
                ajax: {
                    url: "{{ route('galeri-travel.index') }}",
                    type: 'GET'
                },
                columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'paket_travel', name: 'paket_travel'},
                {data: 'image', name: 'image'},
                {
                    data: 'action', 
                    name: 'action', 
                    orderable: true, 
                    searchable: true
                },
                ]
            });
        });
        if ($("#form-tambah-edit").length > 0) {
            $("#form-tambah-edit").validate({
                submitHandler: function (form) {
                    var actionType = $('#tombol-simpan').val();
                    $('#tombol-simpan').html('Sending..');

                    $.ajax({
                        data: $('#form-tambah-edit')
                            .serialize(), //function yang dipakai agar value pada form-control seperti input, textarea, select dll dapat digunakan pada URL query string ketika melakukan ajax request
                        url: "{{ route('galeri-travel.store') }}", //url simpan data
                        type: "POST", //karena simpan kita pakai method POST
                        dataType: 'json', //data tipe kita kirim berupa JSON
                        success: function (data) { //jika berhasil 
                            $('#form-tambah-edit').trigger("reset"); //form reset
                            $('#tambah-edit-modal').modal('hide'); //modal hide
                            $('#tombol-simpan').html('Simpan'); //tombol simpan
                            var oTable = $('.yajra-datatable').dataTable(); //inialisasi datatable
                            oTable.fnDraw(false); //reset datatable
                            iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                                title: 'Data Berhasil Disimpan',
                                message: '{{ Session('
                                success ')}}',
                                position: 'bottomRight'
                            });
                        },
                        error: function (data) { //jika error tampilkan error pada console
                            console.log('Error:', data);
                            $('#tombol-simpan').html('Simpan');
                        }
                    });
                }
            })
        }
    
    </script>
@endpush --}} 
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Galeri Travel</h1>
        <a href="{{ route('galeri-travel.create') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Galeri Travel
            </a>
    </div>
    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Travel</th>
                            <th>Gambar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @forelse ($items as $item)
                       <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->travel_package->title }}</td>
                        <td>
                            <img src="{{  Storage::url($item->image)  }}" alt="" style="width: 150px" 
                            class="img-thumbnail">    
                        </td>
                        <td>
                            <a href="{{ route('galeri-travel.edit', $item->id) }}" class="btn btn-info">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                            <form action="{{ route('galeri-travel.destroy', $item->id) }}" method="POST" 
                            class="d-inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                            </form>
                        </td>
                      </tr>
                       @empty
                        <tr>
                            <td colspan="7" class="text-center">
                                Data Kosong
                            </td>
                        </tr>  
                       @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->   
@endsection
