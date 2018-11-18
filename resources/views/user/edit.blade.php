@extends('home')

@section('title', 'Pengaturan Akun')

@section('content-2')
    <div class="pengaturan-header primary-color-background pt-5">
        <div class="container pt-5 pb-5 text-white">
            <h1>Perbarui akun</h1>
        </div>
    </div>
	<div class="container mt-4">
        <form action="{{route('user.update', $user->id)}}" enctype="multipart/form-data" method="POST">
            @csrf
            @method("PATCH")
            <div class="form-group">
                <label for="name">Nama Lengkap: </label>
                <input type="text" name="name" value="{{$user->name}}" class="form-control" placeholder="Nama Lengkap">
            </div>
            <div class="form-group">
                <label for="username">Nama pengguna: </label>
                <input type="text" name="username" value="{{$user->username}}" class="form-control" placeholder="Nama Pengguna">
            </div>
            <div class="form-group">
                <label for="email">Email </label>
                <input type="text" name="email" value="{{$user->email}}" class="form-control" placeholder="Alamat Email">
            </div>
            <div class="form-group">
                <label for="photo">Upload foto profil</label>
                <input type="file" name="image" id="photo">
            </div>
            <button type="submit" class="btn btn-success">Perbarui data</button>
        </form>
    </div>
@endsection