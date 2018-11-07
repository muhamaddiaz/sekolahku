@extends('layouts.app')

@section('title', 'hello')

@section('content')
    {{-- <div id="root"></div> --}}
    <div class="navbar-custom__left" style="padding-top: 50px">
        <div class="navbar-custom__left--container">
            <ul class="navbar-custom__item-horizon navbar-custom__item-horizon--top">
                <li>
                    <a href="/">
                        <img style="width: 30px; height: 30px" src={{asset('images/school.svg')}} alt="no image"/>
                    </a>
                </li>
                <li>
                    <a href="{{route('main.notification')}}">
                        <img style="width: 30px; height: 30px" src={{asset('images/bell.svg')}} alt="no image"/>
                        <span class="badge badge-secondary">{{$notifCount}}</span>
                    </a>
                </li>
                <li>
                    <a href="/">
                        <img style="width: 30px; height: 30px" src={{asset('images/pie-chart.svg')}} alt="no image"/>
                    </a>
                </li>
                <li>
                    <a href="{{route('main.emading')}}">
                        <img style="width: 30px; height: 30px" src={{asset('images/clip.svg')}} alt="no image"/>
                    </a>
                </li>
                <li>
                    <a href="{{route('main.elibrary')}}">
                        <img style="width: 30px; height: 30px" src={{asset('images/library.svg')}} alt="no image"/>
                    </a>
                </li>
            </ul>
            <ul class="navbar-custom__item-horizon navbar-custom__item-horizon--bottom">
                <li>
                    <a href="{{route('show_profile')}}">
                        <img style="width: 30px; height: 30px" src={{asset('images/avatar/man-1.svg')}} alt="no image"/>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="pt-5">
        @yield('content-2')
    </div>
@endsection