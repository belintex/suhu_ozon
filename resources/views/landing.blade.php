@extends('layouts.ta')

@section('content')
<div id="content" class="p-4 p-md-5 pt-5" >
    <div class="container">
        <div class="row justify-content-center">
            <h1 class="col-md-12 text-center mb-5">Home</h1>
            <div class="col-md-4">
                <div class="card-counter info">
                    <i class="fa fa-users"></i>
                    <span class="count-numbers">{{$count/40}}</span>
                    <span class="count-name">Users</span>
                </div>
            </div>
            
        @foreach ($suhus3 as $saha)
    
            <div class="col-md-4">
                <div class="card-counter danger">
                    <i class="fa-solid fa-temperature-high"></i>
                    <span class="count-numbers">{{$saha->suhu_object}}&#8451;</span>
                    <span class="count-name">Object Temperature</span>
                </div>
            </div>
    
            <div class="col-md-4">
                <div class="card-counter success">
                    <i class="fa-solid fa-temperature-high"></i>
                    <span class="count-numbers">{{$saha->suhu_lingkungan}}&#8451;</span>
                    <span class="count-name">Ambient Temperature</span>
                </div>
            </div>    
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-md-4">
                <div class="card-counter primary">
                    <i class="fas fa-cloud"></i>
                    <span class="count-numbers">{{$saha->konsentrasi_ozon}}ppm</span>
                    <span class="count-name">Ozone Concentration</span>
                </div>
            </div>
        
        @endforeach

            @guest

            <div class="col-md-4">
                <div class="card-counter dark">
                    <<i class="fa-solid fa-toggle-on"></i>
                    @if($switch->relay == 1)
                        <span id="status" class="count-numbers">ON</span>                                         
                    @else
                        <span id="status" class="count-numbers">OFF</span>
                                             
                    @endif
                    <span class="count-name">Ozone Generator</span>                    
                </div>
            </div>
    
            <div class="col-md-4">
                <div class="card-counter warning">
                    <i class="fas fa-fan"></i>
                    <span id="posisi" class="count-numbers">{{ $switch->fan }}%</span>
                    <span class="count-name">Fan AC</span>
                </div>
            </div>    

            @else
           
            <div class="col-md-4">
                <div class="card-counter dark">
                    <<i class="fa-solid fa-toggle-on"></i>
                    @if($switch->relay == 1)
                        <span id="status" class="count-numbers">ON</span>
                        <span class="count-switch">
                            <input type="checkbox" checked data-toggle="toggle" data-onstyle="dark" data-offstyle="danger" data-style="border" 
                            onchange="ubahstatus(this.checked)" > 
                        </span>                                          
                    @else
                        <span id="status" class="count-numbers">OFF</span>
                        <span class="count-switch">
                            <input id="toggle-event" type="checkbox" checked data-toggle="toggle" data-onstyle="dark" data-offstyle="danger" data-style="border" 
                            onchange="ubahstatus(this.checked)"> 
                        </span>                       
                    @endif
                    <span class="count-name">Ozone Generator</span>
                </div>
            </div>
    
            <div class="col-md-4">
                <div class="card-counter warning">
                    <i class="fas fa-fan"></i>
                    <span id="posisi" class="count-numbers">{{ $switch->fan }}%</span>
                    <span class="count-name">Fan AC</span>
                    <span class="count-switch"> 
                        {{-- <label for="customRange3" class="form-label">Example range</label> --}}
                        <input value="{{ $switch->fan }}" type="range" class="form-range" min="0" max="100" step="1" id="customRange3" value="0"
                        onchange="ubahposisi(this.value)">
                    </span>
                </div>
            </div>    

            @endguest

        </div>
        {{-- <div class="row justify-content-center mt-5">
            <div class="col-12">
                <h2 class="text-center mt-5">Grafik Suhu & Konsentrasi Ozon</h2>
                <canvas id="myChart" class="w-100"></canvas>
            </div>
        </div> --}}
    </div>
</div>
@endsection

@section('script')
<script>
    $('#toggle-event').bootstrapToggle('off')

    function ubahstatus(value){
        if (value ==true) value="ON";
        else value="OFF";
        document.getElementById('status').innerHTML = value;

        let http = new XMLHttpRequest();

        http.onreadystatechange = function (){
            if(http.readyState == 4 && http.status == 200 ) {
                document.getElementById('status').innerHTML = http.responseText;
            }
        }

        http.open("GET", "/api/switch/" + value, true);
        http.send();
    }

    function ubahposisi(value){
        document.getElementById('posisi').innerHTML = value;

        let http = new XMLHttpRequest();

        http.onreadystatechange = function (){
            if(http.readyState == 4 && http.status == 200 ) {
                document.getElementById('posisi').innerHTML = http.responseText;
            }
        }

        http.open("GET", "/api/fan/" + value, true);
        http.send();
    }


    

    
    
// var app = new Vue({
//   el: '#app',
//   data: {
//     message: 'Hello Vue!'
//   },
//   mounted(){
//     console.log("tes");
//     $(document).ready(function () {
//     $('#datatable').DataTable();
//         const labels = [
//             @foreach ($suhus2 as $s)
//                 "{{ $s->created_at->format('H:i')  }}",
//             @endforeach
//         ];

//         const DATA_COUNT = 7;

//         const data = {
//             labels: labels,
//             datasets: [
//                 {
//                     label: 'Suhu Object',
//                     data:[ 
//                         @foreach ($suhus2 as $s)
//                         {{ $s->suhu_object."," }}
//                         @endforeach
//                     ],
//                     borderColor: '#FF0000',
//                     backgroundColor: '#FF0000'
//                 },
//                 {
//                     label: 'Suhu Lingkungan',
//                     data: [
//                         @foreach ($suhus2 as $s)
//                         {{ $s->suhu_lingkungan."," }}
//                         @endforeach
//                     ],
//                     borderColor: '#0000FF',
//                     backgroundColor: '#0000FF'
//                 },
//                 {
//                     label: 'Konsentrasi Ozon',
//                     data: [
//                         @foreach ($suhus2 as $s)
//                         {{ $s->konsentrasi_ozon."," }}
//                         @endforeach
//                     ],
//                     borderColor: '#008000',
//                     backgroundColor: '#008000'
//                 }
//             ]
//         };

//         const config = {
//             type: 'line',
//             data: data,
//             options: {
//                 responsive: true,
//                 plugins: {
//                 legend: {
//                     position: 'top',
//                 },
//                 title: {
//                     display: true,
//                 }
//                 }
//             },
//         };

//         const myChart = new Chart(
//             document.getElementById('myChart'),
//             config
//         );
//     });


    
//   }
// });


</script>
@endsection