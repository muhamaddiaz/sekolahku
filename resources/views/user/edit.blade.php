@extends('home')

@section('title', 'Main Menu')

@section('content-2')

	<div class="main-class text-white ml-5" 
     style="background-image: url({{asset('images/urban-event-space-model_925x.jpg')}}); background-size: 100% 100%; background-attachment: fixed">
     	<div class="container pt-5">

     		<div class="main-class__greet-text pb-5 pt-5 animated bounceInDown text-center">
     			<img style="width: 30px; height: 30px" src={{asset('images/avatar/man-1.svg')}} alt="no image"/>
                    @if(Auth::user()->role == 1)
          			<h1 style="font-size: 2rem; font-weight: 600">{{Auth::user()->name}}</h1>
          			<h2 style="font-size: 1.5rem; font-weight: 500">{{$school->school_name}}</h2>
                    @elseif(Auth::user()->role == 2)
                         <h1 style="font-size: 2rem; font-weight: 600">{{Auth::user()->name}}</h1>
                         <h2 style="font-size: 1.5rem; font-weight: 500">{{$school->school_name}}</h2>
                    @else
                         <h1 style="font-size: 2rem; font-weight: 600">{{Auth::user()->name}}</h1>
                         <h2 style="font-size: 1.5rem; font-weight: 500">{{$school->school_name}}</h2>
                    @endif
     		</div>

	 		<div class="mainmenu_container">
	 			<!--Administrator profile edit-->
	 				@if(Auth::user()->role == 1)
	 				<?php $show = DB::select("SELECT * FROM users WHERE id=?",[Auth::user()->id]) ?>
	 			<form class="form-horizontal" action="/edit_profile/{{<?php echo $show[0]->id ?>}}" method="post" enctype="multipart/form-data">
	 			{{ csrf_field() }}
	 			<input type="hidden" name="id" value="<?php echo $show[0]->id ?>">
	 				<div class="form-group">
	 					@if(!$show[0]->foto)
	 					<img style="width: 50px; height: 50px" src={{asset('images/avatar/man-1.svg')}} alt="no-image">
	 					<input class="form-control" type="file" name="image" placeholder="Upload Your New Profile Picture">
	 					@else
	 					<img style="width: 50px; height: 50px" src="{{url('profile_picture')}}/{{<?php echo $show[0]->foto ?>}}" />
	 					<input class="form-control" type="file" name="image" placeholder="Upload Your New Profile Picture">
	 					@endif
	 				</div>
	 				<div class="form-group">
	 					<label class="control-label">Name : </label>
	 					<input class="form-control" type="text" name="name" value="<?php echo $show[0]->name ?>">
	 				</div>
	 				<div class="form-group">
	 					<label class="control-label">Username : </label>
	 					<input class="form-control" type="text" name="username" value="<?php echo $show[0]->username ?>">
	 				</div>
	 				<div class="form-group">
	 					<label class="control-label">Email : </label>
	 					<input class="form-control" type="text" name="email" value="<?php echo $show[0]->email ?>">
	 				</div>
	 				<div class="form-group">
	 					<label class="control-label">Password : </label>
	 					<input class="form-control" type="password" name="password" value="<?php echo $show[0]->password ?>">
		 			</div>
		 			<div class="form-group">
		 				<button type="submit" class="btn btn-raised btn-primary pull-right">Submit</button>
                        <button type="reset" class="btn btn-raised btn-warning pull-right">Reset</button>
		 			</div>
		 		</form>
		 		<!--Guru profile edit-->
		 		@elseif(Auth::user()->role == 2)
		 			<?php $show = DB::select("SELECT * FROM guru WHERE user_id=?",[Auth::user()->id]) ?>
		 		<form class="form-horizontal" action="/edit_profile/{{<?php echo $show[0]->id ?>}}" method="post" enctype="multipart/form-data">
		 			{{ csrf_field() }}
		 			<input type="hidden" name="id" value="<?php echo $show[0]->id ?>">
		 			<div class="form-group">
	 					@if(!$show[0]->foto)
	 					<img style="width: 50px; height: 50px" src={{asset('images/avatar/man-1.svg')}} alt="no-image">
	 					<input class="form-control" type="file" name="image" placeholder="Upload Your New Profile Picture">
	 					@else
	 					<img style="width: 50px; height: 50px" src="{{url('profile_picture')}}/{{<?php echo $show[0]->foto ?>}}" />
	 					<input class="form-control" type="file" name="image" placeholder="Upload Your New Profile Picture">
	 					@endif
	 				</div>
	 				<div class="form-group">
	 					<label class="control-label">Name : </label>
	 					<input class="form-control" type="text" name="name" value="<?php echo $show[0]->nama ?>">
	 				</div>
	 				<div class="form-group">
		 				<button type="submit" class="btn btn-raised btn-primary pull-right">Submit</button>
                        <button type="reset" class="btn btn-raised btn-warning pull-right">Reset</button>
		 			</div>
		 		</form>
		 		<!--Siswa profile edit-->
		 		@else
		 		<form class="form-horizontal" action="/edit_profile/{{Auth::user()->id}}" method="post" enctype="multipart/form-data">
		 			{{ csrf_field() }}
		 			<input type="hidden" name="id" value="{{$siswa->id}}">
		 			<div class="form-group">
	 					@if(!$siswa->foto)
	 					<img style="width: 50px; height: 50px" src={{asset('images/avatar/man-1.svg')}} alt="no-image">
	 					<input class="form-control" type="file" name="image" placeholder="Upload Your New Profile Picture">
	 					@else
	 					<img style="width: 50px; height: 50px" src="{{url('profile_picture')}}/{{$siswa->foto}}" />
	 					<input class="form-control" type="file" name="image" placeholder="Upload Your New Profile Picture">
	 					@endif
	 				</div>
	 				<div class="form-group">
	 					<label class="control-label">Name : </label>
	 					<input class="form-control" type="text" name="name" value="{{$siswa->nama}}">
	 				</div>
	 				<div class="form-group">
	 					<label class="control-label">Email : </label>
	 					<input class="form-control" type="text" name="email" value="{{$siswa->email}}">
	 				</div>
	 				<div class="form-group">
		 				<button type="submit" class="btn btn-raised btn-primary pull-right">Submit</button>
                        <button type="reset" class="btn btn-raised btn-warning pull-right">Reset</button>
		 			</div>
		 		</form>
		 			@endif
	 		</div>
	 	</div>
	 </div>

@endsection