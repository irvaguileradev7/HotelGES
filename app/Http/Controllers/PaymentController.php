<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Service;
use App\Models\Payment;
use App\Models\AsignService;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // OBTENER LA SUMA DE TODOS LOS SERVICIOS DE UN HUESPED
        $servicios = AsignService::where('guest_id',session('guest_id'))->sum('total_services');
        // dd($Servicios);

        // OBTENER EL PRECIO DEL CUARTO
        $precioCuarto = DB::table('rooms')
                        ->join('reservations', 'reservations.id', '=', 'rooms.id')
                        ->select('price')
                        ->first();
        // dd($precioCuarto);

        $totalPagar = $servicios + $precioCuarto->price;

        $payment = new Payment;
        $payment->guest_id = session('guest_id');
        $payment->guest_payment = 0;
        $payment->total_payment = $totalPagar;
        $payment->difference = $totalPagar - $payment->guest_payment;
        $payment->save();
        
        

        $asignservices = AsignService::latest()->paginate();

        return view('payments.index', compact('asignservices','servicios','precioCuarto','totalPagar'));
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
            'total_services' => 'required'
        ]);

        

        return redirect()->route('payments.index')->with('success', 'Asignación de servicio creada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
