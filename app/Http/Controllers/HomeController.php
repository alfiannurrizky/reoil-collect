<?php

namespace App\Http\Controllers;

use App\Charts\MonthlyTargetChart;
use App\Models\Bengkel;
use App\Models\Kontak;
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
    public function index(MonthlyTargetChart $chart)
    {
        $totalBengkel = Bengkel::count();
        $totalInbox = Kontak::count();

        return view('home', [
            'chart' => $chart->build(),
            'totalBengkel' => $totalBengkel,
            'totalInbox' => $totalInbox
        ]);
    }

}
