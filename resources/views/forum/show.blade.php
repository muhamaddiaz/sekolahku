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
                            