 @extends('home')

@section('title', 'Statistik Nilai')

@section('content-2')
<div class="primary-color-background text-white" style="margin-left: 100px">
	<div class="container">
		<div class="analytic-greet-text">
			<h1>Analytic Monitoring</h1>
			<h3>Pusat Memonitoring Statistik Penilaian</h3>
		</div>
	</div>
	<div class="container mt-4">
		<div class="row">			
			<div class="col-md-6">
				<div class="card">
					<div class="card-body">
						<h3 class="primary-color">Nilai</h3>
						<canvas id="myChart" width="100" height="100"></canvas>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-body">
						<h3 class="primary-color">Presensi</h3>
						<canvas id="myChart2" width="100" height="100"></canvas>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br><br>
</div>

<script>
var ctx = document.getElementById("myChart").getContext('2d');
var ctx2 = document.getElementById('myChart2').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Matematika", "Ekonomi", "Bhs. Inggris", "Biologi", "Kimia", "Fisika"],
        datasets: [{
            label: '# of Votes',
            data: [60, 70, 95, 65, 54, 83],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
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

var myChart2 = new Chart(ctx2, {
    type: 'doughnut',
    data: {
        labels: ["Izin", "Sakit", "Alfa"],
        datasets: [{
            label: 'Data kehadiran',
            data: [6, 7, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }]
    },
});
</script>

@endsection