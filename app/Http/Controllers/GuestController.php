<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Room;
use Illuminate\Http\Request;
use Monarobase\CountryList\CountryListFacade;
use Illuminate\Support\Facades\Session;
use Monarobase\CountryList\CountryList;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guests = Guest::latest()->paginate();
        $countries = CountryListFacade::getList('es');
        return view('guests.index',compact('guests','countries'))
        ->with('i', (request()->input('page', 1) - 1) * 5);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = Room::all();
        $countries = CountryListFacade::getList('es');
        return view('guests.create',compact('rooms','countries'));
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
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'nullable|email',
            'phone' => 'nullable',
            'adults' => 'required',
            'kids' =>  'nullable',
            'country' => 'required',
            'region' => 'required',
            'city' => 'required',
            'street_address' => 'required',
            'zip_code' => 'required|min:4|max:10'
        ]);
    
        $room_id = $request->input('room_id');

        $guest = new Guest($request->all());
        $guest->room_id = $room_id;
        
        $guest->save();

        Session::put('guest_id', $guest->id);
    
        return redirect()->route('asignservices.index')->with('success', 'Huesped creado exitosamente');
    }
  /*return redirect()->route('guests.index')
            ->with('success', 'Habitacion creada con exito');
            */
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function show(Guest $guest)
    {
        return view('guests.show',compact('guest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function edit(Guest $guest)
    {
        $countries = CountryListFacade::getList('es');
        return view('guests.edit',compact('guest','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guest $guest)
    {
        

        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'nullable|email',
            'phone' => 'nullable',
            'adults' => 'required',
            'kids' =>  'nullable',
            'country' => 'required',
            'region' => 'required',
            'city' => 'required',
            'address' => 'nullable',
            'zip_code' => 'required|min:4|max:10'
        ]);

        $guest->update($request->all());
        
        return redirect()->route('guests.index')
        ->with('success','Se agrego al huesped correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guest $guest)
    {
        $guest->delete();

        return redirect()->route('guests.index')
        ->with('success','El huesped se elimino correctamente');
    }
}
