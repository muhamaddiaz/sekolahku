@extends('home')

@section('title', 'Main Menu')

@section('content-2')
    <div class="main-class primary-color">
        <div class="container">
            <div class="main-class__greet-text pt-5 pb-5 animated bounceInDown">
                <h1 style="font-size: 2rem; font-weight: 600">Selamat Datang, {{Auth::user()->name}}</h1>
                <h2 style="font-size: 1.5rem; font-weight: 500">Administrator {{$school->school_name}}</h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <a href="{{route('staff.pengajar')}}">
                        <div class="card primary-color-background text-white">
                            <div class="card-body">
                                <h3 class="card-title">Staff Pengajar</h3>
                                <p class="card-text">0 Guru</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="{{route('staff.pelajar')}}">
                        <div class="card primary-color-background text-white">
                            <div class="card-body">
                                <h3 class="card-title">Pelajar</h3>
                                <p class="card-text">0 Siswa</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="mt-2">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                    Import Data
                </button>
                        <!-- The Modal -->
                <div class="modal show" style="" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                    
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Import Data</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                    
                        <!-- Modal body -->
                        <div class="modal-body">
                            <form method="POST" action="{{route('excel.import')}}" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="excel_data" class="form-control" />
                                <br>
                                <button type="submit" class="btn btn-success">Update Data</button>
                            </form>
                        </div>
                    
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    
                    </div>
                </div>
            </div>
            <br>
            {{-- <div class="school-performance mt-2">
                <h2 style="font-size: 1.5rem; font-weight: 500" class="primary-color">Performansi Sekolah</h2>
            </div> --}}
        </div>
    </div>
@endsection