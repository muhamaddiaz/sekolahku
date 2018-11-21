@extends('home')

@section('title','Store Info')

@section('content-2')
<div class="main-class text-white ml-5" 
     style="background-image: url({{asset('images/urban-event-space-model_925x.jpg')}}); background-size: 100% 100%; background-attachment: fixed">
        <div class="container pt-5">
            <div class="main-class__greet-text pb-5 pt-5 animated bounceInDown text-center">
                         <h1 style="font-size: 2rem; font-weight: 600">{{Auth::user()->name}}</h1>
                         <h2 style="font-size: 1.5rem; font-weight: 500">{{$school->school_name}}</h2>
            <div class="panel-body">
                <form action="/update_library/{{$library->id}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{Auth::user()->id}}" />
                <input type="hidden" name="school_id" value="{{Auth::user()->school_info_id}}" />
                <div class="form-group">
                <label for="title">Judul :</label>
                <input class="form-control" type="text" name="title" placeholder="Judul Buku" value="{{$library->judul}}" />
                </div>
                <br>
                <div class="form-group">
                <img style="width: 50%; height: 50%" src="library/image/{{$library->image}}"
                                alt="no image" />
                <label for="image">Upload Cover</label>
                <input class="form-control" type="file" name="image" />
                </div>
                <br>
                <div class="form-group">
                <label for="file">Upload Foto Buku / Video</label>
                <input class="form-control" type="file" name="file" />
                </div>
                <br>
                <div class="form-group">
                <label for="kategori">Kategori : </label>
                <input class="form-control" type="text" name="kategori" placeholder="Kategori" value="{{$library->kategori}}" />
                </div>
                <br>
                <div class="form-group">
                <textarea class="form-control" name="summernote" id="summernote">
                    {!! $library->deskripsi !!}
                </textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-success">Store It!</button>
                <button type="reset" class="btn btn-success">Reset</button>
                </form>
            </div>
            </div>
        </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#summernote').summernote({
            height: '300px',
            placeholder: 'Deskripsi Berita...',
            fontNames:['Arial','Times New Roman','Calibri'],
        })
    })
</script>
@endsection