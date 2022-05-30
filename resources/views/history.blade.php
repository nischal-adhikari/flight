@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

Upcoming Flights

@if(!empty($flight_after))
<!-- list $flight_after -->
<ul>
    @foreach($flight_after as $flight)
    <li>
            <p>Flight Name : {{ $flight->flight_name }}  Seat Number : {{ $flight->seat_number }} </p> 
            <p>Origin   :{{ $flight->from }} </p>
            <p>Destination :{{ $flight->to }}</p>
            <p>Date :{{ $flight->date }}   Time :{{ $flight->time }}</p>
            <p>Price :{{$flight->price}}</p>
      <p>  <a href="{{ route('flights.show', $flight->id) }}"> show more</a> </p>
    </li>
    @endforeach
@endif


All flights before today
@if(!empty($flight_before))
<!-- list $flight_before -->
<ul>
    @foreach($flight_before as $flight)
    <li>
        <p>Flight Name : {{ $flight->flight_name }}  Seat Number : {{ $flight->seat_number }} </p> 
            <p>Origin   :{{ $flight->from }} </p>
            <p>Destination :{{ $flight->to }}</p>
            <p>Date :{{ $flight->date }}   Time :{{ $flight->time }}</p>
            <p>Price :{{$flight->price}}</p>
        <a href="{{ route('flights.show', $flight->id) }}">
            {{ $flight->flight_name }}
        </a>
    </li>
    @endforeach


@endif
               




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
