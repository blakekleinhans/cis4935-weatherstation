@php
if(!isset($sidebarOptionsMain)) {
    $sidebarOptionsMain = [];
}
if(!isset($sidebartOptionsSensors)) {
    $sidebarOptionsSensors = [];
}
@endphp


@extends('layouts.app', ['sidebarOptionsMain' => $sidebarOptionsMain, 'sidebarOptionsSensors' => $sensors])

@section('title', 'Sensor')

@section('content')
    <br>
    @if(isset($sensor->name))
        <h3>{{ $sensor->name }} Readings</h3>
    @else
        <h3>Error: Sensor Name not Found</h3>
    @endif
    @if(isset($readings) && count($readings)>0)
        <canvas id="myChart" width="200" height="100"></canvas>
        <script>
            var ctx = document.getElementById("myChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [
                        @foreach($readings as $reading)
                            '{{ date_format($reading->batch->getEST(),'g:i a') }}',
                        @endforeach
                    ],
                    datasets: [{
                        label: '{{ $sensor->name }}',
                        data: [
                            @foreach($readings as $reading)
                                '{{ $reading->value }}',
                            @endforeach
                        ],
                    }]
                },
                options: {
                }
            });
        </script>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Time</th>
                <th scope="col">Value</th>
            </tr>
            </thead>
        @foreach($readings as $reading)
            <tr>
                <td>{{ $reading->batch->getEST() }}</td>
                <td>{{ $reading->formattedValue }}</td>
            </tr>
        @endforeach
        </table>
        <span>
            {{ $readings->links() }}
        </span>
    @else
        <p>No Readings Found</p>
    @endif

@endsection