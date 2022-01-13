@extends('layouts.app')

@section('title', $title)

@section('content')

<div class="card shadow my-3">
    <div class="card-header bg-primary py-3">
        <h6 class="m-0 font-weight-bold text-white text-uppercase">Histórico de transações mensal - {{ date('Y') }}
        </h6>
    </div>
    <div class="card-body">
        <div id="columnchart_material" style="width: 100%; height: 500px;"></div>
    </div>
</div>

@endsection

@push('script')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
var result = <?= $result; ?>;

google.charts.load('current', {
    'packages': ['bar']
});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

    var data = google.visualization.arrayToDataTable(result);

    var options = {
        colors: ['#1cc88a', '#e74a3b']
    };

    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

    chart.draw(data, options);
}
</script>
@endpush