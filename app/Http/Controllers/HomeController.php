<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TA;
use App\Models\Switching;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth', ['except' => ['ta']]);
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(){
        return view('home');
    }


    public function landing()
    {
        $suhus = TA::all();
        $suhus3 = TA::orderBy('id','desc')->take(1)->get();
        $suhus2 = TA::orderBy('id','desc')->take(15)->get();        
        $switch = Switching::where('id', 1)->first();
        $count = TA::count();

        return view('landing')->with([
            'suhus' => $suhus,
            'suhus2' => $suhus2,
            'switch' => $switch,
            'count' => $count,
            'suhus3' => $suhus3

        ]);
    }

    public function about(){
        $suhus = TA::all();
        return view('about')->with([
            'suhus' => $suhus
        ]);
    }

    public function ta(){
        return view('layouts.ta');
    }

}
