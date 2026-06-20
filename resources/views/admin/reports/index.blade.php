@extends('admin.layout')

@section('admin_title', 'All reports')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-extrabold text-primary">Troop Reports</h1>
            <p class="text-sm text-slate-500 mt-0.5">{{ $reports->count() }} {{ Str::plural('report', $reports->count()) }} · newest first</p>
        </div>
        <a href="{{ route('admin.reports.create') }}"
           class="inline-flex items-center gap-1.5 rounded-lg bg-primary text-white font-semibold px-4 py-2.5 hover:bg-primary/90 transition">
            <span class="material-symbols-outlined text-[20px]">add</span>
            New report
        </a>
    </div>

    @if ($reports->isEmpty())
        <div class="bg-white rounded-2xl border border-slate-200 p-12 text-center">
            <span class="material-symbols-outlined text-[40px] text-slate-300">description</span>
            <p class="text-slate-500 mt-2">No reports yet. Create your first one.</p>
        </div>
    @else
        <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 text-slate-500 text-xs uppercase tracking-wide">
                    <tr>
                        <th class="text-left font-semibold px-4 py-3">Year</th>
                        <th class="text-left font-semibold px-4 py-3">Title</th>
                        <th class="text-left font-semibold px-4 py-3">Type</th>
                        <th class="text-left font-semibold px-4 py-3 hidden md:table-cell">URL</th>
                        <th class="text-left font-semibold px-4 py-3">Status</th>
                        <th class="text-right font-semibold px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach ($reports as $report)
                        <tr class="hover:bg-slate-50/60">
                            <td class="px-4 py-3 font-bold text-primary">{{ $report->year }}</td>
                            <td class="px-4 py-3">
                                <div class="font-semibold text-slate-800">{{ $report->title }}</div>
                                @if ($report->chip_label && $report->chip_label !== $report->title)
                                    <div class="text-xs text-slate-400">chip: {{ $report->chip_label }}</div>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                @if ($report->category === 'event')
                                    <span class="inline-flex items-center gap-1 rounded-full bg-blue-50 text-blue-700 px-2.5 py-1 text-xs font-semibold">
                                        <span class="material-symbols-outlined text-[14px]">{{ $report->icon }}</span> Event
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 rounded-full bg-slate-100 text-slate-600 px-2.5 py-1 text-xs font-semibold">
                                        <span class="material-symbols-outlined text-[14px]">{{ $report->icon }}</span> Report
                                    </span>
                                @endif
                            </td>
                            <td class="px-4 py-3 hidden md:table-cell">
                                <a href="{{ url('/' . $report->slug) }}" target="_blank"
                                   class="text-accent hover:underline font-mono text-xs">/{{ $report->slug }} ↗</a>
                            </td>
                            <td class="px-4 py-3">
                                @if ($report->published)
                                    <span class="inline-flex items-center gap-1 text-green-700 text-xs font-semibold">
                                        <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span> Published
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 text-slate-400 text-xs font-semibold">
                                        <span class="w-1.5 h-1.5 rounded-full bg-slate-300"></span> Draft
                                    </span>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center justify-end gap-1">
                                    <a href="{{ route('admin.reports.edit', $report) }}"
                                       class="inline-flex items-center gap-1 rounded-lg px-2.5 py-1.5 text-slate-600 hover:bg-slate-100 transition font-semibold text-xs">
                                        <span class="material-symbols-outlined text-[16px]">edit</span> Edit
                                    </a>
                                    <form method="POST" action="{{ route('admin.reports.destroy', $report) }}"
                                          onsubmit="return confirm('Delete “{{ addslashes($report->title) }}”? This cannot be undone.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="inline-flex items-center gap-1 rounded-lg px-2.5 py-1.5 text-red-600 hover:bg-red-50 transition font-semibold text-xs">
                                            <span class="material-symbols-outlined text-[16px]">delete</span> Delete
                                        </button>
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
