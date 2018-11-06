@extends('home')

@section('title', 'Main Menu')

@section('content-2')
    <div class="main-class text-white ml-5 pb-3" 
    style="background-image: url({{asset('images/urban-event-space-model_925x.jpg')}}); background-size: 100% 100%; background-attachment: fixed">
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
            <div class="main-class__greet-text pb-5 pt-5 animated bounceInDown text-center">
                <h1 style="font-size: 2rem; font-weight: 600">Selamat Datang, {{Auth::user()->name}}</h1>
                @if(Auth::user()->role == 1)
                    <h2 style="font-size: 1.5rem; font-weight: 500">Administrator {{$school->school_name}}</h2>
                @elseif(Auth::user()->role == 2)
                    <h2 style="font-size: 1.5rem; font-weight: 500">Tenaga Pengajar {{$school->school_name}}</h2>
                @else
                    <h2 style="font-size: 1.5rem; font-weight: 500">Pelajar {{$school->school_name}}</h2>
                @endif
            </div>
            <div class="mainmenu_container">
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
                
                <br>
                <div class="tab-content">
                    <div class="tab-pane container active" id="terbaru">
                        <div class="jumbotron text-center primary-color-background text-white">
                            <div class="container">
                                <h3>Cari tahu sesuatu yang baru</h3>
                                <p>anda akan mendapatkannya</p>
                            </div>
                        </div>
                        <div class="terbaru">
                            <h2 class="primary-color mb-3">E - Mading</h2>
                            <div class="emading-highlight">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-columns">
                                            @foreach($madingHigh as $m)
                                            <div class="card">
                                                <div class="card-body primary-color-background">
                                                    <h4 class="card-title">{{$m->judul_mading}}</h4>
                                                    <p class="card-text">{{$m->deskripsi}}</p>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane container fade" id="kelola">
                        <div class="row">
                            @if(Auth::user()->role == 1)
                                <div class="col-md-6 mt-3">
                                    <a href="{{route('staff.pengajar')}}">
                                        <div class="card primary-color-background text-white">
                                            <div class="card-body">
                                                <h3 class="card-title">Staff Pengajar</h3>
                                                <p class="card-text">{{$pengajarCount}} Guru</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <a href="{{route('staff.pelajar')}}">
                                        <div class="card primary-color-background text-white">
                                            <div class="card-body">
                                                <h3 class="card-title">Pelajar</h3>
                                                <p class="card-text">{{$pelajarCount}} Siswa</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <a href="{{route('kelas.index')}}">
                                        <div class="card primary-color-background text-white">
                                            <div class="card-body">
                                                <h3 class="card-title">Ruang kelas</h3>
                                                <p class="card-text">10 Kelas</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <a href="">
                                        <div class="card primary-color-background text-white">
                                            <div class="card-body">
                                                <h3 class="card-title">Mata Pelajaran</h3>
                                                <p class="card-text">10 Mata Pelajaran</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        </div>
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
                                                        <input type="file" name="excel_data_pengajar" class="form-control" />
                                                        <br>
                                                        <button type="submit" class="btn btn-success">Insert Data</button>
                                                    </form>
                                                </div>
                                                <div class="tab-pane container fade" id="menu1">
                                                    <form method="POST" action="{{route('excel.importPelajar')}}" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="file" name="excel_data_pelajar" class="form-control" />
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
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection