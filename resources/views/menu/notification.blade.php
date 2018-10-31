@extends('home')

@section('title', 'Notifikasi')

@section('content-2')
    <div class="container mt-5">
        <h1>Notification</h1>
        <hr>
        @foreach($notif as $n)
            @component('components.alert', ['title' => $n->type])
                {{$n->message}}
            @endcomponent
        @endforeach
    </div>
@endsection