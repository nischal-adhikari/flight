<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 
use App\Models\Flight;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // all flights after the current date
        $flights = Flight::where('date', '>=', date('Y-m-d'))->get();
        return view('home', compact('flights'));
    }
    //function to redirect to history
    public function history()
    {

//get all flights booked before current date
        $flight_before = Flight::join('seats', 'flights.id', '=', 'seats.flight_id')->where('seats.user_id', auth()->user()->id)->where('flights.date', '<', date('Y-m-d'))->get();
//get all flights booked after current date
        $flight_after = Flight::join('seats', 'flights.id', '=', 'seats.flight_id')->where('seats.user_id', auth()->user()->id)->where('flights.date', '>', date('Y-m-d'))->get();
        return view('history', compact('flight_before', 'flight_after'));

    }
}
