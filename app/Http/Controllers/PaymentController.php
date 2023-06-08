<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Service;
use App\Models\Payment;
use App\Models\AsignService;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $payments = Payment::latest()->paginate();

        return view('payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // OBTENER LA SUMA DE TODOS LOS SERVICIOS DE UN HUESPED
        $servicios = AsignService::where('guest_id', session('guest_id'))->sum('total_services');
        // dd($Servicios);

        // OBTENER EL PRECIO DEL CUARTO
        $precioCuarto = DB::table('rooms')
            ->join('reservations', 'reservations.id', '=', 'rooms.id')
            ->select('price')
            ->pluck('price')
            ->first();
        // dd($precioCuarto);

        // OBTENER LA CANTIDAD DE NOCHES DE LA RESERVACION
        $noches = DB::table('reservations')
            ->join('rooms', 'rooms.id', '=', 'reservations.room_id')
            ->where('reservations.id', session('guest_id'))
            ->select('nights')
            ->pluck('nights')
            ->first();
        // dd($noches);        

        // OBTENER EL COSTO TOTAL DE LA RESERVACION
        $precioCuarto = $precioCuarto * $noches;
        // dd($precioCuarto);

        $totalPagar = $servicios + $precioCuarto;
        // dd($totalPagar);


        $pagoHuesped = $request->input('pagoHuesped');


        $asignservices = AsignService::latest()->paginate();

        return view('payments.create', compact('asignservices', 'servicios', 'precioCuarto', 'pagoHuesped', 'totalPagar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $servicios = AsignService::where('guest_id', session('guest_id'))->sum('total_services');
        // dd($Servicios);

        // OBTENER EL PRECIO DEL CUARTO
        $precioCuarto = DB::table('rooms')
            ->join('reservations', 'reservations.id', '=', 'rooms.id')
            ->select('price')
            ->pluck('price')
            ->first();
        // dd($precioCuarto);

        // OBTENER LA CANTIDAD DE NOCHES DE LA RESERVACION
        $noches = DB::table('reservations')
            ->join('rooms', 'rooms.id', '=', 'reservations.room_id')
            ->where('reservations.id', session('guest_id'))
            ->select('nights')
            ->pluck('nights')
            ->first();
        // dd($noches);        

        // OBTENER EL COSTO TOTAL DE LA RESERVACION
        $precioCuarto = $precioCuarto * $noches;
        // dd($precioCuarto);

        $totalPagar = $servicios + $precioCuarto;
        // dd($totalPagar);


        $pagoHuesped = $request->input('pagoHuesped');

        $payment = new Payment;
        $payment->guest_id = session('guest_id');
        $payment->guest_payment = $pagoHuesped;
        $payment->total_payment = $totalPagar;
        $payment->difference = $totalPagar - $payment->guest_payment;
        $payment->save();

        $guestId = session('guest_id');
        $payment = Payment::where('guest_id', $guestId)->first();

        if ($payment) {
            $payment->guest_payment = $request->input('pagoHuesped');
            $payment->total_payment = $totalPagar;
            $payment->difference = $totalPagar - $payment->guest_payment;
            $payment->save();
        } else {
            $payment = new Payment;
            $payment->guest_id = $guestId;
            $payment->guest_payment = $request->input('pagoHuesped');
            $payment->total_payment = $totalPagar;
            $payment->difference = $totalPagar - $payment->guest_payment;
            $payment->save();
        }


        return redirect()->route('guests.index')->with('success', 'Pago creado exitosamente');
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

        $payment = Payment::findOrFail($id);

        // Obtener el ID del huésped asociado al pago
        $guestId = $payment->guest_id;

        // Obtener la suma de todos los servicios de un huésped
        $servicios = AsignService::where('guest_id', $guestId)->sum('total_services');

        // Obtener el precio del cuarto
        $precioCuarto = DB::table('rooms')
            ->join('reservations', 'reservations.id', '=', 'rooms.id')
            ->select('price')
            ->pluck('price')
            ->first();

        // Obtener la cantidad de noches de la reservación
        $noches = DB::table('reservations')
            ->join('rooms', 'rooms.id', '=', 'reservations.room_id')
            ->where('reservations.id', $guestId)
            ->select('nights')
            ->pluck('nights')
            ->first();

        // Calcular el costo total de la reservación
        $precioCuarto = $precioCuarto * $noches;

        // Calcular el total a pagar
        $totalPagar = $servicios + $precioCuarto;

        // Obtener el pago del huésped
        $pagoHuesped = $payment->guest_payment;

        return view('payments.edit', compact('payment', 'servicios', 'precioCuarto', 'totalPagar', 'pagoHuesped'));
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

        $payment = Payment::findOrFail($id);
        $pagoHuesped = $payment->guest_payment;
        $sumaPago = $request->input('sumaPago');

        // Realizar la suma del pago del huésped y la cantidad a sumar
        $nuevoPagoHuesped = $pagoHuesped + $sumaPago;
        $totalPagar = $payment->total_payment;

        $payment->guest_payment = $nuevoPagoHuesped;
        $payment->difference = $totalPagar - $nuevoPagoHuesped;
        $payment->save();

        return redirect()->route('payments.index')->with('success', 'Pago actualizado exitosamente');
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
