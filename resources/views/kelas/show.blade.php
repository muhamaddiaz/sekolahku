@extends('home')

@section('title', $kelas->full_kelas)

@section('content-2')
    <div class="container">
        <div class="kelas_greet">
            <h2 class="primary-color mt-5">{{$kelas->full_kelas}}</h2>
        </div>
        <div class="row">
            @foreach($siswa as $s)
                <div class="col-md-4 mt-3">
                    <a href="">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">
                                    {{$s->nama}}
                                </h3>
                            </div>
                        </div>
                    </a> 
                </div>
            @endforeach
        </div>
    </div>
@endsection