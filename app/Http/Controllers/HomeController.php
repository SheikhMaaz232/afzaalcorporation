<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use App\Models\Contract;
use App\Models\DispatchEntry;
use App\Models\Seller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalContracts = Contract::count();
        $existingContractIds = DispatchEntry::pluck('contract_id');
        $totalPendingContracts = Contract::whereNotIn('id', $existingContractIds)->count();
        $totalBuyers = Buyer::count();
        $totalSellers = Seller::count();
        return view('home', compact('totalContracts','totalPendingContracts', 'totalBuyers','totalSellers'));
    }
}
