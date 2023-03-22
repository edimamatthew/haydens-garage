@extends('layouts.email')

@section('content')
    <p>Hello Admin,</p>
    <p>You have a new booking with the details below:</p>
    <ul style="list-style: none">
        <li><strong>Vehicle make:</strong> {{ $booking->vehicle_make }}</li>
        <li><strong>Vehicle model:</strong> {{ $booking->vehicle_model }}</li>
        <li><strong>Date and Time:</strong> {{ $booking->date->format('Y-m-d') }} ({{ $booking->slot->start_time->format('h:i a') }} - {{ $booking->slot->end_time->format('h:i a') }})</li>
    </ul>
    <p>You're the best at what you do. Stay awesome!</p>
@endsection