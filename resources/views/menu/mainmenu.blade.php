@extends('home')

@section('title', 'Main Menu')

@section('content-2')
<div class="main-class text-white ml-5 pb-3" style="background-image: url({{asset('images/space.jpg')}}); background-size: 100% 100%; background-attachment: fixed">
    <div class="container pt-5">
        @if(session('success'))
        @component('components.alert', ['title' => 'success'])
        {{session('success')}}
        @endcomponent
        @endif
        @if(session('danger'))
        @component('components.alert', ['title' => 'danger'])
        {{session('danger')}}
        @endcomponent
        @endif
        <div class="greet-user text-white mt-3">
            <h1>SMAN 1 Parakansalak System</h1>
            <h2>Selamat datang kembali</h2>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="main-class__greet-text mb-4 mt-4 p-5 animated bounceInDown primary-color" style="background-color: white; border-radius: 10px">
                    <div class="row">
                        <div class="col-md-3 text-center">
                            <img style="width: 100px; height: 100px" src={{asset('images/avatar/man-1.svg')}} alt="no image" />
                        </div>
                        <div class="col-md-9 pt-3">
                            <h1 style="font-size: 2rem; font-weight: 600">{{Auth::user()->name}}</h1>
                            @if(Auth::user()->role == 1)
                            <h2 style="font-size: 1.5rem; font-weight: 500">Administrator {{$school->school_name}}</h2>
                            @elseif(Auth::user()->role == 2)
                            <h2 style="font-size: 1.5rem; font-weight: 500">Tenaga Pengajar {{$school->school_name}}</h2>
                            @else
                            <h2 style="font-size: 1.5rem; font-weight: 500">Pelajar {{$school->school_name}}</h2>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="main-class__greet-text mb-4 mt-4 p-5 animated bounceInDown primary-color" style="background-color: white; border-radius: 10px">
                    <h1 style="font-size: 2.8rem; font-weight: 600">4123</h1>
                    @if(Auth::user()->role == 1)
                    <h2 style="font-size: 1.5rem; font-weight: 500">Administrator {{$school->school_name}}</h2>
                    @elseif(Auth::user()->role == 2)
                    <h2 style="font-size: 1.5rem; font-weight: 500">Tenaga Pengajar {{$school->school_name}}</h2>
                    @else
                    <h2 style="font-size: 1.5rem; font-weight: 500">Reputasi</h2>
                    @endif
                </div>
            </div>
        </div>

        <div class="mainmenu_container">
            @if(Auth::user()->role == 1)
            <div style="display: flex; justify-content: center">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="pill" href="#terbaru">Terbaru</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#kelola">Kelola data</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#import">Input data Excel</a>
                    </li>
                </ul>
            </div>
            @endif
            <br>
            @if(Auth::user()->role == 0)
            <div class="class-mates_highlight primary-color">
                <div class="text-center">
                    <h2 class="primary-color">
                        ClassMates @ {{Auth::user()->siswa()->first()->kelas()->first()->full_kelas}}
                    </h2>
                </div>

                <div class="row mb-4">
                    @foreach($classMates as $c)
                    <div class="col-md-3 mt-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <img src="{{asset('images/avatar/boy.svg')}}" style="width: 80px; height: 80px" class="img-rounded"
                                    alt="pengajar.svg" />
                                <p class="card-text mb-0 mt-3">{{$c->nama}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
            <div class="tab-content">
                <div class="tab-pane container active" id="terbaru">
                    <div class="jumbotron text-center primary-color-background text-white">
                        <div class="container">
                            <h3>Cari tahu sesuatu yang baru</h3>
                            <p>anda akan mendapatkannya</p>
                        </div>
                    </div>
                    <div class="terbaru">
                        <div class="emading-highlight mt-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="primary-color-background p-4" style="border-radius: 10px">
                                        <h2 class="mb-2">E - Mading</h2>
                                        <p class="mb-4">Sekilas informasi mading terbaru</p>
                                        <div class="card-columns">
                                            @foreach($madingHigh as $m)
                                            <div class="card primary-color">
                                                <div class="card-body">
                                                    <h4 class="card-title">{{$m->judul_mading}}</h4>
                                                    <img style="width: 100%; height: 100%" src="{{url('mading_picture')}}/{{$m->image_mading }}"
                                                        alt="no image" />
                                                    <p class="card-text">{{ substr($m->deskripsi, 0, 50)}}{{
                                                        strlen($m->deskripsi) > 50 ? "..." : ""}}
                                                    </p>
                                                    <a href="/show/{{$m->id}}">Read More</a>
                                                </div>
                                            </div>
                                            @endforeach
                                            <div class="card primary-color">
                                                <div class="card-body">
                                                    <a class="card-text" href="/create_mading">Store Your Information</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane container fade" id="kelola">
                    @if(Auth::user()->role == 1)
                    <div class="row">
                        <div class="col-md-3 mt-3">
                            <a href="{{route('staff.pengajar')}}">
                                <div class="card primary-color-background text-white">
                                    <div class="card-body">
                                        <h3 class="card-title">Staff Pengajar</h3>
                                        <p class="card-text">{{$pengajarCount}} Guru</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 mt-3">
                            <a href="{{route('staff.pelajar')}}">
                                <div class="card primary-color-background text-white">
                                    <div class="card-body">
                                        <h3 class="card-title">Pelajar</h3>
                                        <p class="card-text">{{$pelajarCount}} Siswa</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 mt-3">
                            <a href="{{route('kelas.index')}}">
                                <div class="card primary-color-background text-white">
                                    <div class="card-body">
                                        <h3 class="card-title">Ruang kelas</h3>
                                        <p class="card-text">{{$kelasCount}} Kelas</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 mt-3">
                            <a href="">
                                <div class="card primary-color-background text-white">
                                    <div class="card-body">
                                        <h3 class="card-title">Mata Pelajaran</h3>
                                        <p class="card-text">10 Mata Pelajaran</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <br>
                    <a href="#gurusiswa" data-toggle="modal" class="btn btn-primary">Input data Guru / Siswa</a>
                    @endif
                </div>
                <div class="tab-pane container fade" id="import">
                    @if(Auth::user()->role == 1)
                    <h3 class="primary-color">
                        Input data Pelajar / Pengajar
                    </h3>
                    <div class="mt-3">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            Import Data
                        </button>
                        <a href="{{route('excel.download.siswa')}}" class="btn btn-success">Unduh format excel siswa</a>
                        <a href="{{route('excel.download.guru')}}" class="btn btn-success">Unduh format excel guru</a>
                        <div class="modal show" style="" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title primary-color">Pilih file yang akan diupload</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#home">Pengajar</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#menu1">Pelajar</a>
                                            </li>
                                        </ul>
                                        <br>
                                        <div class="tab-content">
                                            <div class="tab-pane container active" id="home">
                                                <form method="POST" action="{{route('excel.importPengajar')}}" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="file" name="excel_data_pengajar" class="form-control"
                                                        required />
                                                    <br>
                                                    <button type="submit" class="btn btn-success">Insert Data</button>
                                                </form>
                                            </div>
                                            <div class="tab-pane container fade" id="menu1">
                                                <form method="POST" action="{{route('excel.importPelajar')}}" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="file" name="excel_data_pelajar" class="form-control"
                                                        required />
                                                    <br>
                                                    <button type="submit" class="btn btn-success">Insert Data</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal show" style="" id="gurusiswa">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title primary-color">Menamdahkan data</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#ipengajar">Pengajar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#ipelajar">Pelajar</a>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                    <div class="tab-pane container active" id="ipengajar">
                        <form method="POST" action="{{route('excel.importPengajar')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="name" placeholder="Nama lengkap" class="form-control" required>
                            <br>
                            <input type="text" name="username" placeholder="Nama pengguna" class="form-control"
                                required>
                            <br>
                            <input type="email" name="email" placeholder="Email" class="form-control" required>
                            <br>
                            <button type="submit" class="btn btn-success">Rekam data</button>
                        </form>
                    </div>
                    <div class="tab-pane container fade" id="ipelajar">
                        <form method="POST" action="{{route('excel.importPelajar')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="name" placeholder="Nama lengkap" class="form-control" required>
                            <br>
                            <input type="text" name="username" placeholder="Nama pengguna" class="form-control"
                                required>
                            <br>
                            <input type="email" name="email" placeholder="Email" class="form-control" required>
                            <br>
                            <input type="text" name="nisn" placeholder="NISN" class="form-control" required>
                            <br>
                            <button type="submit" class="btn btn-success">Rekam data</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
