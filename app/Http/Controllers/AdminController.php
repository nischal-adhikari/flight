<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;

class AdminController extends Controller
{

//index
    public function index()
    {
        return view('admin.dashboard');
    }
//show all flights
    public function showAllFlights()
    {
        $flights = Flight::all();
        return view('admin.flights', compact('flights'));
    }


}



