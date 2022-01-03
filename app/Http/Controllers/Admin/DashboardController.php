<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use App\Models\TravelPackage;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.admin.dashboard', [ 
        'paket_travel' => TravelPackage::count(),
        'transactions' => Transaksi::count(),
        'transaction_pending' => Transaksi::where('transaction_status', 'PENDING')->count(),
        'transaction_success' => Transaksi::where('transaction_status', 'SUCCESS')->count()
    ]);
    }
}
