@extends('home')

@section('title', 'Main Menu')

@section('content-2')

	 <div class="main-class text-white ml-5" 
     style="background-image: url({{asset('images/urban-event-space-model_925x.jpg')}}); background-size: 100% 100%; background-attachment: fixed">
     	<div class="container pt-5">

     		<div class="main-class__greet-text pb-5 pt-5 animated bounceInDown text-center">
     			<img style="width: 30px; height: 30px" src={{asset('images/avatar/man-1.svg')}} alt="no image"/>
     			<h1 style="font-size: 2rem; font-weight: 600">{{Auth::user()->name}}</h1>
     			<h2 style="font-size: 1.5rem; font-weight: 500">{{$school->school_name}}</h2>
     		</div>

     		<div class="mainmenu_container">
     			
     			
     		</div>
     	</div>
     </div>

@endsection