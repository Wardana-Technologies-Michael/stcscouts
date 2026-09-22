@extends('admin.layout')

@section('admin_title', 'Events')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-xl font-bold text-slate-800">Events</h1>
            <p class="text-sm text-slate-400 mt-0.5">Current and upcoming event pages managed via the CMS.</p>
        </div>
        <a href="{{ route('admin.events.create') }}"
           class="inline-flex items-center gap-1.5 rounded-lg bg-primary text-white font-semibold px-4 py-2.5 text-sm hover:bg-primary/90 transition">
            <span class="material-symbols-outlined text-[18px]">add</span>
            New event
        </a>
    </div>

    @if ($events->isEmpty())
        <div class="bg-white rounded-2xl border border-slate-200 p-12 text-center text-slate-400">
            <span class="material-symbols-outlined text-5xl mb-3 block">event</span>
            No events yet. <a href="{{ route('admin.events.create') }}" class="text-accent hover:underline">Create the first one.</a>
        </div>
    @else
        <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="text-left px-5 py-3 font-semibold text-slate-600">Event</th>
                        <th class="text-left px-5 py-3 font-semibold text-slate-600">Date(s)</th>
                        <th class="text-left px-5 py-3 font-semibold text-slate-600">Location</th>
                        <th class="text-left px-5 py-3 font-semibold text-slate-600">Status</th>
                        <th class="px-5 py-3"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach ($events as $event)
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-5 py-3.5">
                                <div class="font-semibold text-slate-800">{{ $event->title }}</div>
                                @if ($event->subtitle)
                                    <div class="text-xs text-slate-400 mt-0.5">{{ $event->subtitle }}</div>
                                @endif
                                <div class="text-xs text-slate-400 font-mono mt-0.5">
                                    <a href="{{ url('/events/' . $event->slug) }}" target="_blank"
                                       class="hover:text-accent">/events/{{ $event->slug }} ↗</a>
                                </div>
                            </td>
                            <td class="px-5 py-3.5 text-slate-600">
                                @if ($event->event_date)
                                    {{ $event->event_date->format('d M Y') }}
                                    @if ($event->end_date && $event->end_date->ne($event->event_date))
                                        – {{ $event->end_date->format('d M Y') }}
                                    @endif
                                @else
                                    <span class="text-slate-300">—</span>
                                @endif
                            </td>
                            <td class="px-5 py-3.5 text-slate-600">
                                {{ $event->location ?: '—' }}
                            </td>
                            <td class="px-5 py-3.5">
                                @if ($event->published)
                                    <span class="inline-flex items-center gap-1 rounded-full bg-green-50 text-green-700 text-xs font-semibold px-2.5 py-1">
                                        <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span> Published
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 rounded-full bg-slate-100 text-slate-500 text-xs font-semibold px-2.5 py-1">
                                        <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Draft
                                    </span>
                                @endif
                            </td>
                            <td class="px-5 py-3.5 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.events.edit', $event) }}"
                                       class="rounded-lg border border-slate-200 text-slate-600 px-3 py-1.5 text-xs font-semibold hover:bg-slate-100 transition">Edit</a>

                                    <form method="POST" action="{{ route('admin.events.destroy', $event) }}"
                                          onsubmit="return confirm('Delete "{{ addslashes($event->title) }}"? This cannot be undone.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="rounded-lg border border-red-100 text-red-600 px-3 py-1.5 text-xs font-semibold hover:bg-red-50 transition">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
