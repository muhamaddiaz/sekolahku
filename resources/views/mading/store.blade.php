@extends('home')

@section('title','Store Info')

@section('content-2')
<div class="main-class text-white ml-5" 
     style="background-image: url({{asset('images/urban-event-space-model_925x.jpg')}}); background-size: 100% 100%; background-attachment: fixed">
     	<div class="container pt-5">

     		<div class="main-class__greet-text pb-5 pt-5 animated bounceInDown text-center">

     			@if(!$siswa->foto)
                         <img style="width: 30px; height: 30px" src={{asset('images/avatar/man-1.svg')}} alt="no image"/>
                @else
                         <img style="width: 30px; height: 30px" src="{{url('profile_picture')}}/{{$siswa->foto }}"" alt="no image"/>
                @endif
                         <h1 style="font-size: 2rem; font-weight: 600">{{Auth::user()->name}}</h1>
                         <h2 style="font-size: 1.5rem; font-weight: 500">{{$school->school_name}}</h2>
    			<form action="/store_mading" method="post" enctype="multipart/form-data">
        		{{ csrf_field() }}
        		<input type="_hidden" name="id" value="{{$siswa->id}}" />
        		<input class="form-control" type="text" name="judul" placeholder="Judul Berita" />
        		<br>
        		<input class="form-control" type="file" name="gambar" />
        		<br>
        		<input class="form-control" type="text" name="kategori" placeholder="Kategori" />
        		<br>
        		<textarea class="form-control" name="deskripsi" placeholder="Deskripsi" style="width:100%; height:100%;"></textarea>
        		<br>
        		<button type="submit" class="btn btn-success">Store It!</button>
   		 		</form>
   		 	</div>
   		 </div>
</div>

@endsection