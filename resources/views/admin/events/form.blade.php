@extends('admin.layout')

@section('admin_title', $mode === 'create' ? 'New event' : 'Edit event')

@section('content')
    @php
        $action = $mode === 'create'
            ? route('admin.events.store')
            : route('admin.events.update', $event);
    @endphp

    <div class="flex items-center gap-2 text-sm text-slate-400 mb-4">
        <a href="{{ route('admin.events.index') }}" class="hover:text-slate-600">All events</a>
        <span class="material-symbols-outlined text-[16px]">chevron_right</span>
        <span class="text-slate-600 font-medium">{{ $mode === 'create' ? 'New event' : 'Edit' }}</span>
    </div>

    <form method="POST" action="{{ $action }}" enctype="multipart/form-data" class="space-y-6">
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
                               value="{{ old('title', $event->title) }}"
                               placeholder="e.g. Kindling Legacy Camp 2026"
                               class="w-full rounded-lg border-slate-300 focus:border-primary focus:ring-primary">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Subtitle</label>
                        <input type="text" name="subtitle"
                               value="{{ old('subtitle', $event->subtitle) }}"
                               placeholder="Short tagline or event type"
                               class="w-full rounded-lg border-slate-300 focus:border-primary focus:ring-primary">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Body (HTML)</label>

                        {{-- Image upload helper --}}
                        <div class="flex items-center gap-3 mb-2 p-3 rounded-lg bg-slate-50 border border-slate-200">
                            <input type="file" id="imageUpload" accept="image/*"
                                   class="text-xs text-slate-600 file:mr-3 file:rounded-md file:border-0 file:bg-primary file:text-white file:px-3 file:py-1.5 file:font-semibold file:cursor-pointer">
                            <span id="uploadStatus" class="text-xs text-slate-500"></span>
                            <a href="{{ route('admin.media.index') }}" target="_blank"
                               class="ml-auto flex-shrink-0 inline-flex items-center gap-1 text-xs text-accent font-semibold hover:underline">
                                <span class="material-symbols-outlined text-[14px]">perm_media</span>
                                Media library ↗
                            </a>
                        </div>
                        <p class="text-xs text-slate-400 mb-2">
                            Upload an image to insert it at the cursor. For video, paste a YouTube/Vimeo
                            <code class="bg-slate-100 px-1 rounded">&lt;iframe&gt;</code> embed.
                            Use the media library to upload PDFs or other assets.
                        </p>

                        <textarea name="body" id="bodyField" rows="20"
                                  class="w-full rounded-lg border-slate-300 focus:border-primary focus:ring-primary font-mono text-sm leading-relaxed"
                                  placeholder="<p>Write or paste HTML here…</p>">{{ old('body', $event->body) }}</textarea>
                    </div>
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="space-y-6">
                <div class="bg-white rounded-2xl border border-slate-200 p-6 space-y-5">

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Start date</label>
                        <input type="date" name="event_date"
                               value="{{ old('event_date', $event->event_date?->format('Y-m-d')) }}"
                               class="w-full rounded-lg border-slate-300 focus:border-primary focus:ring-primary">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">End date</label>
                        <input type="date" name="end_date"
                               value="{{ old('end_date', $event->end_date?->format('Y-m-d')) }}"
                               class="w-full rounded-lg border-slate-300 focus:border-primary focus:ring-primary">
                        <p class="text-xs text-slate-400 mt-1">Leave blank for a single-day event.</p>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Location</label>
                        <input type="text" name="location"
                               value="{{ old('location', $event->location) }}"
                               placeholder="e.g. S. Thomas' College, Mount Lavinia"
                               class="w-full rounded-lg border-slate-300 focus:border-primary focus:ring-primary">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Banner image</label>

                        @if ($event->banner_path)
                            <div class="mb-2 rounded-lg overflow-hidden border border-slate-200">
                                <img src="{{ $event->banner_url }}" alt="Current banner"
                                     class="w-full h-32 object-cover">
                            </div>
                            <label class="flex items-center gap-2 mb-2 cursor-pointer">
                                <input type="checkbox" name="remove_banner" value="1"
                                       class="rounded border-slate-300 text-red-500 focus:ring-red-500">
                                <span class="text-xs font-medium text-red-600">Remove current banner</span>
                            </label>
                        @endif

                        <input type="file" name="banner" accept="image/*"
                               class="w-full text-xs text-slate-600 file:mr-3 file:rounded-md file:border-0 file:bg-primary file:text-white file:px-3 file:py-1.5 file:font-semibold file:cursor-pointer">
                        <p class="text-xs text-slate-400 mt-1">
                            JPG, PNG, GIF or WebP, up to 8&nbsp;MB.
                            {{ $event->banner_path ? 'Uploading a new image replaces the current one.' : '' }}
                        </p>
                        @error('banner')
                            <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">URL slug</label>
                        <div class="flex items-center rounded-lg border border-slate-300 focus-within:border-primary focus-within:ring-1 focus-within:ring-primary overflow-hidden">
                            <span class="px-2.5 text-slate-400 text-sm bg-slate-50 self-stretch flex items-center">/events/</span>
                            <input type="text" name="slug"
                                   value="{{ old('slug', $event->slug) }}"
                                   placeholder="auto-generated from title"
                                   class="flex-1 border-0 focus:ring-0 text-sm font-mono">
                        </div>
                        <p class="text-xs text-slate-400 mt-1">Leave blank to auto-generate. Changing this breaks old links.</p>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Sort order</label>
                        <input type="number" name="sort_order"
                               value="{{ old('sort_order', $event->sort_order) }}"
                               class="w-full rounded-lg border-slate-300 focus:border-primary focus:ring-primary">
                        <p class="text-xs text-slate-400 mt-1">Lower numbers appear first in the events list.</p>
                    </div>

                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="hidden" name="published" value="0">
                        <input type="checkbox" name="published" value="1"
                               @checked(old('published', $event->published))
                               class="rounded border-slate-300 text-primary focus:ring-primary">
                        <span class="text-sm font-semibold text-slate-700">Published (visible on the site)</span>
                    </label>
                </div>

                <div class="flex flex-col gap-2">
                    <button type="submit"
                            class="w-full rounded-lg bg-primary text-white font-semibold py-2.5 hover:bg-primary/90 transition">
                        {{ $mode === 'create' ? 'Create event' : 'Save changes' }}
                    </button>
                    @if ($mode === 'edit')
                        <a href="{{ url('/events/' . $event->slug) }}" target="_blank"
                           class="w-full text-center rounded-lg border border-slate-300 text-slate-600 font-semibold py-2.5 hover:bg-slate-100 transition">
                            Preview ↗
                        </a>
                    @endif
                    <a href="{{ route('admin.events.index') }}"
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
