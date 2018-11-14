@extends('home')

@section('title', 'E-Library | Sekolahku')

@section('content-2')
    <div class="text-white" style="margin-left: 100px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 primary-color-background" style="height: 100vh">
                    <div class="elibrary-greet-text text-center" style="height: 100vh">
                        <div class="elibrary-greet-content">
                            <img style="width: 100px; height: 100px" src={{asset('images/idea.svg')}} alt="no image"/>
                            <br><br>
                            <h1>E-Library</h1>
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="coming-soon pt-5">
                        <div class="jumbotron primary-color-background text-center">
                            <h1>Cooming Soon</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection