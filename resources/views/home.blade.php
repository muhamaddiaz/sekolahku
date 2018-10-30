@extends('layouts.app')

@section('title', 'hello')

@section('content')
    <div class="navbar-custom__left" style="padding-top: 50px">
        <div class="navbar-custom__left--container">
            <ul class="navbar-custom__item-horizon navbar-custom__item-horizon--top">
                <li>
                    <a href="/">
                        <img style="width: 40px; height: 40px" src={{asset('images/school.svg')}} alt="no image"/>
                    </a>
                </li>
                <li>
                    <a href="/">
                        <img style="width: 40px; height: 40px" src={{asset('images/bell.svg')}} alt="no image"/>
                    </a>
                </li>
                <li>
                    <a href="/">
                        <img style="width: 40px; height: 40px" src={{asset('images/pie-chart.svg')}} alt="no image"/>
                    </a>
                </li>
                <li>
                    <a href="/">
                        <img style="width: 40px; height: 40px" src={{asset('images/clip.svg')}} alt="no image"/>
                    </a>
                </li>
                <li>
                    <a href="/">
                        <img style="width: 40px; height: 40px" src={{asset('images/library.svg')}} alt="no image"/>
                    </a>
                </li>
            </ul>
            <ul class="navbar-custom__item-horizon navbar-custom__item-horizon--bottom">
                <li>
                    <a href="/">
                        <img style="width: 40px; height: 40px" src={{asset('images/avatar/man-1.svg')}} alt="no image"/>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-class primary-color" style="padding-top: 50px">
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