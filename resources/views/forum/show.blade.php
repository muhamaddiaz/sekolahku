@extends('home')

@section("title", "$forum->title: Diskusi")

@section('content-2')
    <div class="forum_discussion--greet">
        <div class="container">
            <h1>Ruang Diskusi</h1>
            <span>Dibuat oleh: {{$user}}</span>
        </div>
    </div>
    <div class="container">
        @if(session('success'))
            <div class="mt-3"></div>
            @component('components.alert', ['title' => 'success'])
                {{session('success')}}
            @endcomponent
        @endif
        <div class="row mt-4">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <h1>{{$forum->title}}</h1>
                        <span>Terakhir di update: {{$forum->updated_at}}</span>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">{{$forum->description}}</p>
                    </div>
                </div>
                <div class="card mt-3 mb-3">
                    <div class="card-body">
                        <div id="disqus_thread"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="{{asset('images/avatar/boy.svg')}}" 
                            style="width: 80px; height: 80px"
                            class="img-rounded"
                            alt="pengajar.svg" />
                        <p class="card-text mb-0 mt-3">{{$forum->user()->first()->siswa()->first()->nama}}</p>
                        <p class="card-text mb-0 mt-3">{{$forum->user()->first()->siswa()->first()->kelas()->first()->full_kelas}}</p>
                    </div>
                </div>
                <br>
                @if(Auth::user() == $forum->user()->first())
                    <div class="list-group">
                        <a href="#perbarui" class="list-group-item list-group-action" data-toggle="modal">Perbarui post</a>
                        <a href="#hapus" class="list-group-item list-group-action text-danger" data-toggle="modal">Hapus post</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="modal" style="" id="perbarui">
        <div class="modal-dialog">
            <div class="modal-content">                        
                <div class="modal-header">
                    <h4 class="modal-title primary-color">Perbarui post</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>                        
                <div class="modal-body">
                    <form action="{{route('forum.update', $forum->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" value="{{$forum->title}}" placeholder="Judul Posting" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="description" id="description" cols="30" rows="10" placeholder="Deskripsi" required>
                                {{$forum->description}}
                            </textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Perbarui data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" style="" id="hapus">
        <div class="modal-dialog">
            <div class="modal-content">                        
                <div class="modal-header">
                    <h4 class="modal-title primary-color">Hapus post</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>                        
                <div class="modal-body">
                    <p>Apakah anda yakin ?</p>
                    <form action="{{route('forum.destroy', $forum->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Ya</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>

    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

    var disqus_config = function () {
    this.page.url = '{{ Request::url() }}';  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = {{ $forum->id }}; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };

    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://sekolahku-1.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();

</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                            