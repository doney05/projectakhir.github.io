@extends('layouts.app')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Transaksi</h1>
    </div>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>        
    @endif

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('transaction.store') }}" method="POST">
            @csrf
                <div class="form-group">
                    <label for="travel_packages_id">Travel</label>
                    <select name="travel_packages_id" required class="form-control">
                        <option value="">Pilih Travel</option>
                         @foreach ($travel_packages as $travel_package)
                         <option value="{{ $travel_package->id }}">
                         {{  $travel_package->title }}
                         </option>                            
                         @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="pembeli">Pembeli</label>
                    <input type="text" class="form-control" name="pembeli" placeholder="Pembeli" value="{{ old('pembeli') }}">
                </div>
                <div class="form-group">
                    <label for="additional_visa">Visa</label>
                    <select name="additional_visa" id="type" class="form-control required">
                        <option value="">Pilih Visa</option>
                        <option value="30 Days">30 Days</option>
                        <option value="N/A">N/A</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="transaction_total">Total</label>
                    <input type="text" class="form-control" name="transaction_total" placeholder="Total" value="{{ old('transaction_total') }}">
                </div>
                <div class="form-group">
                    <label for="transaction_status">Status</label>
                    <input type="text" class="form-control" name="transaction_status" placeholder="Status" value="{{ old('transaction_status') }}">
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    Simpan
                </button>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->   
@endsection
