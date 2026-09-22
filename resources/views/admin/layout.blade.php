<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('admin_title', 'Admin') · STCSCOUTS Admin</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <script>
        tailwind.config = {
            theme: { extend: {
                colors: {
                    primary: "#000a1e",
                    accent:  "#0e4194",
                },
                fontFamily: { sans: ["Plus Jakarta Sans", "sans-serif"] },
                maxWidth: { container: "1200px" },
            }}
        }
    </script>
    <style>
        * { font-family: "Plus Jakarta Sans", sans-serif; }

        /* Sidebar nav links */
        .snav-link {
            display: flex; align-items: center; gap: 10px;
            padding: 8px 12px; border-radius: 9px;
            font-size: 13.5px; font-weight: 600;
            color: rgba(255,255,255,0.55);
            transition: background 0.15s, color 0.15s;
            text-decoration: none; cursor: pointer;
            width: 100%; text-align: left; background: none; border: none;
        }
        .snav-link:hover { background: rgba(255,255,255,0.09); color: rgba(255,255,255,0.9); text-decoration: none; }
        .snav-link.active { background: rgba(255,255,255,0.15); color: #ffffff; }
        .snav-link.active .snav-icon { color: #aec7f6; }

        .snav-sub {
            display: flex; align-items: center; gap: 8px;
            padding: 5px 12px 5px 42px; border-radius: 7px;
            font-size: 12px; font-weight: 600;
            color: rgba(255,255,255,0.4);
            transition: color 0.15s, background 0.15s;
            text-decoration: none;
        }
        .snav-sub:hover { color: rgba(255,255,255,0.75); background: rgba(255,255,255,0.05); text-decoration: none; }
        .snav-sub.active { color: rgba(255,255,255,0.85); }

        .snav-icon { font-size: 18px; transition: color 0.15s; flex-shrink: 0; }
        .snav-divider { height: 1px; background: rgba(255,255,255,0.08); margin: 10px 0; }
        .snav-label { font-size: 10px; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; color: rgba(255,255,255,0.28); padding: 6px 12px 4px; }

        /* Scroll */
        #admin-sidebar::-webkit-scrollbar { width: 3px; }
        #admin-sidebar::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.15); border-radius: 99px; }
    </style>
</head>
<body class="bg-slate-100 text-slate-800 antialiased">

@php
    $inReports = request()->routeIs('admin.reports.*');
    $inEvents  = request()->routeIs('admin.events.*');
    $inMedia   = request()->routeIs('admin.media.*');
    $inGuide   = request()->routeIs('admin.guide');
@endphp

{{-- Mobile backdrop --}}
<div id="sb-backdrop"
     class="fixed inset-0 bg-black/40 backdrop-blur-sm z-40 hidden lg:hidden"
     onclick="toggleSidebar()"></div>

<div class="flex h-screen overflow-hidden">

    {{-- ── Sidebar ─────────────────────────────────────────────────── --}}
    <aside id="admin-sidebar"
           class="fixed lg:static inset-y-0 left-0 z-50 w-56 bg-primary flex flex-col
                  -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out
                  overflow-y-auto shrink-0">

        {{-- Brand --}}
        <div class="px-4 pt-5 pb-4 border-b border-white/10 shrink-0">
            <a href="{{ route('admin.reports.index') }}" class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl bg-white/10 flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-[18px] text-white" style="font-variation-settings:'FILL' 1;">shield</span>
                </div>
                <div>
                    <div class="text-white font-extrabold text-sm leading-none tracking-tight">STC Scouts</div>
                    <div class="text-white/35 text-[11px] font-medium mt-0.5">Admin Panel</div>
                </div>
            </a>
        </div>

        {{-- Nav --}}
        <nav class="flex-1 py-4 px-3 flex flex-col gap-0.5">

            <p class="snav-label">Content</p>

            {{-- Reports --}}
            <a href="{{ route('admin.reports.index') }}"
               class="snav-link {{ $inReports ? 'active' : '' }}">
                <span class="material-symbols-outlined snav-icon" style="{{ $inReports ? 'font-variation-settings:\'FILL\' 1;' : '' }}">article</span>
                Reports
            </a>
            @if ($inReports)
                <a href="{{ route('admin.reports.index') }}" class="snav-sub {{ request()->routeIs('admin.reports.index') ? 'active' : '' }}">
                    All reports
                </a>
                <a href="{{ route('admin.reports.create') }}" class="snav-sub {{ request()->routeIs('admin.reports.create') ? 'active' : '' }}">
                    + New report
                </a>
            @endif

            {{-- Events --}}
            <a href="{{ route('admin.events.index') }}"
               class="snav-link {{ $inEvents ? 'active' : '' }}">
                <span class="material-symbols-outlined snav-icon" style="{{ $inEvents ? 'font-variation-settings:\'FILL\' 1;' : '' }}">event</span>
                Events
            </a>
            @if ($inEvents)
                <a href="{{ route('admin.events.index') }}" class="snav-sub {{ request()->routeIs('admin.events.index') ? 'active' : '' }}">
                    All events
                </a>
                <a href="{{ route('admin.events.create') }}" class="snav-sub {{ request()->routeIs('admin.events.create') ? 'active' : '' }}">
                    + New event
                </a>
            @endif

            {{-- Media --}}
            <a href="{{ route('admin.media.index') }}"
               class="snav-link {{ $inMedia ? 'active' : '' }}">
                <span class="material-symbols-outlined snav-icon" style="{{ $inMedia ? 'font-variation-settings:\'FILL\' 1;' : '' }}">perm_media</span>
                Media Library
            </a>

            <div class="snav-divider"></div>
            <p class="snav-label">Help</p>

            {{-- Guide --}}
            <a href="{{ route('admin.guide') }}"
               class="snav-link {{ $inGuide ? 'active' : '' }}">
                <span class="material-symbols-outlined snav-icon" style="{{ $inGuide ? 'font-variation-settings:\'FILL\' 1;' : '' }}">menu_book</span>
                Admin Guide
            </a>

        </nav>

        {{-- Bottom actions --}}
        <div class="shrink-0 px-3 pb-4 pt-2 border-t border-white/10 flex flex-col gap-0.5">
            <a href="{{ url('/') }}" target="_blank" class="snav-link">
                <span class="material-symbols-outlined snav-icon">open_in_new</span>
                View site
            </a>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="snav-link">
                    <span class="material-symbols-outlined snav-icon">logout</span>
                    Log out
                </button>
            </form>
        </div>
    </aside>

    {{-- ── Main area ────────────────────────────────────────────────── --}}
    <div class="flex-1 flex flex-col min-w-0 overflow-hidden">

        {{-- Mobile top bar --}}
        <div class="lg:hidden shrink-0 h-14 bg-primary flex items-center gap-3 px-4">
            <button onclick="toggleSidebar()" class="text-white p-1 hover:bg-white/10 rounded-lg transition">
                <span class="material-symbols-outlined">menu</span>
            </button>
            <span class="text-white font-bold text-sm">@yield('admin_title', 'Admin')</span>
        </div>

        {{-- Content scroll area --}}
        <main class="flex-1 overflow-y-auto bg-slate-100">
            <div class="max-w-5xl mx-auto px-5 py-7">

                {{-- Flash / error alerts --}}
                @if (session('status'))
                    <div class="mb-5 rounded-xl bg-green-50 border border-green-200 text-green-800 px-4 py-3 text-sm flex items-center gap-2.5">
                        <span class="material-symbols-outlined text-[18px] text-green-600" style="font-variation-settings:'FILL' 1;">check_circle</span>
                        {{ session('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-5 rounded-xl bg-red-50 border border-red-200 text-red-800 px-4 py-3 text-sm">
                        <div class="flex items-center gap-2 font-semibold mb-1">
                            <span class="material-symbols-outlined text-[16px]">error</span>
                            Please fix the following:
                        </div>
                        <ul class="list-disc list-inside space-y-0.5 pl-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>
</div>

<script>
    function toggleSidebar() {
        const sb  = document.getElementById('admin-sidebar');
        const bd  = document.getElementById('sb-backdrop');
        const open = !sb.classList.contains('-translate-x-full');
        sb.classList.toggle('-translate-x-full', open);
        bd.classList.toggle('hidden', open);
    }
</script>

</body>
</html>
