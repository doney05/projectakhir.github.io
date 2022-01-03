@extends('layouts.app')

@section('title')
    Paket Travel
@endsection
@section('content')
<div class="container mt-5">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Paket Travel</h1>
        <a class="btn btn-sm btn-primary shadow-sm" href="javascript:void(0)" id="tombol-tambah" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Paket Travel
        </a>
    </div>  
    <table class="table table-bordered table-sm yajra-datatable" id="table_travel">
        <thead>
            <tr>
                <th>No</th>
                <th>Acara</th>
                <th>Tujuan</th>
                <th>Tipe</th>
                <th>Keberangkatan</th>
                <th>Durasi</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>     

      <!-- Modal -->
  <div class="modal fade" id="tambah-edit-modal" aria-hidden="true">
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
                        <label for="title" class="col-sm-12 control-label">Acara</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="title" placeholder="Acara" 
                            id="title" value="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="location" class="col-sm-12 control-label">Tujuan</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="location" placeholder="Lokasi" 
                            id="location" value="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="departure" class="col-sm-12 control-label">Keberangkatan</label>
                        <div class="col-sm-12">
                            <input type="date" class="form-control" name="departure_date" placeholder="Keberangkatan" 
                            id="departure_date" value="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="duration" class="col-sm-12 control-label">Durasi</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="duration" placeholder="Durasi" 
                            id="duration" value="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="type" class="col-sm-12 control-label">Tipe</label>
                        <div class="col-sm-12">                            
                            <select name="type" id="type" class="form-control required">
                                <option value="">Pilih Tipe</option>
                                <option value="Open Trip">Open Trip</option>
                                <option value="Tour">Tour</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="price" class="col-sm-12 control-label">Harga</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="price" placeholder="Harga" 
                            id="price" value="" required>
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

       <!-- MULAI MODAL KONFIRMASI DELETE-->

    <div class="modal fade" tabindex="-1" role="dialog" id="konfirmasi-modal" data-backdrop="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">PERHATIAN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Data Tersebut Akan Hilang Selamanya, Apakah Anda Yakin Ingin Menghapus?</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" name="tombol-hapus" id="tombol-hapus">Hapus
                        Data</button>
                </div>
            </div>
        </div>
    </div>

    <!-- AKHIR MODAL -->
@endsection
@push('prepend-style')
    <!-- MULAI STYLE CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css"
        integrity="sha256-pODNVtK3uOhL8FUNWWvFQK0QoQoV3YA9wGGng6mbZ0E=" crossorigin="anonymous" />
    <!-- AKHIR STYLE CSS -->
    
@endpush
@push('addon-script')
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>

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

    <script type="text/javascript">    
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
        $('#modal-judul').html("Tambah Paket Travel"); //valuenya tambah pegawai baru
        $('#tambah-edit-modal').modal('show'); //modal tampil
    });
    $(document).ready(function () {
            $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true, //aktifkan server-side 
                responsive: true,
                ajax: {
                    url: "{{ route('travel-package.index') }}",
                    type: 'GET'
                },
                columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'title', name: 'title'},
                {data: 'location', name: 'location'},
                {data: 'type', name: 'type'},
                {data: 'departure_date', name: 'departure_date'},
                {data: 'duration', name: 'duration'},
                {data: 'price', name: 'price'},
                {
                    data: 'action', 
                    name: 'action', 
                    orderable: true, 
                    searchable: true
                },
                ]
            });
        });

    //SIMPAN & UPDATE DATA DAN VALIDASI
        if ($("#form-tambah-edit").length > 0) {
            $("#form-tambah-edit").validate({
                submitHandler: function (form) {
                    var actionType = $('#tombol-simpan').val();
                    $('#tombol-simpan').html('Sending..');

                    $.ajax({
                        data: $('#form-tambah-edit')
                            .serialize(), //function yang dipakai agar value pada form-control seperti input, textarea, select dll dapat digunakan pada URL query string ketika melakukan ajax request
                        url: "{{ route('travel-package.store') }}", //url simpan data
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
    
         //TOMBOL EDIT DATA PER PEGAWAI DAN TAMPIKAN DATA BERDASARKAN ID PEGAWAI KE MODAL
        //ketika class edit-post yang ada pada tag body di klik maka
        $('body').on('click', '.edit-post', function () {
            var data_id = $(this).data('id');
            $.get('travel-package/' + data_id + '/edit', function (data) {
                $('#modal-judul').html("Edit Post");
                $('#tombol-simpan').val("edit-post");
                $('#tambah-edit-modal').modal('show');

                //set value masing-masing id berdasarkan data yg diperoleh dari ajax get request diatas               
                $('#id').val(data.id);
                $('#title').val(data.title);
                $('#location').val(data.location);
                $('#type').val(data.type);
                $('#departure_date').val(data.departure_date);
                $('#duration').val(data.duration);
                $('#price').val(data.price);
            })
        });

         //jika klik class delete (yang ada pada tombol delete) maka tampilkan modal konfirmasi hapus maka
        $(document).on('click', '.delete', function () {
            dataId = $(this).attr('id');
            $('#konfirmasi-modal').modal('show');
        });

        //jika tombol hapus pada modal konfirmasi di klik maka
        $('#tombol-hapus').click(function () {
            $.ajax({

                url: "travel-package/" + dataId, //eksekusi ajax ke url ini
                type: 'delete',
                beforeSend: function () {
                    $('#tombol-hapus').text('Hapus Data'); //set text untuk tombol hapus
                },
                success: function (data) { //jika sukses
                    setTimeout(function () {
                        $('#konfirmasi-modal').modal('hide'); //sembunyikan konfirmasi modal
                        var oTable = $('#table_pegawai').dataTable();
                        oTable.fnDraw(false); //reset datatable
                    });
                    iziToast.warning({ //tampilkan izitoast warning
                        title: 'Data Berhasil Dihapus',
                        message: '{{ Session('
                        delete ')}}',
                        position: 'bottomRight'
                    });
                }
            })
        });


    </script>
@endpush