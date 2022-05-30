@extends('layouts.app')

@section('content')

@if(!empty($flight))
<div class="card">
        <div class="card-header">
            <h3>{{ $flight->flight_name }}</h3>
        </div>
        <div class="card-body">
            <p>Origin   :{{ $flight->from }} </p>
            <p>Destination :{{ $flight->to }}</p>
            <p>Date :{{ $flight->date }}</p>
            <p>Time :{{ $flight->time }}</p>
            <p>Total Seats :{{ $flight->total_seats }}</p>
            <p>Price per Seat :{{ $flight->price }}</p>
        </div>
        <!-- button to edit flight -->
        <div class="card-footer">
            
                <a href="{{ route('flights.edit', $flight->id) }}">Edit Flight</a>
            </form>
</div>



@endif



@endsection