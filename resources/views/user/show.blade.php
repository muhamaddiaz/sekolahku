@extends('home')

@section('title', 'Main Menu')

@section('content-2')

	<div class="main-class text-white ml-5" 
     style="background-image: url({{asset('images/urban-event-space-model_925x.jpg')}}); background-size: 100% 100%; background-attachment: fixed">
     	<div class="container pt-5">

     		<div class="main-class__greet-text pb-5 pt-5 animated bounceInDown text-center" style="background-color: #000080">
                    @if(Auth::user()->role == 1)
                         <?php $show = DB::select("SELECT * FROM users WHERE id=?",[Auth::user()->id]) ?>
                              @if(!$show[0]->foto)
                                   <img style="width: 100px; height: 100px" src={{asset('images/avatar/man-1.svg')}} alt="no image"/>
                              @else
                                   <img style="width: 100px; height: 100px" src="{{url('profile_picture')}}/{{<?php echo $show[0]->foto ?>}}" />
                              @endif
          			<h1 style="font-size: 2rem; font-weight: 600"><?php echo $show[0]->name ?></h1>
                         <?php $data = DB::select("SELECT * FROM school_infos WHERE id=?",[$show[0]->id]) ?>
          			<h2 style="font-size: 1.5rem; font-weight: 500"><?php echo $data[0]->school_name ?></h2>
                    @elseif(Auth::user()->role == 2)
                         <?php $show = DB::select("SELECT * FROM guru WHERE id=?",[Auth::user()->id]) ?>
                              @if(!$show[0]->foto)
                                   <img style="width: 100px; height: 100px" src={{asset('images/avatar/man-1.svg')}} alt="no image"/>
                              @else
                                   <img style="width: 100px; height: 100px" src="{{url('profile_picture')}}/{{<?php echo $show[0]->foto ?>}}" />
                              @endif
                         <h1 style="font-size: 2rem; font-weight: 600"><?php echo $show[0]->nama ?></h1>
                         <?php $data = DB::select("SELECT * FROM school_infos WHERE id=?",[$show[0]->id]) ?>
                         <h2 style="font-size: 1.5rem; font-weight: 500"><?php echo $data[0]->school_name ?></h2>
                    @else
                         <?php $show = DB::select("SELECT * FROM siswa WHERE id=?",[Auth::user()->id]) ?>
                              @if(!$show[0]->foto)
                                   <img style="width: 100px; height: 100px" src={{asset('images/avatar/man-1.svg')}} alt="no image"/>
                              @else
                                   <img style="width: 100px; height: 100px" src="{{url('profile_picture')}}/{{<?php echo $show[0]->foto ?>}}" />
                              @endif
                         <h1 style="font-size: 2rem; font-weight: 600"><?php echo $show[0]->nama ?></h1>
                         <?php $data = DB::select("SELECT * FROM school_infos WHERE id=?",[$show[0]->id]) ?>
                         <h2 style="font-size: 1.5rem; font-weight: 500"><?php echo $data[0]->school_name ?></h2>
                    @endif
     		</div>

     		<div class="mainmenu_container">
     			<div class="row">
<!-- User as admin -->
               @if(Auth::user()->role == 1)
               <?php $show = DB::select("SELECT * FROM users WHERE id=?",[Auth::user()->id]) ?>
               <?php $data = DB::select("SELECT * FROM school_infos WHERE id=?",[$show[0]->id]) ?>
               <div class="col-md-6 text-center">
                    <h1 style="font-size: 1rem; font-weight: 600; color:#000080;">Name : <?php echo $show[0]->name ?></h1>
                    <br>
                    <h1 style="font-size: 1rem; font-weight: 600; color:#000080;">Username : <?php echo $show[0]->username ?></h1>
                    <br>
                    <h1 style="font-size: 1rem; font-weight: 600; color:#000080;">Email : <?php echo $show[0]->email ?></h1>
                    <br>
                    <h1 style="font-size: 1rem; font-weight: 600; color:#000080;">Job : Administrator</h1>
                    <br>
                    <h1 style="font-size: 1rem; font-weight: 600; color:#000080;">School : <?php echo $data[0]->school_name ?></h1>
               </div>
               <div class="col-md-6 text-center">
                    <br>
                    <a class="btn secondary-color-background text-white btn-block mb-6" href="/edit_profile_menu/{{<?php echo $show[0]->id ?>}}" >Edit Your Profile</a>
               </div>
<!-- User as guru -->
               @elseif(Auth::user()->role == 2)
               <?php $show = DB::select("SELECT * FROM guru WHERE id=?",[Auth::user()->id]) ?>
               <?php $data = DB::select("SELECT * FROM school_infos WHERE id=?",[Auth::user()->id]) ?>
               <div class="col-md-6 text-center">
                    <h1 style="font-size: 2rem; font-weight: 600; color:#000080;">Name : <?php echo $show[0]->nama ?></h1>
                    <h1 style="font-size: 2rem; font-weight: 600; color:#000080;">Mata Pelajaran : </h1>
                    <h1 style="font-size: 2rem; font-weight: 600; color:#000080;">Wali Kelas : </h1>
                    <h1 style="font-size: 2rem; font-weight: 600; color:#000080;">Job : Guru</h1>
                    <h1 style="font-size: 2rem; font-weight: 600; color:#000080;">School : <?php echo $data[0]->school_name ?></h1>
               </div>
               <div class="col-md-6 text-center"></div>
                    <a class="btn secondary-color-background text-white btn-block mb-6" href="/edit_profile_menu/{{<?php echo $show[0]->id ?>}}" >Edit Your Profile</a>
               </div>
<!-- User as siswa -->
               @else
               <?php $show = DB::select("SELECT * FROM siswa WHERE id=?",[Auth::user()->id]) ?>
               <?php $data = DB::select("SELECT * FROM school_infos WHERE id=?",[Auth::user()->id]) ?>
               <div class="col-md-6 text-center">
                    <h1 style="font-size: 2rem; font-weight: 600; color:#000080;">Name : <?php echo $show[0]->nama ?></h1>
                    <h1 style="font-size: 2rem; font-weight: 600; color:#000080;">Email : <?php echo $show[0]->email ?></h1>
                    <h1 style="font-size: 2rem; font-weight: 600; color:#000080;">Kelas : </h1>
                    <h1 style="font-size: 2rem; font-weight: 600; color:#000080;">NISN : <?php echo $show[0]->nisn ?></h1>
                    <h1 style="font-size: 2rem; font-weight: 600; color:#000080;">Job : Siswa</h1>
                    <h1 style="font-size: 2rem; font-weight: 600; color:#000080;">School : <?php echo $data[0]->school_name ?></h1>
               <div class="col-md-6 text-center"></div>
                    <a class="btn secondary-color-background text-white btn-block mb-6" href="/edit_profile_menu/{{<?php echo $show[0]->id ?>}}" >Perbarui Data Diri</a>
                    <br>
                    <a class="btn secondary-color-background text-white btn-block mb-6" href="#" >Lihat Jadwal</a>
                    <br>
                    <a class="btn secondary-color-background text-white btn-block mb-6" href="#" >Lihat Nilai</a>
               @endif
               </div>	
     		</div>
     	</div>
     </div>

@endsection