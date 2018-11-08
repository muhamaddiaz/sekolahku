@extends('home')

@section("title", "ClassMates")

@section('content-2')
    <div class="class-mates_container" 
    style="background-image: url({{asset('images/school.jpg')}}">
        <div class="class-mates_faded">
            <div class="container">
                <div class="class-mates_head-text primary-color text-center pt-5">
                    <h1 class="pt-5">ClassMates</h1>
                    <h3>Cara baru berbagi setiap moment</h3>
                </div>
                <div class="class-mates_menu mt-5">
                    <div class="row pt-5">
                        <div class="col-md-2"></div>
                        <div class="col-md-4 text-center">
                            <a href="{{route('kelas.show', encrypt($kelas->id))}}">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Kelasku</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 text-center">
                            <a href="{{route('kelas.show', ['kela' => $kelas->id])}}">
                                <div class="card">
                                    <div class="card-body">
                                            <h3 class="card-title">Forum Sekolah</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection