@extends('home')

@section('title', 'Main Menu')

@section('content')
    <div class="main-class primary-color">
        <div class="container">
            <div class="main-class__greet-text pt-5 pb-5 animated bounceInDown">
                <h2 style={styleSheet}>Selamat Datang, John Doe</h2>
                <blockquote style={styleSheet}>
                    "Stay Foolish, Stay Hungry"
                    <footer>- Steve Jobs</footer>
                </blockquote>
            </div>
        </div>
    </div>
@endsection