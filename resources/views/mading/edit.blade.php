@extends('home')

@section('title','Store Mading Info')

@section('content-2')

	<div class="primary-color-background text-white">
		<div class="container">
			<div class="pt-5 pb-5">
				<h2>Edit Mading</h2>
				<p>{{$mading->judul_mading}}</p>
			</div>
		</div>
	</div>
	<div class="container mt-5">
		<form action="{{route('mading.update', $mading->id)}}" method="post" enctype="multipart/form-data">
			@csrf
			@method('PATCH')
			<input type="hidden" name="id" value="{{$mading->id}}">
			<input type="hidden" name="id_siswa" value="{{$siswa->id}}">
			<input class="form-control" type="text" name="judul" value="{{$mading->judul_mading}}" placeholder="Judul Berita" />
			<br>
			<img src="{{url('mading_picture')}}/{{$mading->image_mading }}" style="width: 50%" />
			<br><br>
			<input class="form-control" type="file" name="gambar" value="{{$mading->image_mading }}" />
			<br>
			<input class="form-control" type="text" name="kategori" value="{{$mading->kategori_mading}}" placeholder="Kategori" />
			<br>
			<textarea class="form-control" name="deskripsi" style="width:100%; height:100%;">
				{{$mading->deskripsi}}
			</textarea>
			<br>
			<button type="submit" class="btn btn-success">Perbarui mading</button>
		</form>
	</div>
	

@endsection
