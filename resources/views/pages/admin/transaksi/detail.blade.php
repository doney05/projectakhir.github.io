@extends('layouts.app')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Transaksi </h1>
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
        <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <td>{{ $item->id }}</td>
                </tr>
                <tr>
                    <th>Paket Travel</th>
                    <td>{{ $item->travel_package->title }}</td>
                </tr>
                <tr>
                    <th>Pembeli</th>
                    <td>{{ $item->pembeli }}</td>
                </tr>
                <tr>
                    <th>Additional Visa</th>
                    <td>{{ $item->additional_visa }}</td>
                </tr>
                <tr>
                    <th>Total Transaksi</th>
                    <td>${{ $item->transaction_total }}</td>
                </tr>
                <tr>
                    <th>Status Transaksi</th>
                    <td>{{ $item->transaction_status }}</td>
                </tr>
        </table>

        </div>
    </div>

</div>
<!-- /.container-fluid -->   
@endsection
