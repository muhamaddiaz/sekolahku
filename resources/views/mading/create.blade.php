@extends('home')

@section('title','Store Info')

@section('content-2')
	<div class="primary-color-background text-white">
		<div class="container">
			<div class="pt-5 pb-5">
				<h2>Buat Mading</h2>
				<p>Mading umum {{$school->school_name}}</p>
			</div>
		</div>
	</div>
	<div class="container mt-5">
		<form action="{{route('mading.store')}}" method="post" enctype="multipart/form-data">
			@csrf
			<input type="hidden" name="id" value="{{$siswa->id}}" />
			<input class="form-control" type="text" name="judul" placeholder="Judul Berita" />
			<br>
			<input class="form-control" type="file" name="gambar" />
			<br>
			<input class="form-control" type="text" name="kategori" placeholder="Kategori" />
			<br>
			<textarea class="form-control" name="deskripsi" placeholder="Deskripsi" style="width:100%; height:100%;"></textarea>
			<br>
			<button type="submit" class="btn btn-success">Posting Mading</button>
		</form>
	</div>
	
@endsection
