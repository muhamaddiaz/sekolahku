@extends('home')

@section("title", "List Pelajar")

@section("content-2")
    <div class="main-class pt-5 primary-color">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active"><a>Pelajar</a></li>
            </ul>
            <br>
            <h1 style="font-size: 2rem; font-weight: 600">Anggota Pelajar</h1>
        </div>
    </div>
@endsection