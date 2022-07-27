<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TA;
use App\Models\Switching;

class ProtectedController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function dashboard(){
         $suhus = TA::all();
        $suhus2 = TA::orderBy('id','desc')->take(15)->get();

        return view('dashboard')->with([
            'suhus' => $suhus,
            'suhus2' => $suhus2
        ]);

    }    

    public function suhu(){
        $suhus = TA::all();
        $suhus2 = TA::orderBy('id','desc')->take(15)->get();

        return view('suhu')->with([
            'suhus' => $suhus,
            'suhus2' => $suhus2
        ]);
    }

    public function ozon(){
        $suhus = TA::all();
        $suhus2 = TA::orderBy('id','desc')->take(15)->get();
        $switch = Switching::where('id', 1)->first();

        return view('ozon')->with([
            'suhus' => $suhus,
            'suhus2' => $suhus2,
            'switch' => $switch
        ]);
    }
}
