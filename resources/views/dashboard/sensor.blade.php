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
    <h3>Sensor {{ $sensor_id }}</h3>
    @if(isset($readings) && count($readings)>0)
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Batch</th>
                <th scope="col">Value</th>
            </tr>
            </thead>
        @foreach($readings as $reading)
            <tr>
                <td>{{ $reading['batch_id'] }}</td>
                <td>{{ $reading['value'] }}</td>
            </tr>
        @endforeach
        </table>
    @else
        <p>No Readings Found</p>
    @endif

@endsection