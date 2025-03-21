<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::All();
        return view('rooms.index')->with(['rooms' =>$rooms]);
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
    public function store(RoomRequest $request)
    {
        //dd($request->all());
        $room = new Room;
        $room->number_room = $request -> number_room;
        $room->user_name = $request -> user_name;
      
        
        if ($room->save()){
            return redirect ('rooms')->with('messages', 'La habitacion;'. $room->number_room. ' ¡fue reservada por');
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
    public function edit(Room $room)
    {
       
        return ['room' => $room];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoomRequest $request, Room $room)
    {
        $room->number_room = $request -> number_roomEdit;
        $room->user_name = $request -> user_nameEdit;
        
        if ($room->save()){
            return redirect ('rooms')->with('messages', 'La habitación:'. $room->number_room.' ¡fue reservada por!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        if($room->delete()){
            return redirect('rooms')->with('messages', 'La habitación:'.$user->number_room.' ¡Esta disponible!');
        }
    }

    public function search(Request $request)
    {
        $rooms= Room::names($request->q)->paginate(20);
        return view('rooms.search')->with(['rooms'=>$rooms]);
    }
}
