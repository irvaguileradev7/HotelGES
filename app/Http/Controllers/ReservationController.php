<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Guest;
use App\Models\Reservation;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Schema;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $room_id = Session::get('room_id');
        $reservations = Reservation::where('room_id', $room_id)
            ->orderBy('time_from', 'asc')
            ->with('guest') // Cargar la relación "guest"
            ->get();

        $reservedDates = $reservations->map(function ($reservation) {
            return [
                'time_from' => Carbon::parse($reservation->time_from)->toDateString(),
                'time_to' => Carbon::parse($reservation->time_to)->toDateString(),
            ];
        });

        return view('reservations.index', compact('reservations', 'reservedDates'));
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
            'room_id' => 'required',
            'time_from' => 'required|date',
            'time_to' => [
                'required',
                'date',
                function ($attribute, $value, $fail) use ($request) {
                    $timeFrom = Carbon::parse($request->input('time_from'));
                    $timeTo = Carbon::parse($value);

                    if ($timeTo->lessThan($timeFrom)) {
                        $fail('La fecha de salida no puede ser anterior a la fecha de entrada.');
                    }
                },
                Rule::unique('reservations')->where(function ($query) use ($request) {
                    return $query->where('room_id', $request->room_id)
                        ->where(function ($query) use ($request) {
                            $query->where(function ($query) use ($request) {
                                $query->where('time_from', '<=', $request->time_from)
                                    ->where('time_to', '>=', $request->time_from);
                            })
                                ->orWhere(function ($query) use ($request) {
                                    $query->where('time_from', '<=', $request->time_to)
                                        ->where('time_to', '>=', $request->time_to);
                                })
                                ->orWhere(function ($query) use ($request) {
                                    $query->where('time_from', '>=', $request->time_from)
                                        ->where('time_to', '<=', $request->time_to);
                                });
                        });
                }),
                function ($attribute, $value, $fail) use ($request) {
                    $existingReservation = DB::table('reservations')
                        ->where('room_id', $request->room_id)
                        ->where('time_from', '<=', $request->time_to)
                        ->where('time_to', '>=', $request->time_from)
                        ->first();

                    if ($existingReservation) {
                        $fail('El rango de fechas seleccionado está ocupado.');
                    }
                }
            ]
        ]);


        $reservation = new Reservation();
        $reservation->room_id = $request->input('room_id');
        $reservation->time_from = $request->input('time_from');
        $reservation->time_to = $request->input('time_to');
        $reservation->save();

        Session::put('reservation_id', $reservation->id);

        return redirect()->route('guests.create')->with('reservation_id', $reservation->id);
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

    public function deleteReservationTable(Request $request)
{
    $reservationId = $request->input('reservationId');
    if ($reservationId) {
        // Verifica si la tabla existe antes de eliminarla
        if (Schema::hasTable('reservation_' . $reservationId)) {
            Schema::dropIfExists('reservation_' . $reservationId);
            return response()->json(['message' => 'Tabla eliminada correctamente'], 200);
        }
    }

    return response()->json(['message' => 'No se encontró la tabla asociada a la reserva'], 404);
}
}
