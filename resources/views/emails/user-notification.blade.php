@extends('layouts.email')

@section('content')
    <p>Dear {{ $booking->name }},</p>
    <p>We are delighted to confirm your booking for {{ $booking->vehicle_make }} ({{ $booking->vehicle_model }}) on {{ $booking->date->format('Y-m-d') }}.</p>
    <p>Below are the details of your booking:</p>
    <ul style="list-style: none">
        <li><strong>Vehicle make:</strong> {{ $booking->vehicle_make }}</li>
        <li><strong>Vehicle model:</strong> {{ $booking->vehicle_model }}</li>
        <li><strong>Date and Time:</strong> {{ $booking->date->format('Y-m-d') }} ({{ $booking->slot->start_time->format('h:i a') }} - {{ $booking->slot->end_time->format('h:i a') }})</li>
    </ul>
    <p>Please let us know if you have any special requirements or if you need to cancel or reschedule your booking.</p>
    <p>Thank you for choosing {{ config('app.name') }}. We look forward to seeing you soon!</p>
@endsection