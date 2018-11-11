@extends('home')

@section('title', 'Main Menu')

@section('content-2')

	 <div class="main-class text-white ml-5" 
     style="background-image: url({{asset('images/urban-event-space-model_925x.jpg')}}); background-size: 100% 100%; background-attachment: fixed">
     	<div class="container pt-5">

     		<div class="main-class__greet-text pb-5 pt-5 animated bounceInDown text-center">
                    @if(Auth::user()->role == 1)
                         @if(!Auth::user()->foto)
                         <img style="width: 30px; height: 30px" src={{asset('images/avatar/man-1.svg')}} alt="no image"/>
                         @else
                         <img style="width: 30px; height: 30px" src="{{url('profile_picture')}}/{{Auth::user()->foto }}"" alt="no image"/>
                         @endif
          			<h1 style="font-size: 2rem; font-weight: 600">{{Auth::user()->name}}</h1>
          			<h2 style="font-size: 1.5rem; font-weight: 500">{{$school->school_name}}</h2>
                    @elseif(Auth::user()->role == 2)
                         @if(!$guru->foto)
                         <img style="width: 30px; height: 30px" src={{asset('images/avatar/man-1.svg')}} alt="no image"/>
                         @else
                         <img style="width: 30px; height: 30px" src="{{url('profile_picture')}}/{{$guru->foto }}"" alt="no image"/>
                         @endif
                         <h1 style="font-size: 2rem; font-weight: 600">{{Auth::user()->name}}</h1>
                         <h2 style="font-size: 1.5rem; font-weight: 500">{{$school->school_name}}</h2>
                    @else
                         @if(!$siswa->foto)
                         <img style="width: 30px; height: 30px" src={{asset('images/avatar/man-1.svg')}} alt="no image"/>
                         @else
                         <img style="width: 30px; height: 30px" src="{{url('profile_picture')}}/{{$siswa->foto }}"" alt="no image"/>
                         @endif
                         <h1 style="font-size: 2rem; font-weight: 600">{{$siswa->nama}}</h1>
                         <h2 style="font-size: 1.5rem; font-weight: 500">{{$school->school_name}}</h2>
                    @endif
     		</div>

     		<div class="mainmenu_container">
     			<div class="row">
<!-- User as admin -->
               @if(Auth::user()->role == 1)
                    @if(!Auth::user()->foto)
               <div class="col-md-4">
                              <img style="width: 100px; height: 100px" src={{asset('images/avatar/man-1.svg')}} alt="no image"/>
               </div>
                    @else
               <div class="col-md-4">
                              <img style="width: 100px; height: 100px" src="{{url('profile_picture')}}/{{Auth::user()->foto}}" />
               </div>
                    @endif
               <br/>
               <div class="col-md-8">
                              <h1 style="font-size: 2rem; font-weight: 600; color:black;">Name : {{Auth::user()->name}}</h1>
                              <h1 style="font-size: 2rem; font-weight: 600; color:black;">Username : {{Auth::user()->username}}</h1>
                              <h1 style="font-size: 2rem; font-weight: 600; color:black;">Email : {{Auth::user()->email}}</h1>
                              <h1 style="font-size: 2rem; font-weight: 600; color:black;">Job : Administrator</h1>
                              <h1 style="font-size: 2rem; font-weight: 600; color:black;">School : {{$school->school_name}}</h1>
                              <a class="btn btn-danger btn-block" href="/edit_profile_menu/{{Auth::user()->id}}" >Edit Your Profile</a>
               </div>
<!-- User as guru -->
               @elseif(Auth::user()->role == 2)
                    @if(!$guru->foto)
               <div class="col-md-4">
                              <img style="width: 100px; height: 100px" src={{asset('images/avatar/man-1.svg')}} alt="no image"/>
               </div>
                    @else
               <div class="col-md-4">
                              <img style="width: 100px; height: 100px" src="{{url('profile_picture')}}/{{$guru->foto}}" />
               </div>
                    @endif
               <div class="col-md-8">
                              <h1 style="font-size: 2rem; font-weight: 600; color:black;">Name : {{$guru->nama}}</h1>
                              <h1 style="font-size: 2rem; font-weight: 600; color:black;">Mata Pelajaran : </h1>
                              <h1 style="font-size: 2rem; font-weight: 600; color:black;">Wali Kelas : </h1>
                              <h1 style="font-size: 2rem; font-weight: 600; color:black;">Job : Guru</h1>
                              <h1 style="font-size: 2rem; font-weight: 600; color:black;">School : {{$school->school_name}}</h1>
                              <a class="btn btn-danger btn-block" href="/edit_profile_menu/{{$guru->id}}" >Edit Your Profile</a>
               </div>
<!-- User as siswa -->
               @else
                    @if(!$siswa->foto)
               <div class="col-md-4">
                              <img style="width: 100px; height: 100px" src={{asset('images/avatar/man-1.svg')}} alt="no image"/>
               </div>
                    @else
               <div class="col-md-4">
                              <img style="width: 100%; height: 100%" src="{{url('profile_picture')}}/{{$siswa->foto }}" />
               </div>
                    @endif
               <div class="col-md-8">
                              <h1 style="font-size: 2rem; font-weight: 600; color:black;">Name : {{$siswa->nama}}</h1>
                              <h1 style="font-size: 2rem; font-weight: 600; color:black;">Email : {{$siswa->email}}</h1>
                              <h1 style="font-size: 2rem; font-weight: 600; color:black;">Kelas : {{$kelas->jurusan_kelas}} {{$kelas->bagian_kelas}}</h1>
                              <h1 style="font-size: 2rem; font-weight: 600; color:black;">NISN : {{$siswa->NISN}}</h1>
                              <h1 style="font-size: 2rem; font-weight: 600; color:black;">Job : Siswa</h1>
                              <h1 style="font-size: 2rem; font-weight: 600; color:black;">School : {{$school->school_name}}</h1>
                              <a class="btn btn-danger btn-block" href="/edit_profile_menu/{{$siswa->id}}" >Edit Your Profile</a>
               @endif
               </div>	
     		</div>
     	</div>
     </div>

@endsection