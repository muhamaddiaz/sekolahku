@extends('home')

@section('title', 'Notifikasi')

@section('content-2')
    <div class="container mt-5">
        <h1 class="primary-color">Notification</h1>
        <hr>
        @foreach($notif as $n)
            @component('components.alert', ['title' => $n->type])
                {{$n->message}}, {{$n->created_at}}
            @endcomponent
        @endforeach
    </div>
@endsection