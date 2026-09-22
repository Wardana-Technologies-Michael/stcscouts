<?php

namespace App\Http\Controllers;

use App\Models\Event;

class EventController extends Controller
{
    public function show(string $slug)
    {
        $event = Event::where('slug', $slug)->where('published', true)->firstOrFail();

        return view('event-show', compact('event'));
    }
}
