{{-- @extends('home') --}}

@section('title', 'Mata Pelajaran')

@section('content-2')
<div class="primary-color-background pt-5 text-white" style="min-height: 100vh;">
    <div class="container">
        <div class="analytic-greet-text">
            <h1>Mata pelajaran</h1>
            <h3>Kelola mata pelajaran sekolah</h3>
        </div>
    </div>
    
    <div class="container mt-5">
        <div class="row pt-5">
            <div class="col-md-4">
                <a href="#kelola" class="mt-3" data-toggle="modal">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Kelola</h2>
                            <p class="card-text">Mata Pelajaran</p>
                        </div>
                    </div> 
                </a>
            </div>
            <div class="col-md-4">
                <a href="" class="mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Performa</h2>
                            <p class="card-text">Mata Pelajaran</p>
                        </div>
                    </div> 
                </a>
            </div>
            <div class="col-md-4">
                <a href="" class="mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Umpan balik</h2>
                            <p class="card-text">Mata Pelajaran</p>
                        </div>
                    </div> 
                </a>
            </div>
        </div>
        <h2 class="mt-5 mb-3">Sekilas statistik</h2>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="primary-color">Mata pelajaran performa</h3>
                        <canvas id="myChart" width="100" height="100"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>
</div>

<div class="modal fade" id="kelola">
    <div class="modal-dialog" style="width: 100%">
        <div class="modal-content" style="width: 100%">                        
            <div class="modal-header">
                <h4 class="modal-title primary-color">Isi data kelas</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>                        
            <div class="modal-body">
                <form action="{{route('mapel.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="mapel" class="form-control" placeholder="Nama Mata Pelajaran" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim data</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Matematika", "Ekonomi", "Bhs. Inggris", "Biologi", "Kimia", "Fisika"],
        datasets: [{
            label: '# of Votes',
            data: [60, 70, 95, 65, 54, 83],
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 206, 86)',
                'rgb(75, 192, 192)',
                'rgb(153, 102, 255)',
                'rgb(255, 159, 64)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>

@endsection