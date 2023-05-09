<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Floor;
use App\Models\Type;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::latest()->paginate();

        return view('rooms.index', compact('rooms'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $floors = Floor::all();
        return view('rooms.create',compact('types','floors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required',
            'detail' => 'required',
            'price' => 'required',
            'capacity' => 'required',
            'floor_id' => 'required',
            'type_id' => 'required'
        ]);

        Room::create($request->all());

        return redirect()->route('rooms.index')
            ->with('success', 'Habitacion creada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        $types = Type::all();
        $floors = Floor::all();
        return view('rooms.show',compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        $types = Type::all();
        $floors = Floor::all();
        return view('rooms.edit',compact('room','types','floors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room, Floor $floor, Type $type)
    {
        $request->validate([
            'number' => 'required',
            'detail' => 'required',
            'price' => 'required',
            'capacity' => 'required',
            'floor_id' => 'required',
            'type_id' => 'required'
        ]);

        $room->update($request->all());

        return redirect()->route('rooms.index')
            ->with('success', 'Habitacion actualizada con exito');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $room->delete();

        return redirect()->route('rooms.index')
            ->with('success', 'Habitacion eliminada con exito');
    }

    public function showRoom(Room $room)
    {
        $types = Type::all();
        $floors = Floor::all();
        return view('rooms.showRoom',compact('room'));
    }
}
