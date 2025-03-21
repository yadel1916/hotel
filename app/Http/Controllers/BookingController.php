<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::All();
        return view('bookings.index')->with(['bookings' =>$bookings]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookingRequest $request)
    {
        //dd($request->all());
        $booking= new User;
        $booking->id = $request -> id;
        $booking->description =$request ->description;
        $booking->user_id= $request -> user_id;
        $booking->room_id= $request -> room_id;
        
        
        
        if ($booking->save()){
            return redirect ('bookings')->with('messages', 'La reserva'. $booking->id. ' ¡fue creada!');
        }

       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
       
        return ['booking' => $booking];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookingRequest $request, Booking $booking)
    {
        $booking->id = $request -> id;
        $booking->description =$request ->description;
        $booking->user_id= $request -> user_id;
        $booking->room_id= $request -> room_id;
        
        if ($booking->save()){
            return redirect ('bookings')->with('messages', 'La reserva;'. $booking->id. ' ¡fue actualizada!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        if($booking->delete()){
            return redirect('bookings')->with('messages', 'La reserva:'.$booking->id.' ¡Fue eliminada!');
        }
        return redirect('users')->with('error', 'No se pudo eliminar el usuario.');
    }

    public function search(Request $request)
    {
        $bookings= User::names($request->q)->paginate(20);
        return view('bookings.search')->with(['bookings'=>$bookings]);
    }
}
