@extends('layouts.app')

@section('content')

@if(!empty($flights))
<!-- list all flights-->

@foreach($flights as $flight)
      <p>  <a href="{{ route('flights.show', $flight->id) }}"> {{$flight->flight_name}}</a> </p>
@endforeach

@endif



@endsection