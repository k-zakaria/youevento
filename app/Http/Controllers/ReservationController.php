<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function reserver(Event $evenement, Request $request)
    {
        $request->validate([
            'nombre_places' => 'required|integer|min:1',
        ]);

        $reservation = new Reservation();
        $reservation->utilisateur_id = Auth::id();
        $reservation->evenement_id = $evenement->id;
        $reservation->nombre_de_places = $request->nombre_places;
        $reservation->save();

        return redirect()->route('evenements.index')->with('success', 'Réservation effectuée avec succès!');
    }

    public function mesReservations()
    {
        $reservations = Auth::user()->reservations()->get();
        return view('reservations.mes-reservations', compact('reservations'));
    }
}
