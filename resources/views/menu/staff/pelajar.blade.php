@extends('home')

@section("title", "List Pelajar")

@section("content-2")
    <div class="main-class pt-5 primary-color">
        <div class="container">
            <ul class="breadcrumb" style="background-color: white">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active"><a>Pelajar</a></li>
            </ul>
            <br>
            <h1 style="font-size: 2rem; font-weight: 600">Anggota Pelajar</h1>
            @if($pelajar)
                <div class="row">
                    @foreach($pelajar as $p)
                        <div class="col-md-4 mt-3">
                            <div class="card">
                                <div class="card-body text-center">
                                    <img src="{{asset('images/avatar/boy.svg')}}" 
                                        style="width: 80px; height: 80px"
                                        class="img-rounded"
                                        alt="pengajar.svg" />
                                    <p class="card-text mb-0 mt-3">{{$p->name}}</p>
                                    <p class="card-text">{{$p->email}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <h2>Pengajar belum di inputkan</h2>
            @endif
        </div>
    </div>
@endsection