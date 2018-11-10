@extends('home')

@section("title", "ClassMates")

@section('content-2')
    <div class="class-mates_container" 
    style="background-image: url({{asset('images/school.jpg')}}">
        <div class="class-mates_faded">
            <div class="container">
                <div class="class-mates_head-text primary-color p-5">
                    <h1 class="pt-5">ClassMates</h1>
                    <h3>Cara baru berbagi setiap moment</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row pt-4">
            <div class="col-md-8">
                @foreach($forums as $f) 
                    <div class="card mt-2 mb-2">
                        <div class="card-body">
                            <div>
                                <h2 class="card-title">{{$f->title}}</h2>
                            </div>
                            <div>
                                <p class="card-text">{{$f->description}}</p>
                            </div>
                            <br>
                            <a href="{{ route('forum.show', $f->id) }}" class="btn btn-outline-primary">Lihat diskusi</a>
                        </div>
                        
                    </div>
                @endforeach
            </div>
            <div class="col-md-4">
                <div class="card mt-2">
                    <div class="card-body">
                        <h1 class="card-title">4503</h1>
                        <p class="card-text">Reputasi</p>
                    </div>
                </div>
                <br>
                <h2>My ClassMates</h2>
                <br>
                @foreach($mates as $m)
                    <div class="card mt-2 mb-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 text-center">
                                    <img style="width: 50px; height: 50px" src={{asset('images/avatar/man-1.svg')}} alt="no image"/>
                                </div>
                                <div class="col-md-9">
                                    <div class="card-title">{{$m->nama}}</div>
                                    <div class="card-text">{{$m->nisn}}</div>
                                </div>
                            </div>  
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <a class="button__gradient button__gradient--pilled text-white forum__create-button">Mulai Diskusi</a>
@endsection