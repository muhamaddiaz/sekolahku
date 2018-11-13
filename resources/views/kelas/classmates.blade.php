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
        @if(session('success'))
            <div class="mt-3"></div>
            @component('components.alert', ['title' => 'success'])
                {{session('success')}}
            @endcomponent
        @endif
        <div class="row pt-4">
            <div class="col-md-8">
                @if(Auth::user()->siswa()->first())
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a href="#sekolah" data-toggle="pill" class="nav-link active">Sekolah</a>
                    </li>
                    <li class="nav-item">
                        <a href="#kelas" data-toggle="pill" class="nav-link">Kelas</a>
                    </li>
                    <li class="nav-item">
                        <a href="#saya" data-toggle="pill" class="nav-link">Postinganku</a>
                    </li>
                </ul>
                @endif
                <br>
                <div class="tab-content">
                    <div class="tab-pane container active" id="sekolah">
                        @foreach($forums as $f) 
                            <div class="card mt-2 mb-2">
                                <div class="card-body">
                                    <div>
                                        <h2 class="card-title">
                                            {{$f->title}} 
                                            @if($f->user()->first()->role == 0)
                                                <span class="badge badge-secondary" style="font-size: 1rem;">Siswa</span>
                                            @elseif($f->user()->first()->role == 1)
                                                <span class="badge badge-secondary" style="font-size: 1rem;">Admin</span>
                                            @elseif($f->user()->first()->role == 2)
                                                <span class="badge badge-secondary" style="font-size: 1rem;">Guru</span>
                                            @endif
                                        </h2>
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
                    @if(Auth::user()->siswa()->first())
                    <div class="tab-pane container fade" id="kelas">
                        @foreach($kelasForum as $f) 
                            <div class="card mt-2 mb-2">
                                <div class="card-body">
                                    <div>
                                        <h2 class="card-title">
                                            {{$f->title}} 
                                            @if($f->user()->first()->role == 0)
                                                <span class="badge badge-secondary" style="font-size: 1rem;">Siswa</span>
                                            @elseif($f->user()->first()->role == 1)
                                                <span class="badge badge-secondary" style="font-size: 1rem;">Admin</span>
                                            @elseif($f->user()->first()->role == 2)
                                                <span class="badge badge-secondary" style="font-size: 1rem;">Guru</span>
                                            @endif
                                        </h2>
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
                    <div class="tab-pane container fade" id="saya">
                        @foreach(Auth::user()->forums()->get() as $f) 
                            <div class="card mt-2 mb-2">
                                <div class="card-body">
                                    <div>
                                        <h2 class="card-title">
                                            {{$f->title}} 
                                            @if($f->user()->first()->role == 0)
                                                <span class="badge badge-secondary" style="font-size: 1rem;">Siswa</span>
                                            @elseif($f->user()->first()->role == 1)
                                                <span class="badge badge-secondary" style="font-size: 1rem;">Admin</span>
                                            @elseif($f->user()->first()->role == 2)
                                                <span class="badge badge-secondary" style="font-size: 1rem;">Guru</span>
                                            @endif
                                        </h2>
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
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                @if(Auth::user()->siswa()->first())
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
                    <a href="{{route('user.show', $m->id)}}">
                        <div class="card mt-2 mb-2">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 text-center">
                                        <img style="width: 50px; height: 50px" src={{asset('images/avatar/man-1.svg')}} alt="no image"/>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="card-title">{{$m->nama}}</div>
                                        <div class="card-text">{{$m->NISN}}</div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </a>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <a class="button__gradient button__gradient--pilled text-white forum__create-button" href="#diskusi" data-toggle="modal">Mulai Diskusi</a>
    <div class="modal show" style="" id="diskusi">
        <div class="modal-dialog">
            <div class="modal-content">                        
                <div class="modal-header">
                    <h4 class="modal-title primary-color">Mulai Diskusi</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>                        
                <div class="modal-body">
                    <form action="{{route('forum.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" placeholder="Judul Posting" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="description" id="" cols="30" rows="10" placeholder="Deskripsi" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection