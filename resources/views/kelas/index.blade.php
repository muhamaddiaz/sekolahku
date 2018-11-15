@extends('home')

@section('title', 'Kelas')

@section('content-2')
    <div class="kelas_greet primary-color-background pt-5 pb-5">
        <div class="container">
            <h2 class="text-white">Manajemen kelas</h2>
            <h3 class="text-white">{{$school->school_name}}</h3>
        </div>
    </div>
    <div class="container mt-5">
        @if($errors->any())
            @component('components.alert', ['title' => 'danger'])
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            @endcomponent
        @endif
        @if(session('success'))
            @component('components.alert', ['title' => 'success'])
                {{session('success')}}
            @endcomponent
        @endif
        <div class="row">
            @foreach($kelas as $k)
                <div class="col-md-4 mt-3">
                    <a href="{{route('kelas.show', ['kela' => $k->id])}}">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">
                                    {{$k->tingkat_kelas}} {{$k->jurusan_kelas}} {{$k->bagian_kelas}}
                                </h3>
                                @if($k->guru()->first())
                                    <p class="card-text text-secondary">Wali kelas: {{$k->guru()->first()->nama}}</p>
                                @else 
                                    <p class="card-text text-secondary">Belum terdefinisi</p>
                                @endif
                                <p class="card-text text-secondary">{{$k->siswa()->count()}} Siswa</p>
                                <br>
                                @if(Auth::user()->role == 1)
                                    <a href="{{route('kelas.edit', ['kela' => $k->id])}}" class="btn btn-info">Kelola Kelas</a>
                                    <form style="display:inline-block" action="{{route('kelas.destroy', ['kela' => $k->id])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            Hapus Kelas
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </a> 
                </div>
            @endforeach
        </div>
        <div class="kelas_tambah mt-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Tambah Kelas
            </button>
            <div class="modal show" style="" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">                        
                    <div class="modal-header">
                        <h4 class="modal-title primary-color">Isi data kelas</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>                        
                    <div class="modal-body">
                        <form action="{{route('kelas.store')}}" method="POST">
                            @csrf
                            <label for="#tingkat">Tingkat: </label>
                            <select name="tingkat" id="tingkat" class="form-control" required>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                            <br>
                            <label for="#jurusan">Jurusan: </label>
                            <select name="jurusan" id="jurusan" class="form-control" required>
                                <option value="MIA">MIA</option>
                                <option value="IPS">SOSIAL</option>
                            </select>
                            <br>
                            <label for="#bagian">Bagian: </label>
                            <select name="bagian" id="bagian" class="form-control" required>
                                @for($i = 1; $i <= 10; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                            <br>
                            <label for="#wali">Pilih wali: </label>
                            <select name="wali" id="wali" class="form-control" required>
                                @foreach($guru as $g)
                                    <option value="{{$g->id}}">{{$g->nama}}</option>
                                @endforeach
                            </select>
                            <br>
                            <button type="submit" class="btn btn-success">Kirim data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
@endsection