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
                        @for ($i = count($readings)-1; $i >= 0; $i--)
                            '{{ date_format(date_create_from_format("Y-m-d H:i:s", $readings[$i]->batch->getEST()),'g:i a') }}',
                        @endfor
                    ],
                    datasets: [{
                        label: '{{ $sensor->name }}',
                        data: [
                            @for ($i = count($readings)-1; $i >= 0; $i--)
                                '{{ $readings[$i]->value }}',
                            @endfor
                        ],
                    }]
                },
                options: {
                }
            });
        </script>
        <span>
            {{ $readings->links() }}
        </span>
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