@extends('home')

@section('title', $kelas->full_kelas)

@section('content-2')
    <div class="kelas_greet primary-color-background text-white">
        <div class="container">
            <div class="pt-5 pb-5">
                <h2>{{$kelas->full_kelas}}</h2>
                <h3>{{$kelas->schoolInfo()->first()->school_name}}</h3>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 mt-5">
                <a href="{{route('user.show', ['user' => $wali->id, 'role' => 'pengajar'])}}">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">
                                {{$wali->nama}}
                            </h3>
                            <p class="card-text text-secondary">Wali Kelas</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-9">
                <ul class="nav nav-pills mt-5">
                    <li class="nav-item">
                        <a href="#info" data-toggle="pill" class="nav-link active">Info</a>
                    </li>
                    <li class="nav-item">
                        <a href="#classmates" data-toggle="pill" class="nav-link">ClassMates</a>
                    </li>
                    <li class="nav-item">
                        <a href="#forum" data-toggle="pill" class="nav-link">Forum</a>
                    </li>
                </ul>
                <div class="tab-content mt-3">
                    <div class="tab-pane container active" id="info">
                        <div class="jumbotron bg-primary text-white">
                            <h2>Info Kelas, Input absensi, Input nilai dll</h2>
                        </div>
                    </div>
                    <div class="tab-pane container fade" id="classmates">
                        <div class="card-columns mt-5">
                            @foreach($siswa as $s)
                                <a href="{{route('user.show', $s->id)}}">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="text-center">
                                                <img style="width: 50px; height: 50px" src={{asset('images/avatar/man-1.svg')}} alt="no image"/>
                                            </div>
                                            <br>
                                            <h3 class="card-title">
                                                {{$s->nama}}
                                            </h3>
                                        </div>
                                    </div>
                                </a> 
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane container fade" id="forum">
                        @foreach($forum as $f) 
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
                </div>
            </div>
        </div>
    </div>
@endsection 