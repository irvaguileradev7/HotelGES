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
            'guest_id' => 'required',
            'service_id' => 'required|array',
            'quantity' => 'required|array',
            'quantity.*' => 'numeric|min:0',
        ]);

        // CODIGO ORIGINAL
        /* $guest_id = $request->input('guest<li>{{ $service->id}}</li>_id');
        $service_id = $request->input('service_id');

        $asignService = new AsignService($request->all());
        $guest = Guest::find($guest_id);
        $service = Service::find($service_id);
        $asignService->guests()->associate($guest);
        $asignService->services()->associate($service);
        $asignService->save(); */
       
        // SEGUNDA SOLUCION PROPUESTA 
        // AHORA SE ALMACENAN MULTIPLES SERVICOS A UN SOLO HUESPED
        $guest_id = $request->input('guest_id');
        $service_ids = $request->input('service_id');
        $quantities = $request->input('quantity');

    for ($i = 0; $i < count($service_ids); $i++) {
        $asignService = new AsignService();
        $asignService->guest_id = $guest_id;
        $asignService->service_id = $service_ids[$i];
        $asignService->quantity = $quantities[$i];
        $asignService->save();
    
    }

        $servicios = AsignService::where('guest_id', session('guest_id'))->sum('total_services');
        
        return redirect()->route('payments.create')->with(
            ['success' => 'Asignación de servicio creada exitosamente', 'servicios' => $servicios]);
    }

    /**
     * $guest = AsignService::findOrFail($guest_id)
     * $totalServices = $guest->total_services
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
