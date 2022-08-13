<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Seats;

use Illuminate\Http\Request;

class FlightController extends Controller
{
//book a seat
    public function book(Request $request, $flight)
    {
        
        $flight = Flight::find($flight);
        foreach($request->seat as $s){
        $seat = $flight->seats()->where('seat_number', $s)->first();
        if($seat->status == null){
            $seat->user_id = auth()->user()->id; 
            $seat->status = 1;
            $seat->save();
            $message = 'Seat booked successfully';
        }
        else{
            $message = 'Seat already booked';
        }
        }
        return redirect()->back()->with('message', $message);
    }
    public function show(Flight $flight)
    {
        //view flight_show page with flight data

        $seat = Seats::where('flight_id',$flight->id)->get();
        return view('flight_show', compact('flight','seat'));
    }
    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
       
        $flights =Flight::where('from','like',$request->from)->where('to','like',$request->to)->where('date', '>=', date('Y-m-d'))->get();
        return view('search', compact('flights'));        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // store flight data
        $flight = new Flight;   
        $flight->total_seats = $request->total_seats;
        $flight->time = $request->time;
        $flight->date = $request->date;
        $flight->flight_name = $request->flight_name;
        $flight->from = $request->from;
        $flight->to = $request->to;
        $flight->price = $request->price;
        $flight->save();


        //redirect to the flights page
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function edit(Flight $flight)
    {
//redirect to edit page
        return view('admin.flight_edit', compact('flight'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Flight $flight)
    {
        //update flight data
        $flight->total_seats = $request->total_seats;
        $flight->time = $request->time;
        $flight->date = $request->date;
        $flight->flight_name = $request->flight_name;
        $flight->from = $request->from;
        $flight->to = $request->to;
        $flight->price = $request->price;
        $flight->save();
//delete all seats
        $flight->seats()->delete();


        //redirect to the flights page
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flight $flight)
    {
        //delete flight
        $flight->delete();
        //redirect to the flights page
        return redirect('/admin/flights');
    }
}
