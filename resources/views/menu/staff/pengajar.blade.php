@extends('home')

@section("title", "List Pengajar")

@section("content-2")
    <div class="main-class pt-5 primary-color">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active"><a>Pengajar</a></li>
            </ul>
            <br>
            <h1 style="font-size: 2rem; font-weight: 600">Anggota Pengajar</h1>
            <br>
            <table class="table table-bordered" id="users-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                </thead>
            </table>
            {{-- @if($pengajar)
                <div class="row">
                    @foreach($pengajar as $p)
                        <div class="col-md-4 mt-3">
                            <div class="card">
                                <div class="card-body text-center">
                                    <img src="{{asset('images/avatar/boy.svg')}}" 
                                        style="width: 80px; height: 80px"
                                        class="img-rounded"
                                        alt="pengajar.svg" />
                                    <p class="card-text mb-0 mt-3">{{$p->name}}</p>
                                    <p class="card-text">{{$p->email}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <h2>Pengajar belum di inputkan</h2>
            @endif --}}
        </div>
    </div>
@endsection

@push('scripts')
<script>
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('staff.pengajar.table') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' }
        ]
    });
});
</script>
@endpush