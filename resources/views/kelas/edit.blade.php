@extends('home')

@section('title', 'edit')

@section('content-2')
    <div class="kelas_greet primary-color-background pt-5 pb-5">
        <div class="container">
            <h2 class="text-white">{{$kelas->full_kelas}}</h2>
            <h3 class="text-white">Perbarui informasi kelas</h3>
        </div>
    </div>
    <div class="container mt-4">
        <form action="{{route('kelas.update', $kelas->id)}}" method="POST">
            @csrf
            @method('PATCH')
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
            <button type="submit" class="btn btn-success">Perbarui data</button>
        </form>
    </div>

@endsection
