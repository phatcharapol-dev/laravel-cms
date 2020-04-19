@extends('layouts.admin')


@section('content')

<h1>Dashboard</h1>

<canvas id="myChart" width="100%" height="30%"></canvas>
<script>
var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Users', 'Posts', 'Comments', 'Categories'],
        datasets: [{
            label: 'Data of CMS',
            data: [{{$usersCount}},{{$postsCount}},{{$commentsCount}},{{$categoriesCount}}],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>


@endsection


@section('footer')

@endsection