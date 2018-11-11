@extends('home')

@section('title', 'E-Mading | Sekolahku')

@section('content-2')
    <div class="primary-color-background text-white" style="margin-left: 100px">
        <div class="container-fluid">
            <div class="emading-greet-text text-center">
                <h1>E - Mading</h1>
                <h3>Wadah Tepat berbagi informasi</h3>
            </div>
            @foreach($mading as $m)
            <div class="card primary-color">
               <div class="card-body">
                    <h4 class="card-title">{{$m->judul_mading}}</h4>
                        <img style="width: 100%; height: 100%" src="{{url('mading_picture')}}/{{$m->image_mading }}" alt="no image"/>
                            <p class="card-text">{{ substr($m->deskripsi, 0, 50)}}{{ strlen($m->deskripsi) > 50 ? "..." : ""}}
                            </p>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-show-{{$m->id}}">Read More</button>
                </div>
            </div>
    	<div class="modal fade" id="modal-show-{{$m->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  			<div class="modal-dialog modal-dialog-centered" role="document">
    			<div class="modal-content">
      				<div class="modal-header">
        				<h5 class="modal-title" id="exampleModalCenterTitle" style="color:black;">{{$m->judul_mading}} by {{$siswa->nama}} <br/> Kategori: {{$m->kategori_mading}}</h5>
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        				</button>
      				</div>
      			<div class="modal-body">
        			<img style="width: 100%; height: 100%" src="{{url('mading_picture')}}/{{$m->image_mading }}" alt="no image"/>
        			<p class="card-text" style="color:black;">{{$m->deskripsi}}</p>
      			</div>
      			<div class="modal-footer">
        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>	
      			</div>
    		</div>
  			</div>
		</div>
            @endforeach
        </div>
    </div>
@endsection