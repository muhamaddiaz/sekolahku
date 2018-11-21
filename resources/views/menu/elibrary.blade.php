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
                    <table class="table table-striped-black">
                        <thead>
                            <tr>
                                <th class="primary-color">Judul</th>
                                <th class="primary-color">Uploaded By</th>
                                <th class="primary-color">Sekolah</th>
                                <th class="primary-color">Cover</th>
                                <th class="primary-color">Action</th>
                            </tr>    
                        </thead>
                        <tbody>
                        @if($data)
                            @foreach($data as $d)
                            <tr>
                                <td>{{$d->judul}}</td>
                                <td>{{$user->name}} A.K.A {{$user->username}}</td>
                                <td>{{$school_library->school_name}}</td>
                                <td>
                                    <img src="/library/image/{{$d->image}}" style="width: 100%; height: 20%" />
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="/download_library/{{$d->id}}">Download</a>
                                    <br>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_report-{{$d->id}}">Report</button>
                                    <br>
                                    @if(Auth::user()->id == $d->user_id)
                                    <a class="btn btn-primary" href="/edit_library/{{$d->id}}">Edit</a>
                                    <br>
                                    <a class="btn btn-primary" href="/delete_library/{{$d->id}}">Delete</a>
                                    <br>
                                    @else
                                    @endif
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-show-{{$d->id}}">More Info
                                    </button>
                                </td>
                            </tr>
        <div class="modal fade" id="modal-show-{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle" style="color:black;">{{$d->judul}}
                                by {{$user->nama}} <br /> Kategori: {{$d->kategori}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body">
                            <img style="width: 100%; height: 100%" src="library/image/{{$d->image}}"
                                alt="no image" />
                            <p class="card-text" style="color:blue;">{!! $d->deskripsi !!}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a class="btn btn-primary" href="/download_library/{{$d->id}}">Download</a>
                        </div>
                    </div>
                </div>
        </div>
        <div class="modal fade" id="modal_report-{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="color:black;">Report This!!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <div class="modal-body">
                        <form method="post" action="/report/{{$d->id}}">
                                {{ csrf_field() }} 
                            <div class="form-group">
                                <input type="hidden" name="school_id" value="{{$d->school_info_id}}" />
                            </div>
                            <div class="form-group">
                                <label for="message" class="col-form-label" style="color:black;">Message:</label>
                                <textarea class="form-control" id="message" name="message" style="color:black;"></textarea>
                            </div>
                            <button type="reset" class="btn btn-secondary">Close</button>
                            <button type="submit" class="btn btn-primary">Report!!</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
                            @endforeach
                        @else
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection