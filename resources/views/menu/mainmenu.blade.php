@extends('home')

@section('title', 'Main Menu')

@section('content-2')
    <div class="main-class primary-color">
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
            <div class="main-class__greet-text pb-5 animated bounceInDown">
                <h1 style="font-size: 2rem; font-weight: 600">Selamat Datang, {{Auth::user()->name}}</h1>
                @if(Auth::user()->role == 1)
                    <h2 style="font-size: 1.5rem; font-weight: 500">Administrator {{$school->school_name}}</h2>
                @elseif(Auth::user()->role == 2)
                    <h2 style="font-size: 1.5rem; font-weight: 500">Tenaga Pengajar {{$school->school_name}}</h2>
                @else
                    <h2 style="font-size: 1.5rem; font-weight: 500">Pelajar {{$school->school_name}}</h2>
                @endif
            </div>
            <div class="row">
                @if(Auth::user()->role == 1)
                    <div class="col-md-6">
                        <a href="{{route('staff.pengajar')}}">
                            <div class="card primary-color-background text-white">
                                <div class="card-body">
                                    <h3 class="card-title">Staff Pengajar</h3>
                                    <p class="card-text">{{$pengajarCount}} Guru</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('staff.pelajar')}}">
                            <div class="card primary-color-background text-white">
                                <div class="card-body">
                                    <h3 class="card-title">Pelajar</h3>
                                    <p class="card-text">{{$pelajarCount}} Siswa</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            </div>
            @if(Auth::user()->role == 1)
                <div class="mt-3">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                        Import Data
                    </button>
                    <div class="modal show" style="" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">                        
                            <div class="modal-header">
                                <h4 class="modal-title">Import Data</h4>
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
            <br>
            {{-- <div class="school-performance mt-2">
                <h2 style="font-size: 1.5rem; font-weight: 500" class="primary-color">Performansi Sekolah</h2>
            </div> --}}
        </div>
    </div>
@endsection