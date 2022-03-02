<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Models\Car;
use App\Models\Reservation;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $limit = $request->input('limit', 20);
        $user = $request->user();
        $is_admin = $user->is_admin;
        if ($is_admin) $reservations = Reservation::latest()->simplePaginate($limit);
        else $reservations = Reservation::where('id', $user->id)->latest()->simplePaginate($limit);

        return view('reservations.index', compact('reservations', 'is_admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $car_id = (int) $request->query('car');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreReservationRequest $request
     * @return Response
     */
    public function store(StoreReservationRequest $request)
    {
        //TODO: Handle reservations requests
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReservationRequest  $request
     * @param  \App\Models\Reservation  $reservation
     * @return Response
     */
    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return Response
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return \response()->redirectTo('/reservations');
    }
}
