@extends('layouts.ta')

@section('content')
<div id="content" class="p-4 p-md-5 pt-5" >
    <div class="container">
        <div class="row">
            <div class="col-12">
            <h1 class="text-center">Tabel Suhu</h1>
            <table id="datatable" class="table table-striped table-bordered" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Suhu Objek<span>(&#8451;)</span></th>
                        <th>Suhu Lingkungan<span>(&#8451;)</span></th>
                        <th>Keterangan</th>
                        <th>Waktu</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- <tr>
                        <td>1</td>
                        <td>33</td>
                        <td>34</td>
                        <td>Aman</td>
                        <td>22.00</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>38</td>
                        <td>36</td>
                        <td>Tidak Aman</td>
                        <td>22.00</td>
                    </tr> --}}
                    @foreach ($suhus as $suhu)
                    <tr>
                        <td>{{$suhu->id}}</td>
                        <td>{{$suhu->suhu_object}}</td>
                        <td>{{$suhu->suhu_lingkungan}}</td>
                        <td>    @if ($suhu->suhu_object <= 37.5 )
                            <button type="submit" class="btn btn-success">Aman</button>
                        @else
                            <button type="submit" class="btn btn-danger">Berbahaya</button>

                        @endif

                        </td>
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
                <h2 class="text-center mt-5">Grafik Suhu</h2>
                <canvas id="myChart" class="w-100"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
Pusher.logToConsole = true;
var pusher = new Pusher('6b0eb4a05db2899da50b', {
    cluster: 'ap1'
});
var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
    console.log(data);
});
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
                    label: 'Suhu Object',
                    data:[ 
                        @foreach ($suhus2 as $s)
                        {{ $s->suhu_object."," }}
                        @endforeach
                    ],
                    borderColor: '#FF0000',
                    backgroundColor: '#FF0000'
                },
                {
                    label: 'Suhu Lingkungan',
                    data: [
                        @foreach ($suhus2 as $s)
                        {{ $s->suhu_lingkungan."," }}
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
