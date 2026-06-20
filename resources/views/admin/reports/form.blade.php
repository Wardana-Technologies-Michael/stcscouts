@extends('admin.layout')

@section('admin_title', $mode === 'create' ? 'New report' : 'Edit report')

@section('content')
    @php
        $action = $mode === 'create'
            ? route('admin.reports.store')
            : route('admin.reports.update', $report);
    @endphp

    <div class="flex items-center gap-2 text-sm text-slate-400 mb-4">
        <a href="{{ route('admin.reports.index') }}" class="hover:text-slate-600">All reports</a>
        <span class="material-symbols-outlined text-[16px]">chevron_right</span>
        <span class="text-slate-600 font-medium">{{ $mode === 'create' ? 'New report' : 'Edit' }}</span>
    </div>

    <form method="POST" action="{{ $action }}" class="space-y-6">
        @csrf
        @if ($mode === 'edit')
            @method('PUT')
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Main column --}}
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-2xl border border-slate-200 p-6 space-y-5">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Title <span class="text-red-500">*</span></label>
                        <input type="text" name="title" required
                               value="{{ old('title', $report->title) }}"
                               placeholder="e.g. Year Report – 2024"
                               class="w-full rounded-lg border-slate-300 focus:border-primary focus:ring-primary">
                        <p class="text-xs text-slate-400 mt-1">Shown as the page heading.</p>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Body (HTML)</label>

                        {{-- Image upload helper --}}
                        <div class="flex items-center gap-3 mb-2 p-3 rounded-lg bg-slate-50 border border-slate-200">
                            <input type="file" id="imageUpload" accept="image/*"
                                   class="text-xs text-slate-600 file:mr-3 file:rounded-md file:border-0 file:bg-primary file:text-white file:px-3 file:py-1.5 file:font-semibold file:cursor-pointer">
                            <span id="uploadStatus" class="text-xs text-slate-500"></span>
                        </div>
                        <p class="text-xs text-slate-400 mb-2">
                            Upload an image to insert it at the cursor. For video, paste a YouTube/Vimeo
                            <code class="bg-slate-100 px-1 rounded">&lt;iframe&gt;</code> embed.
                        </p>

                        <textarea name="body" id="bodyField" rows="20"
                                  class="w-full rounded-lg border-slate-300 focus:border-primary focus:ring-primary font-mono text-sm leading-relaxed"
                                  placeholder="<p>Write or paste HTML here…</p>">{{ old('body', $report->body) }}</textarea>
                    </div>
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="space-y-6">
                <div class="bg-white rounded-2xl border border-slate-200 p-6 space-y-5">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Year <span class="text-red-500">*</span></label>
                        <input type="number" name="year" required min="1900" max="2100"
                               value="{{ old('year', $report->year) }}"
                               class="w-full rounded-lg border-slate-300 focus:border-primary focus:ring-primary">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Type <span class="text-red-500">*</span></label>
                        <select name="category"
                                class="w-full rounded-lg border-slate-300 focus:border-primary focus:ring-primary">
                            <option value="report" @selected(old('category', $report->category) === 'report')>Report (annual)</option>
                            <option value="event" @selected(old('category', $report->category) === 'event')>Event (jamboree, camp…)</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Chip label</label>
                        <input type="text" name="chip_label"
                               value="{{ old('chip_label', $report->chip_label) }}"
                               placeholder="Short label on the timeline"
                               class="w-full rounded-lg border-slate-300 focus:border-primary focus:ring-primary">
                        <p class="text-xs text-slate-400 mt-1">Leave blank to use the title.</p>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Icon</label>
                        <input type="text" name="icon"
                               value="{{ old('icon', $report->icon) }}"
                               placeholder="description"
                               class="w-full rounded-lg border-slate-300 focus:border-primary focus:ring-primary font-mono text-sm">
                        <p class="text-xs text-slate-400 mt-1">
                            <a href="https://fonts.google.com/icons" target="_blank" class="text-accent hover:underline">Material Symbol</a>
                            name (e.g. description, local_fire_department).
                        </p>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">URL slug</label>
                        <div class="flex items-center rounded-lg border border-slate-300 focus-within:border-primary focus-within:ring-1 focus-within:ring-primary overflow-hidden">
                            <span class="px-2.5 text-slate-400 text-sm bg-slate-50 self-stretch flex items-center">/</span>
                            <input type="text" name="slug"
                                   value="{{ old('slug', $report->slug) }}"
                                   placeholder="auto-generated from title"
                                   class="flex-1 border-0 focus:ring-0 text-sm font-mono">
                        </div>
                        <p class="text-xs text-slate-400 mt-1">The web address. Leave blank to auto-generate. Changing this breaks old links.</p>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Order within year</label>
                        <input type="number" name="sort_order"
                               value="{{ old('sort_order', $report->sort_order) }}"
                               class="w-full rounded-lg border-slate-300 focus:border-primary focus:ring-primary">
                        <p class="text-xs text-slate-400 mt-1">Lower numbers appear first.</p>
                    </div>

                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="hidden" name="published" value="0">
                        <input type="checkbox" name="published" value="1"
                               @checked(old('published', $report->published))
                               class="rounded border-slate-300 text-primary focus:ring-primary">
                        <span class="text-sm font-semibold text-slate-700">Published (visible on the site)</span>
                    </label>
                </div>

                <div class="flex flex-col gap-2">
                    <button type="submit"
                            class="w-full rounded-lg bg-primary text-white font-semibold py-2.5 hover:bg-primary/90 transition">
                        {{ $mode === 'create' ? 'Create report' : 'Save changes' }}
                    </button>
                    @if ($mode === 'edit')
                        <a href="{{ url('/' . $report->slug) }}" target="_blank"
                           class="w-full text-center rounded-lg border border-slate-300 text-slate-600 font-semibold py-2.5 hover:bg-slate-100 transition">
                            Preview ↗
                        </a>
                    @endif
                    <a href="{{ route('admin.reports.index') }}"
                       class="w-full text-center text-slate-400 hover:text-slate-600 text-sm py-1">Cancel</a>
                </div>
            </div>
        </div>
    </form>

    <script>
        (function () {
            const input    = document.getElementById('imageUpload');
            const status   = document.getElementById('uploadStatus');
            const textarea = document.getElementById('bodyField');

            input.addEventListener('change', async function () {
                const file = input.files[0];
                if (!file) return;

                status.textContent = 'Uploading…';
                status.className = 'text-xs text-slate-500';

                const data = new FormData();
                data.append('file', file);
                data.append('_token', '{{ csrf_token() }}');

                try {
                    const res = await fetch('{{ route('admin.media.store') }}', {
                        method: 'POST',
                        headers: { 'X-Requested-With': 'XMLHttpRequest' },
                        body: data,
                    });

                    if (!res.ok) {
                        const err = await res.json().catch(() => ({}));
                        throw new Error(err.message || ('Upload failed (' + res.status + ')'));
                    }

                    const json = await res.json();
                    insertAtCursor(textarea, '\n' + json.html + '\n');
                    status.textContent = '✓ Inserted ' + json.url;
                    status.className = 'text-xs text-green-600';
                    input.value = '';
                } catch (e) {
                    status.textContent = e.message;
                    status.className = 'text-xs text-red-600';
                }
            });

            function insertAtCursor(el, text) {
                const start = el.selectionStart ?? el.value.length;
                const end   = el.selectionEnd ?? el.value.length;
                el.value = el.value.slice(0, start) + text + el.value.slice(end);
                const pos = start + text.length;
                el.focus();
                el.setSelectionRange(pos, pos);
            }
        })();
    </script>
@endsection
