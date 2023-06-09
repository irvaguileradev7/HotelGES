<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Floor;
use App\Models\Type;
use App\Models\Status;
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
        return view('rooms.index', compact('rooms',));
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
        $statuses = Status::all();
        return view('rooms.create', compact('types', 'floors', 'statuses'));
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
            'type_id' => 'required',
            'status_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move(public_path($destinationPath), $profileImage);
            $input['image'] = $destinationPath . $profileImage;
        }

        $input['number'] = $request->input('number');
        $input['detail'] = $request->input('detail');
        $input['price'] = $request->input('price');
        $input['capacity'] = $request->input('capacity');
        $input['floor_id'] = $request->input('floor_id');
        $input['type_id'] = $request->input('type_id');
        $input['status_id'] = $request->input('status_id');
        Room::create($input);

        return redirect()->route('rooms.index')
            ->with('success', 'Habitacion creada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room, Status $status)
    {
        $types = Type::all();
        $floors = Floor::all();
        $statuses = Status::all();
        return view('rooms.show', compact('room', 'statuses'));
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
        $statuses = Status::all();
        return view('rooms.edit', compact('room', 'types', 'floors', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room, Floor $floor, Type $type, Status $status)
    {
        $request->validate([
            'number' => 'required',
            'detail' => 'required',
            'price' => 'required',
            'capacity' => 'required',
            'floor_id' => 'required',
            'type_id' => 'required',
            'status_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $image = $request->file('image');
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move(public_path($destinationPath), $profileImage);
            $input['image'] = $destinationPath . $profileImage;
        }
        $input['number'] = $request->input('number');
        $input['detail'] = $request->input('detail');
        $input['price'] = $request->input('price');
        $input['capacity'] = $request->input('capacity');
        $input['floor_id'] = $request->input('floor_id');
        $input['type_id'] = $request->input('type_id');
        $input['status_id'] = $request->input('status_id');
        $room->update($input);

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
        return view('rooms.showRoom', compact('room'));
    }
}
