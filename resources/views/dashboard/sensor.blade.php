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
    <h3>{{ $readings[0]->sensor->name }} Readings</h3>
    @if(isset($readings) && count($readings)>0)
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Time</th>
                <th scope="col">Value</th>
            </tr>
            </thead>
        @foreach($readings as $reading)
            <tr>
                <td>{{ $reading->batch->time }}</td>
                <td>{{ $reading->value }}</td>
            </tr>
        @endforeach
        </table>
    @else
        <p>No Readings Found</p>
    @endif

@endsection