@extends('home')

@section('title', 'Notifikasi')

@section('content-2')
    <div class="container mt-5">
        <div class="notification-text">
            <h1 class="primary-color">Catatan Pemberitahuan</h1>
            <form action="{{route('main.notification.delete')}}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-outline-danger">Hapus semua</button>
            </form>
        </div>
        
        <hr>
        @foreach($notif as $n)
            @component('components.alert', ['title' => $n->type])
                {{$n->message}}, {{$n->created_at}}
            @endcomponent
        @endforeach
    </div>
@endsection