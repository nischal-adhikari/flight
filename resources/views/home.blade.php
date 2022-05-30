@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
<!--  if $message show $message -->
@if(Session::has('message'))
    <div class="alert alert-success">
        {{ Session::get('message') }}
    </div>
@endif

<!-- list all flights -->
@if(!empty($flights))
@foreach($flights as $flight)

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
<!-- button to book seat -->
        <div class="card-footer">
            <form action="{{ route('flights.book', $flight->id) }}" method="POST">
                @csrf
<!-- input for seat_number-->
                <div class="form-group">
                    <label for="seat_number">Seat Number</label>
                    <input type="text" class="form-control" id="seat_number" name="seat_number" placeholder="Seat Number">
                </div>
                <button type="submit" class="btn btn-primary">Book Seat</button>
            </form>
        </div>
    </div>


@endforeach
@endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
