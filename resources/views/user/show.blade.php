@extends('home')

@section('title', 'Main Menu')

@section('content-2')
    <div class="profile-container">
        <div class="profile__header">
            <div class="profile__header__info text-center text-white">
                <img style="width: 100px; height: 100px" src={{asset('images/avatar/man-1.svg')}} alt="no image"/>
                <br><br>
                <h2>{{$user->nama}}</h2>
                @if($user)
                    <p>{{$user->NISN}}</p>
                @endif
            </div>
        </div>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mt-2">
                        <div class="card-body">
                            @if($user)
                                <h3>{{$user->nama}}</h3>
                                <p class="text-secondary card-text">{{$user->email}}</p>
                                <p class="text-secondary card-text">Rep 2241</p>
                            @endif
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            @if($user)
                                <h3>{{$user->kelas()->first()->full_kelas}}</h3>
                                <p class="text-secondary">{{$user->kelas()->first()->guru()->first()->nama}}</p>
                            @endif
                        </div>
                    </div>
                    @if(Auth::user()->id == $user->user()->first()->id)
                        <div class="list-group mt-3">
                            <a href="{{route('user.edit', Auth::user()->id)}}" class="list-group-item list-group-action text-primary">Pengaturan akun</a>
                         </div>
                    @endif
                </div>
                <div class="col-md-8">
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
            </div>
        </div>
    </div>
@endsection