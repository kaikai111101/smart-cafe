<?php

namespace App\Http\Controllers;
use App\Models\Sale;
use App\Services\SaleService;
use Illuminate\Support\Carbon;

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
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $sY = SaleService::getSalesForLastNYear(12);
        $sM = SaleService::getSalesForLastNMonth(12);
        $tableS = SaleService::getSalesOfTheYear(2013);
        return view('components.dashboard')->with('salesYearly', $sY)->with('salesMonthly', $sM)->with('tableData', $tableS);
    }
}
