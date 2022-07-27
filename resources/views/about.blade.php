@extends('layouts.ta')

@section('content')
<div id="content" class="p-4 p-md-5 pt-5" >
    <div class="container">
        <div class="row justify-content-center">
            <h1 class="col-md-12 text-center mb-5">About Us</h1>
            <div class="col-md-12 a">
                <p>Penelitian ini merupakan penelitian terapan/aplikatif dan eksperimenal. Penelitian ini bertujuan untuk membuat sebuah prototipe dari 
                    pendeteksian suhu tubuh manusia dan alat disinfeksi ozon yang dapat dipantau dan dikendalikan secara jarak jauh. Indikator yang 
                    digunakan pada penelitian ini adalah tingkat konsentrasi ozon yang dihasilkan generator ozon dan nilai suhu tubuh manusia yang didapatkan dari sensor.
                Sensor yang digunakan dalam pendeteksian suhu tubuh manusia yaitu sensor MLX90614, dimana sensor ini merupakan sebuah sensor yang dapat mendeteksi suhu
                tanpa kontak dengan menggunakan infrared. Sedangkan, untuk mengukur tingkat konsentrasi ozon digunakan sebuah sensor MQ131 dimana dapat mengukur 
                dengan akurasi 0-2000ppb atau 2ppm.  Data yang diperoleh oleh sensor akan dikirimkan ke NodeMCU untuk diproses dan diolah. Data tersebut akan dikirimkan
                ke server sehingga dapat diakses secara online.
            </p>
                    <p></p>
            </div>
        </div>
        {{-- <table width="100%">
            <tbody>
                @foreach ($suhus as $s)
                <tr>
                    <td>{{ $s->suhu_object }}</td>
                </tr>
                @endforeach
            </tbody>
        </table> --}}
    </div>
</div>
@endsection

