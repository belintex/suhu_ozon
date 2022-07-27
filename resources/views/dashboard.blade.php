@extends('layouts.ta')

@section('content')
<div id="content" class="p-4 p-md-5 pt-5" >
    <div class="container">
        <div class="col-12">
        <h1 class="text-center">Dashboard</h1>
        <table id="datatable" class="table table-striped table-bordered divToPrint" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Suhu Objek<span>(&#8451;)</span></th>
                    <th>Suhu Lingkungan<span>(&#8451;)</span></th>
                    <th>Konsentrasi Ozon(ppm)</th>
                    <th>Waktu</th>
                </tr>
            </thead>
            <tbody>
                {{-- <tr>
                    <td>1</td>
                    <td>33</td>
                    <td>34</td>
                    <td>0.5</td>
                    <td>22.00</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>38</td>
                    <td>35</td>
                    <td>0.03</td>
                    <td>22.00</td>
                </tr> --}}
                @foreach ($suhus as $suhu)
                    <tr>
                        <td>{{$suhu->id}}</td>
                        <td>{{$suhu->suhu_object}}</td>
                        <td>{{$suhu->suhu_lingkungan}}</td>
                        <td>{{$suhu->konsentrasi_ozon}}</td>
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
        <button type="button" onclick="printDiv()" class="btn btn-success mt-5 float-right">Download Data</button>
        </div>
    </div>  
</div>

@endsection

@section('script')
<script>
function printDiv() {
    // var divToPrint = document.getElementsByClassName('divToPrint');
    // console.log(divToPrint);
    var popupWin = window.open('', '_blank', 'width=800,height=800');
    popupWin.document.open();
    popupWin.document.write(`
        <html>
            <head>
                <link rel="stylesheet" href="assets/css/bootstrap.min.css">
                <style>
                table, th, td {
                    border: 1px solid;
                }
                .dataTables_paginate, .dataTables_info, .dataTables_length, .dataTables_filter{
                    display: none;
                }
                </style>
            </head>
            <body onload="window.print()">
                <table class="table table-striped table-bordered" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Suhu Objek<span>(&#8451;)</span></th>
                            <th>Suhu Lingkungan<span>(&#8451;)</span></th>
                            <th>Konsentrasi Ozon(ppm)</th>
                            <th>Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suhus as $suhu)
                            <tr>
                                <td>{{$suhu->id}}</td>
                                <td>{{$suhu->suhu_object}}</td>
                                <td>{{$suhu->suhu_lingkungan}}</td>
                                <td>{{$suhu->konsentrasi_ozon}}</td>
                                <td>{{ $suhu->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </body>
        </html>`);
    popupWin.document.close();
}

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

        // const DATA_COUNT = 7;

        // const data = {
        //     labels: labels,
        //     datasets: [
        //         {
        //             label: 'Konsentrasi Ozon',
        //             data:[ 
        //                 @foreach ($suhus2 as $s)
        //                 {{ $s->konsentrasi_ozon."," }}
        //                 @endforeach
        //             ],
        //             borderColor: '#0000FF',
        //             backgroundColor: '#0000FF'
        //         }
        //     ]
        // };

        // const config = {
        //     type: 'line',
        //     data: data,
        //     options: {
        //         responsive: true,
        //         plugins: {
        //         legend: {
        //             position: 'top',
        //         },
        //         title: {
        //             display: true,
        //         }
        //         }
        //     },
        // };

        // const myChart = new Chart(
        //     document.getElementById('myChart'),
        //     config
        // );
    });

    $('#sidebarCollapse').on('click', function () {
      $('#sidebar').toggleClass('active');
    });


    
  }
});


</script>
@endsection
