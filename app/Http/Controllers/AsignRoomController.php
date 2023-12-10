<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Facades\Session;

class AsignRoomController extends Controller
{

    public function index()
    {
        //$guestId = session('guest_id');

        $rooms = Room::latest()->paginate();

        return view('asignrooms.index', compact('rooms'));
        //->with('idGuest', $guestId);
    }


    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required',
        ]);

        $room_id = $request->input('room_id');

        Session::put('room_id', $room_id);
        return redirect()->route('reservations.index')->with('room_id', $request->input('room_id'));
    }


}
