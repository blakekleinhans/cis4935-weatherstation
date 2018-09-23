@php
if(!isset($sidebarOptionsMain)) {
    $sidebarOptionsMain = [];
}
if(!isset($sidebartOptionsSensors)) {
    $sidebarOptionsSensors = [];
}
@endphp


@extends('layouts.app', ['sidebarOptionsMain' => $sidebarOptionsMain, 'sidebarOptionsSensors' => $sensors])

@section('title', 'Home')

@section('content')

    <br>
    <h3>Current Conditions</h3>

    @if(isset($lastBatch->readings) && count($lastBatch->readings)>0)
    <span>Last Update: {{ $lastBatch->time }}</span>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Sensor</th>
                <th scope="col">Value</th>
            </tr>
            </thead>
            @foreach($lastBatch->readings as $reading)
            <tr>
                <td>{{ $reading->sensor['name'] }}</td>
                <td>{{ $reading->value }}</td>
            </tr>
            @endforeach
        </table>
    @else
        <p>No Readings Found</p>
    @endif

@endsection