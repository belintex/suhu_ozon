<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TA;
use App\Models\Switching;

class APIController extends Controller
{
    public function getData($suhu_object, $suhu_lingkungan, $konsentrasi_ozon){

        // $data = [
        //     'suhu_object' => $suhu_object,
        //     'suhu_lingkuangan' => $suhu_lingkungan,
        //     'konsentrasi_ozon'=> $konsentrasi_ozon
        // ];

        TA::insert([
            'suhu_object' => $suhu_object,
            'suhu_lingkungan' => $suhu_lingkungan,
            'konsentrasi_ozon' => $konsentrasi_ozon
        ]);
        
        $data = [
            'status' => 'berhasil' 
        ];

        return response()->json($data);
    }

    public function getSwitch($stat){
        if($stat=="ON"){
            Switching::where('id', 1)->update([
                'relay' => 1,
            ]);

            // echo "ON";
        } 
            
        else {
            Switching::where('id', 1)->update([
                'relay' => 0,
            ]);

            // echo "OFF";
        }

        // $data = [
        //     "ON"
        // ];

        return response()->json($stat);
        
    }

    public function getFan($stat){
        if($stat >= 0 && $stat <= 100) {
            Switching::where('id', 1)->update([
                'fan' => $stat,
            ]);
    
        } 
            
        else {
            Switching::where('id', 1)->update([
                'fan' => 150,
            ]);

            // echo "OFF";
        }

        // $data = [
        //     $stat
        // ];

        return response()->json($stat);
        
    }
    

    public function tes(){
        event(new \App\Events\MyEvent("tes"));
        return "berhasil send";
    }

    
}
