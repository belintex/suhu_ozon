@extends('layouts.ta')

@section('content')
<div id="content" class="p-4 p-md-5 pt-5" >
    <div class="container">
        <div class="row">
            <div class="col-12">
            <h1 class="text-center">Tabel Konsentrasi Ozon</h1>
            <table id="datatable" class="table table-striped table-bordered" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Konsentrasi Ozon(ppm)</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                        <th>Waktu</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suhus as $suhu)
                    <tr>
                        <td>{{$suhu->id}}</td>
                        <td>{{$suhu->konsentrasi_ozon}}</td>
                        
                        
                        @if ($suhu->konsentrasi_ozon <= 0.03 )

                        <td>
                            <p>1. Generator Ozon <button type="submit" class="btn btn-success">ON</button></p>
                            <p>2. Fan <button type="submit" class="btn btn-info">ON</button></p>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-success">Aman</button>
                        </td>

                        @else

                        <td>
                            <p>1. Generator Ozon <button type="submit" class="btn btn-danger">OFF</button></p>
                            <p>2. Fan <button type="submit" class="btn btn-danger">OFF</button></p>

                        </td>
                        <td>
                            <button type="submit" class="btn btn-danger">Berbahaya</button>
                        </td>
                        
                        @endif
    
                        
                        <td>{{ $suhu->created_at }}
                            {{-- <a href="/edit/{{$product->id}}" class="btn btn-success">Edit</a>
                            <form action="/delete/{{$product->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                            </form> --}}
                            {{-- {{$suhu->timestam}} --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>  
        <div class="row">
            <div class="col-12">
                <h2 class="text-center mt-5">Grafik Konsentrasi Ozon</h2>
                <canvas id="myChart" class="w-100"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')
<script>
var app = new Vue({
  el: '#app',
  data: {
    message: 'Hello Vue!'
  },
  mounted(){
    console.log("tes");
    $(document).ready(function () {
    $('#datatable').DataTable();
        const labels = [
            @foreach ($suhus2 as $s)
                "{{ $s->created_at->format('H:i')  }}",
            @endforeach
        ];

        const DATA_COUNT = 7;

        const data = {
            labels: labels,
            datasets: [
                {
                    label: 'Konsentrasi Ozon',
                    data:[ 
                        @foreach ($suhus2 as $s)
                        {{ $s->konsentrasi_ozon."," }}
                        @endforeach
                    ],
                    borderColor: '#0000FF',
                    backgroundColor: '#0000FF'
                }
            ]
        };

        const config = {
            type: 'line',
            data: data,
            options: {
                responsive: true,
                plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                }
                }
            },
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    });

    $('#sidebarCollapse').on('click', function () {
      $('#sidebar').toggleClass('active');
    });


    
  }
});


</script>
@endsection
