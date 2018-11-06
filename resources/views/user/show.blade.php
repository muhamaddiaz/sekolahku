@extends('home')

@section('title', 'Main Menu')

@section('content-2')

	 <div class="main-class text-white ml-5" 
     style="background-image: url({{asset('images/urban-event-space-model_925x.jpg')}}); background-size: 100% 100%; background-attachment: fixed">
     	<div class="container pt-5">

     		<div class="main-class__greet-text pb-5 pt-5 animated bounceInDown text-center">
     			<img style="width: 30px; height: 30px" src={{asset('images/avatar/man-1.svg')}} alt="no image"/>
                    @if(Auth::user()->role == 1)
                     <?php $show = DB::select("SELECT * FROM users WHERE id=?",[Auth::user()->id]) ?>
     			<h1 style="font-size: 2rem; font-weight: 600"><?php echo $show[0]->name ?></h1>
                    <?php $data = DB::select("SELECT * FROM school_infos WHERE id=?",[$show[0]->id]) ?>
     			<h2 style="font-size: 1.5rem; font-weight: 500"><?php echo $data[0]->school_name ?></h2>
                    @elseif(Auth::user()->role == 2)
                    <?php $show = DB::select("SELECT * FROM guru WHERE id=?",[Auth::user()->id]) ?>
                    <h1 style="font-size: 2rem; font-weight: 600"><?php echo $show[0]->nama ?></h1>
                    <?php $data = DB::select("SELECT * FROM school_infos WHERE id=?",[$show[0]->id]) ?>
                    <h2 style="font-size: 1.5rem; font-weight: 500"><?php echo $data[0]->school_name ?></h2>
                    @else
                    <?php $show = DB::select("SELECT * FROM siswa WHERE id=?",[Auth::user()->id]) ?>
                    <h1 style="font-size: 2rem; font-weight: 600"><?php echo $show[0]->nama ?></h1>
                    <?php $data = DB::select("SELECT * FROM school_infos WHERE id=?",[$show[0]->id]) ?>
                    <h2 style="font-size: 1.5rem; font-weight: 500"><?php echo $data[0]->school_name ?></h2>
                    @endif
     		</div>

     		<div class="mainmenu_container">
     			<div clas="row">
{{-- User as admin --}}
                              @if(Auth::user()->role == 1)
                              <?php $show = DB::select("SELECT * FROM users WHERE id=?",[Auth::user()->id]) ?>
               @if(!$show[0]->foto)
               <div class="col-md-4">
                              <img style="width: 50px; height: 50px" src={{asset('images/avatar/man-1.svg')}} alt="no image"/>
               </div>
               @else
               {{-- Masih dalam proses edit --}}
               @endif
               <br/>
               <div class="col-md-8">
                              <h1 style="font-size: 2rem; font-weight: 600; color:black;">Name : <?php echo $show[0]->name ?></h1>
                              <h1 style="font-size: 2rem; font-weight: 600; color:black;">Username : <?php echo $show[0]->username ?></h1>
                              <h1 style="font-size: 2rem; font-weight: 600; color:black;">Email : <?php echo $show[0]->email ?></h1>
                              <h1 style="font-size: 2rem; font-weight: 600; color:black;">Job : Administrator</h1>
                              <?php $data = DB::select("SELECT * FROM school_infos WHERE id=?",[$show[0]->id]) ?>
                              <h1 style="font-size: 2rem; font-weight: 600; color:black;">School : <?php echo $data[0]->school_name ?></h1>
                              <a class="btn btn-danger btn-block" href="" >Edit Your Profile</a>
               </div>
{{-- User as guru --}}
               @elseif(Auth::user()->role == 2)
               <?php $show = DB::select("SELECT * FROM guru WHERE id=?",[Auth::user()->id]) ?>
               @if(!$show[0]->foto)
               <div class="col-md-4">
                              <img style="width: 50px; height: 50px" src={{asset('images/avatar/man-1.svg')}} alt="no image"/>
               </div>
               @else
               {{-- Masih dalam proses edit --}}
               @endif
               <div class="col-md-8">
                              <h1 style="font-size: 2rem; font-weight: 600; color:black;">Name : <?php echo $show[0]->nama ?></h1>
                              <h1 style="font-size: 2rem; font-weight: 600; color:black;">Mata Pelajaran : </h1>
                              <h1 style="font-size: 2rem; font-weight: 600; color:black;">Wali Kelas : </h1>
                              <h1 style="font-size: 2rem; font-weight: 600; color:black;">Job : Guru</h1>
                              <?php $data = DB::select("SELECT * FROM school_infos WHERE id=?",[Auth::user()->id]) ?>
                              <h1 style="font-size: 2rem; font-weight: 600; color:black;">School : <?php echo $data[0]->school_name ?></h1>
                              <a class="btn btn-danger btn-block" href="" >Edit Your Profile</a>
               </div>
{{-- User as siswa --}}
                              @else
               <?php $show = DB::select("SELECT * FROM siswa WHERE id=?",[Auth::user()->id]) ?>
               @if(!$show[0]->foto)
               <div class="col-md-4">
                              <img style="width: 50px; height: 50px" src={{asset('images/avatar/man-1.svg')}} alt="no image"/>
               </div>
               @else
               {{-- Masih dalam proses edit --}}
               @endif
               <div class="col-md-8">
                              <h1 style="font-size: 2rem; font-weight: 600; color:black;">Name : <?php echo $show[0]->nama ?></h1>
                              <h1 style="font-size: 2rem; font-weight: 600; color:black;">Email : <?php echo $show[0]->email ?></h1>
                              <h1 style="font-size: 2rem; font-weight: 600; color:black;">Kelas : </h1>
                              <h1 style="font-size: 2rem; font-weight: 600; color:black;">NISN : <?php echo $show[0]->nisn ?></h1>
                              <h1 style="font-size: 2rem; font-weight: 600; color:black;">Job : Siswa</h1>
                              <?php $data = DB::select("SELECT * FROM school_infos WHERE id=?",[Auth::user()->id]) ?>
                              <h1 style="font-size: 2rem; font-weight: 600; color:black;">School : <?php echo $data[0]->school_name ?></h1>
                              <a class="btn btn-danger btn-block" href="" >Edit Your Profile</h5>
                              @endif
               </div>	
     		</div>
     	</div>
     </div>

@endsection