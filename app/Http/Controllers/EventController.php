<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Location;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        $categories = Categorie::all();

        $data = [
            'events' => $events,
            'categories' => $categories,
        ];
        return view('frontOfice.index', compact('data'));
    }

    public function show()
    {
        $events = Event::all();
        $categories = Categorie::all();
        $locations = Location::all();

        $data = [
            'events' => $events,
            'categories' => $categories,
            'locations' => $locations,
        ];
        return view('dashboard.events', compact('data'));
    }

    public function create()
    {
        $locations = Location::all();
        return view('events.create', compact('locations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'date' => 'required',
            'location_id' => 'required',
            'categorie_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images', $imageName);
        }

        Event::create(array_merge($request->all(), ['image' => $imageName ?? null]));

        return redirect()->back()->with('success', 'Event created successfully');
    }

    public function edit(Event $event)
    {
        $locations = Location::all();
        return view('events.edit', compact('event', 'locations'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'date' => 'required',
            'location_id' => 'required',
            'categorie_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images', $imageName);
            $event->update(array_merge($request->all(), ['image' => $imageName]));
        } else {
            $event->update($request->all());
        }
    
        return redirect()->back()->with('success', 'Event updated successfully');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->back()->with('success', 'Event deleted successfully');
    }
}
