<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderByDesc('event_date')
            ->orderBy('sort_order')
            ->orderBy('title')
            ->get();

        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        $event = new Event([
            'published'  => true,
            'sort_order' => 0,
        ]);

        return view('admin.events.form', [
            'event' => $event,
            'mode'  => 'create',
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);

        Event::create($data);

        return redirect()
            ->route('admin.events.index')
            ->with('status', 'Event "' . $data['title'] . '" created.');
    }

    public function edit(Event $event)
    {
        return view('admin.events.form', [
            'event' => $event,
            'mode'  => 'edit',
        ]);
    }

    public function update(Request $request, Event $event)
    {
        $data = $this->validateData($request, $event);

        $event->update($data);

        return redirect()
            ->route('admin.events.index')
            ->with('status', 'Event "' . $event->title . '" updated.');
    }

    public function destroy(Event $event)
    {
        $title = $event->title;
        $this->deleteBanner($event->banner_path);
        $event->delete();

        return redirect()
            ->route('admin.events.index')
            ->with('status', 'Event "' . $title . '" deleted.');
    }

    protected function validateData(Request $request, ?Event $event = null): array
    {
        $data = $request->validate([
            'title'         => 'required|string|max:255',
            'subtitle'      => 'nullable|string|max:255',
            'body'          => 'nullable|string',
            'event_date'    => 'nullable|date',
            'end_date'      => 'nullable|date|after_or_equal:event_date',
            'location'      => 'nullable|string|max:255',
            'slug'          => [
                'nullable',
                'string',
                'max:255',
                'regex:/^[^\/\s]+$/',
                Rule::unique('events', 'slug')->ignore($event?->id),
            ],
            'sort_order'    => 'nullable|integer',
            'published'     => 'nullable|boolean',
            'banner'        => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:8192',
            'remove_banner' => 'nullable|boolean',
        ]);

        $data['slug']       = ($data['slug'] ?? '') ?: $this->uniqueSlug($data['title'], $event?->id);
        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['published']  = $request->boolean('published');

        if ($request->hasFile('banner')) {
            $this->deleteBanner($event?->banner_path);
            $data['banner_path'] = $this->storeBanner($request->file('banner'));
        } elseif ($request->boolean('remove_banner')) {
            $this->deleteBanner($event?->banner_path);
            $data['banner_path'] = null;
        }

        unset($data['banner'], $data['remove_banner']);

        return $data;
    }

    protected function storeBanner($file): string
    {
        $name     = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) ?: 'banner';
        $filename = $name . '-' . substr(md5(uniqid('', true)), 0, 8) . '.' . $file->getClientOriginalExtension();

        $file->move(public_path('uploads'), $filename);

        return '/uploads/' . $filename;
    }

    protected function deleteBanner(?string $path): void
    {
        if (! $path || ! Str::startsWith($path, '/uploads/')) {
            return;
        }

        $full = public_path(ltrim($path, '/'));

        if (is_file($full)) {
            @unlink($full);
        }
    }

    protected function uniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $base = Str::slug($title) ?: 'event';
        $slug = $base;
        $i    = 2;

        while (Event::where('slug', $slug)
            ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
            ->exists()) {
            $slug = "{$base}-{$i}";
            $i++;
        }

        return $slug;
    }
}
