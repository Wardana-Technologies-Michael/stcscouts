@extends('admin.layout')

@section('admin_title', 'Media Library')

@section('content')

    {{-- Header + breadcrumb --}}
    <div class="flex items-start justify-between mb-6 gap-4 flex-wrap">
        <div>
            <div class="flex items-center gap-2 text-sm text-slate-400 mb-1">
                <a href="{{ route('admin.media.index') }}" class="hover:text-slate-600">Media Library</a>
                @foreach ($breadcrumb as $crumb)
                    <span class="material-symbols-outlined text-[15px]">chevron_right</span>
                    @if (!$loop->last)
                        <a href="{{ route('admin.media.index', ['folder' => $crumb['path']]) }}"
                           class="hover:text-slate-600">{{ $crumb['label'] }}</a>
                    @else
                        <span class="text-slate-700 font-semibold">{{ $crumb['label'] }}</span>
                    @endif
                @endforeach
            </div>
            <h1 class="text-xl font-bold text-slate-800">
                {{ $folder ? basename($folder) : 'All Assets' }}
            </h1>
            <p class="text-sm text-slate-400 mt-0.5">
                {{ $subfolders->count() }} {{ Str::plural('folder', $subfolders->count()) }} ·
                {{ $files->count() }} {{ Str::plural('file', $files->count()) }}
            </p>
        </div>

        {{-- Create folder --}}
        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open"
                    class="inline-flex items-center gap-1.5 rounded-lg border border-slate-300 text-slate-600 font-semibold px-4 py-2.5 text-sm hover:bg-slate-50 transition">
                <span class="material-symbols-outlined text-[16px]">create_new_folder</span>
                New folder
            </button>
            <div x-show="open" x-cloak @click.outside="open = false"
                 class="absolute right-0 top-full mt-2 w-72 bg-white rounded-xl border border-slate-200 shadow-xl p-4 z-50">
                <form method="POST" action="{{ route('admin.media.folder') }}">
                    @csrf
                    <input type="hidden" name="folder" value="{{ $folder }}">
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">Folder name</label>
                    <input type="text" name="name" required autofocus
                           pattern="[a-zA-Z0-9_\-]+" title="Letters, numbers, hyphens and underscores only"
                           placeholder="e.g. events or kindling-legacy"
                           class="w-full rounded-lg border-slate-300 focus:border-primary focus:ring-primary text-sm mb-3">
                    <p class="text-[11px] text-slate-400 mb-3">Letters, numbers, hyphens and underscores only.</p>
                    <div class="flex gap-2">
                        <button type="submit"
                                class="flex-1 rounded-lg bg-primary text-white font-semibold py-2 text-sm hover:bg-primary/90 transition">
                            Create
                        </button>
                        <button type="button" @click="open = false"
                                class="rounded-lg border border-slate-200 text-slate-500 font-semibold px-3 py-2 text-sm hover:bg-slate-50 transition">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Upload form --}}
    <div class="bg-white rounded-2xl border border-slate-200 p-5 mb-6">
        <form method="POST" action="{{ route('admin.media.upload') }}" enctype="multipart/form-data"
              class="flex items-center gap-3 flex-wrap">
            @csrf
            <input type="hidden" name="folder" value="{{ $folder }}">
            <input type="file" name="file" required
                   accept=".jpg,.jpeg,.png,.gif,.webp,.svg,.pdf,.doc,.docx"
                   class="text-sm text-slate-600 file:mr-3 file:rounded-lg file:border-0 file:bg-primary file:text-white file:px-4 file:py-2 file:font-semibold file:cursor-pointer">
            <button type="submit"
                    class="rounded-lg bg-primary text-white font-semibold px-4 py-2 text-sm hover:bg-primary/90 transition">
                Upload here
            </button>
            <span class="text-xs text-slate-400">Images, PDFs, Word docs · up to 16&nbsp;MB</span>
        </form>
    </div>

    {{-- Suggested starter folders (only shown at root when no folders exist yet) --}}
    @if (!$folder && $subfolders->isEmpty() && $files->isEmpty())
        <div class="bg-blue-50 border border-blue-100 rounded-2xl p-6 mb-6">
            <p class="text-sm font-semibold text-blue-800 mb-3">No folders yet — create one to get started</p>
            <p class="text-xs text-blue-600 mb-4">Suggested structure for this project:</p>
            <div class="flex flex-wrap gap-2">
                @foreach ([
                    ['events',  'Event photos & documents'],
                    ['reports', 'Year report assets'],
                    ['docs',    'PDFs and forms'],
                    ['photos',  'General photography'],
                    ['banners', 'Banner images'],
                ] as [$name, $desc])
                    <form method="POST" action="{{ route('admin.media.folder') }}">
                        @csrf
                        <input type="hidden" name="name" value="{{ $name }}">
                        <input type="hidden" name="folder" value="">
                        <button type="submit"
                                class="inline-flex items-center gap-1.5 rounded-lg border border-blue-200 bg-white text-blue-700 font-semibold text-sm px-3 py-1.5 hover:bg-blue-50 transition"
                                title="{{ $desc }}">
                            <span class="material-symbols-outlined text-[15px]">folder</span>
                            {{ $name }}/
                        </button>
                    </form>
                @endforeach
            </div>
        </div>
    @endif

    {{-- Subfolder grid --}}
    @if ($subfolders->isNotEmpty())
        <div class="mb-6">
            <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-3">Folders</p>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-3">
                @foreach ($subfolders as $sub)
                    <div class="group relative bg-white rounded-xl border border-slate-200 hover:border-slate-300 transition overflow-hidden">
                        <a href="{{ route('admin.media.index', ['folder' => $sub['path']]) }}"
                           class="flex flex-col items-center gap-2 py-5 px-3 text-center">
                            <span class="material-symbols-outlined text-4xl text-amber-400 group-hover:text-amber-500 transition"
                                  style="font-variation-settings:'FILL' 1;">folder</span>
                            <span class="text-xs font-semibold text-slate-700 truncate w-full text-center">{{ $sub['name'] }}</span>
                            <span class="text-[10px] text-slate-400">{{ $sub['count'] }} {{ Str::plural('file', $sub['count']) }}</span>
                        </a>

                        {{-- Delete folder button --}}
                        <form method="POST"
                              action="{{ route('admin.media.folder.destroy') }}"
                              onsubmit="return confirm('Delete folder \'{{ $sub['name'] }}\' and ALL its contents? This cannot be undone.')"
                              class="absolute top-1.5 right-1.5 opacity-0 group-hover:opacity-100 transition">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="folder" value="{{ $sub['path'] }}">
                            <button type="submit"
                                    class="w-6 h-6 rounded-md bg-red-50 hover:bg-red-100 text-red-400 hover:text-red-600 flex items-center justify-center transition"
                                    title="Delete folder">
                                <span class="material-symbols-outlined text-[14px]">delete</span>
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    {{-- File grid --}}
    @if ($files->isNotEmpty())
        <div>
            <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-3">Files</p>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-3">
                @foreach ($files as $file)
                    <div class="bg-white rounded-xl border border-slate-200 overflow-hidden group flex flex-col">

                        {{-- Preview --}}
                        <div class="h-28 bg-slate-50 flex items-center justify-center overflow-hidden">
                            @if ($file['is_image'])
                                <img src="{{ $file['url'] }}" alt="{{ $file['name'] }}"
                                     class="w-full h-full object-cover">
                            @elseif ($file['is_pdf'])
                                <span class="material-symbols-outlined text-5xl text-red-400"
                                      style="font-variation-settings:'FILL' 1;">picture_as_pdf</span>
                            @else
                                <span class="material-symbols-outlined text-5xl text-slate-300"
                                      style="font-variation-settings:'FILL' 1;">description</span>
                            @endif
                        </div>

                        {{-- Meta + actions --}}
                        <div class="p-2.5 flex flex-col gap-1.5 flex-1">
                            <p class="text-xs font-medium text-slate-700 truncate leading-snug" title="{{ $file['name'] }}">
                                {{ $file['name'] }}
                            </p>
                            <p class="text-[10px] text-slate-400">
                                {{ number_format($file['size'] / 1024, 1) }}&nbsp;KB
                                · <span class="uppercase">{{ $file['ext'] }}</span>
                            </p>

                            <button type="button"
                                    onclick="copyUrl('{{ $file['url'] }}', this)"
                                    class="mt-auto w-full rounded-md border border-slate-200 text-[11px] font-semibold text-slate-600 py-1.5 hover:bg-slate-50 transition flex items-center justify-center gap-1">
                                <span class="material-symbols-outlined text-[13px]">content_copy</span>
                                Copy URL
                            </button>

                            <form method="POST" action="{{ route('admin.media.destroy') }}"
                                  onsubmit="return confirm('Delete {{ $file['name'] }}?')">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="path" value="{{ $file['path'] }}">
                                <button type="submit"
                                        class="w-full rounded-md border border-red-100 text-[11px] font-semibold text-red-500 py-1.5 hover:bg-red-50 transition flex items-center justify-center gap-1">
                                    <span class="material-symbols-outlined text-[13px]">delete</span>
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    {{-- Empty state for folders with no content --}}
    @if ($subfolders->isEmpty() && $files->isEmpty() && $folder)
        <div class="bg-white rounded-2xl border border-slate-200 p-12 text-center text-slate-400">
            <span class="material-symbols-outlined text-5xl mb-3 block" style="font-variation-settings:'FILL' 1;">folder_open</span>
            This folder is empty. Upload a file above.
        </div>
    @endif

    <script>
        // Alpine.js for the "New folder" popover (loaded via CDN if not already available)
        if (typeof Alpine === 'undefined') {
            const s = document.createElement('script');
            s.src = 'https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js';
            s.defer = true;
            document.head.appendChild(s);
        }

        function copyUrl(url, btn) {
            const fullUrl = window.location.origin + url;
            navigator.clipboard.writeText(fullUrl).then(() => {
                const original = btn.innerHTML;
                btn.innerHTML = '<span class="material-symbols-outlined text-[13px]">check</span> Copied!';
                btn.classList.add('text-green-600', 'border-green-200');
                setTimeout(() => {
                    btn.innerHTML = original;
                    btn.classList.remove('text-green-600', 'border-green-200');
                }, 2000);
            });
        }
    </script>
@endsection
