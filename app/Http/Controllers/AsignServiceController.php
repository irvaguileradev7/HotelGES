<?php

namespace App\Http\Controllers;

use App\Models\AsignService;
use App\Models\Service;
use App\Models\Guest;
use Illuminate\Http\Request;

class AsignServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $services = Service::latest()->paginate();

        return view('asignservices.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'quantity' => 'required',
            'guests_id' => 'required',
            'services_id' => 'required'
        ]);

        $guests_id = $request->input('guests_id');
        $services_id = $request->input('services_id');

        $asignService = new AsignService($request->all());
        $guest = Guest::find($guests_id);
        $service = Service::find($services_id);
        $asignService->guests()->associate($guest);
        $asignService->services()->associate($service);
        $asignService->save();

        return redirect()->route('guests.index')->with('success', 'Huesped creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AsignService  $asignService
     * @return \Illuminate\Http\Response
     */
    public function show(AsignService $asignService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AsignService  $asignService
     * @return \Illuminate\Http\Response
     */
    public function edit(AsignService $asignService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AsignService  $asignService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AsignService $asignService)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AsignService  $asignService
     * @return \Illuminate\Http\Response
     */
    public function destroy(AsignService $asignService)
    {
        //
    }
}
