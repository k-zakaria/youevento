<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{

    public function index($id)
    {
        $event = Event::find($id)->first();
        $tickets = Ticket::all();
        return view('dashboard.ticket', compact('tickets', 'event'));
    }

    public function store(Request $request)
    {

        
        $validatedData = $request->validate([
            'title' => 'required|string',
            'type' => 'required|in:standard,vip',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        $validatedData['event_id'] = $request->event_id;

        Ticket::create($validatedData);

        return redirect()->back()->with('success', 'Ticket créé avec succès!');
    }


    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('tickets.show', compact('ticket'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'type' => 'required|in:standard,vip',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'event_id' => 'required|exists:events,id',
        ]);

        $ticket->update($validatedData);

        return redirect()->back()->with('success', 'Ticket mis à jour avec succès!');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->back()->with('success', 'Ticket supprimé avec succès!');
    }
}
