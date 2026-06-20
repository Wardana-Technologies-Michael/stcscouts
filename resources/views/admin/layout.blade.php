<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('admin_title', 'Admin') · STCSCOUTS</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <script>
        tailwind.config = {
            theme: { extend: {
                colors: { primary: "#000a1e", accent: "#0e4194" },
                fontFamily: { sans: ["Plus Jakarta Sans", "sans-serif"] },
            } }
        }
    </script>
    <style>body { font-family: "Plus Jakarta Sans", sans-serif; }</style>
</head>
<body class="bg-slate-100 text-slate-800 antialiased min-h-screen">

        <header class="bg-primary text-white sticky top-0 z-30 shadow">
            <div class="max-w-6xl mx-auto px-4 h-16 flex items-center justify-between">
                <a href="{{ route('admin.reports.index') }}" class="flex items-center gap-2 font-extrabold tracking-tight">
                    <span class="material-symbols-outlined">shield</span>
                    Report Admin
                </a>
                <nav class="flex items-center gap-1 text-sm">
                    <a href="{{ route('admin.reports.index') }}"
                       class="px-3 py-2 rounded-lg hover:bg-white/10 transition">All reports</a>
                    <a href="{{ route('admin.reports.create') }}"
                       class="px-3 py-2 rounded-lg hover:bg-white/10 transition">+ New</a>
                    <a href="{{ url('/recent-year-reports') }}" target="_blank"
                       class="px-3 py-2 rounded-lg hover:bg-white/10 transition">View site ↗</a>
                    <form method="POST" action="{{ route('admin.logout') }}" class="ml-1">
                        @csrf
                        <button type="submit"
                                class="px-3 py-2 rounded-lg bg-white/10 hover:bg-white/20 transition">Log out</button>
                    </form>
                </nav>
            </div>
        </header>

        <main class="max-w-6xl mx-auto px-4 py-8">
            @if (session('status'))
                <div class="mb-6 rounded-lg bg-green-50 border border-green-200 text-green-800 px-4 py-3 text-sm flex items-center gap-2">
                    <span class="material-symbols-outlined text-[18px]">check_circle</span>
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-6 rounded-lg bg-red-50 border border-red-200 text-red-800 px-4 py-3 text-sm">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>

</body>
</html>
