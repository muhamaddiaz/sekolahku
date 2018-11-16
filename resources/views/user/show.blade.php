@extends('home')

@section('title', 'Main Menu')

@section('content-2')
    <div class="profile-container">
        <div class="profile__header">
            <div class="profile__header__info text-center text-white">
                <img style="width: 100px; height: 100px" src={{asset('images/avatar/man-1.svg')}} alt="no image"/>
                <br><br>
                @if($path == 'profile')
                    <h2>{{$user->name}}</h2>
                    @if($user->siswa()->first())
                        <p>{{$user->siswa()->first()->NISN}}</p>
                    @elseif($user->guru()->first())
                        <p>Tenaga pengajar</p>
                    @else
                        <p>Administrator</p> 
                    @endif
                @else 
                    <h2>{{$user->nama}}</h2>
                    @if($user)
                        <p>{{$user->NISN}}</p>
                    @endif
                @endif
            </div>
        </div>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mt-2">
                        <div class="card-body">
                            @if($path != 'profile') 
                                @if($user)
                                    <h3>{{$user->nama}}</h3>
                                    <p class="text-secondary card-text">{{$user->email}}</p>
                                    <p class="text-secondary card-text">Rep 2241</p>
                                @endif
                            @else 
                                <h3>{{$user->name}}</h3>
                                <p class="text-secondary card-text">{{$user->email}}</p>
                                <p class="text-secondary card-text">Rep 2241</p>
                            @endif
                        </div>
                    </div>
                    @if($path == 'profile')
                        @if($user->siswa()->first() || $user->guru()->first())
                        <div class="card mt-3">
                            <div class="card-body">
                                @if($user->siswa()->first())
                                    <h3>{{$user->siswa()->first()->kelas()->first()->full_kelas}}</h3>
                                    <p class="text-secondary">{{$user->siswa()->first()->kelas()->first()->guru()->first()->nama}}</p>
                                @else
                                    @if($user->guru()->first()->kelas()->first()) 
                                        <a href="{{route('kelas.show', $user->guru()->first()->kelas()->first()->id)}}">
                                            <h3>{{$user->guru()->first()->kelas()->first()->full_kelas}}</h3>
                                            @if($user->guru()->first()->kelas()->first()->guru_id == Auth::user()->guru()->first()->id)
                                                <p class="text-secondary">Wali kelas</p>
                                            @endif
                                        </a>
                                    @endif
                                @endif
                            </div>
                        </div>
                        @endif
                    @else 
                        <div class="card mt-3">
                            <div class="card-body">
                                <h3>{{$user->kelas()->first()->full_kelas}}</h3>
                                <p class="text-secondary">{{$user->kelas()->first()->guru()->first()->nama}}</p>
                            </div>
                        </div>
                    @endif
                    @if($path != 'profile')
                        @if(Auth::user()->id == $user->user()->first()->id)
                            <div class="list-group mt-3">
                                <a href="{{route('user.edit', Auth::user()->id)}}" class="list-group-item list-group-action text-primary">Pengaturan akun</a>
                                <a class="list-group-item list-group-item-action text-danger" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        @endif
                    @else
                        @if(Auth::user()->id == $user->id)
                        <div class="list-group mt-3">
                            <a href="{{route('user.edit', Auth::user()->id)}}" class="list-group-item list-group-action text-primary">Pengaturan akun</a>
                            <a class="list-group-item list-group-item-action text-danger" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                        @endif
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