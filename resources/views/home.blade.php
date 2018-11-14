@extends('layouts.app')

@section('title', 'hello')

@section('content')
    {{-- <div id="root"></div> --}}
    <div class="navbar-custom__left" style="padding-top: 50px">
        <div class="navbar-custom__left--container">
            <ul class="navbar-custom__item-horizon navbar-custom__item-horizon--top">
                <li title="Beranda">
                    <a href="/">
                        <img style="width: 30px; height: 30px" src={{asset('images/school.svg')}} alt="no image"/>
                    </a>
                </li>
                <li title="Notifikasi">
                    <a href="{{route('main.notification')}}">
                        <img style="width: 30px; height: 30px" src={{asset('images/bell.svg')}} alt="no image"/>
                        <span class="badge badge-secondary">{{$notifCount}}</span>
                    </a>
                </li>
                <li title="Nilai">
                    <a href="/">
                        <img style="width: 30px; height: 30px" src={{asset('images/pie-chart.svg')}} alt="no image"/>
                    </a>
                </li>
                <li title="E - Mading">
                    <a href="{{route('main.emading')}}">
                        <img style="width: 30px; height: 30px" src={{asset('images/clip.svg')}} alt="no image"/>
                    </a>
                </li>
                <li title="E - Library">
                    <a href="{{route('main.elibrary')}}">
                        <img style="width: 30px; height: 30px" src={{asset('images/library.svg')}} alt="no image"/>
                    </a>
                </li>
                <li title="ClassMates">
                    <a href="{{route('classmates')}}">
                        <img style="width: 30px; height: 30px" src={{asset('svg/collaboration.svg')}} alt="no image"/>
                    </a>
                </li>
            </ul>
            <ul class="navbar-custom__item-horizon navbar-custom__item-horizon--bottom">
                <li>
                    <a href="{{route('user.profile')}}">
                        <img style="width: 30px; height: 30px" src={{asset('images/avatar/man-1.svg')}} alt="no image"/>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div style="background-color: #E6ECF0; min-height: 100vh;">
        @yield('content-2')
    </div>
@endsection