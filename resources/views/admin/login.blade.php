<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>Log in · STCSCOUTS Admin</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <script>
        tailwind.config = {
            theme: { extend: {
                colors: { primary: "#000a1e", accent: "#0e4194" },
                fontFamily: { sans: ["Plus Jakarta Sans", "sans-serif"] },
            }}
        }
    </script>
    <style>* { font-family: "Plus Jakarta Sans", sans-serif; }</style>
</head>
<body class="min-h-screen bg-slate-100 flex items-center justify-center px-4">

    <div class="w-full max-w-sm">

        {{-- Brand mark --}}
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-primary shadow-xl shadow-primary/30 mb-5">
                <span class="material-symbols-outlined text-white text-[30px]" style="font-variation-settings:'FILL' 1;">shield</span>
            </div>
            <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">Admin Panel</h1>
            <p class="text-sm text-slate-500 mt-1.5">16th Colombo Scout Group · STCSCOUTS</p>
        </div>

        {{-- Card --}}
        <div class="bg-white rounded-2xl shadow-sm shadow-slate-200 border border-slate-200/80 p-6 space-y-5">

            @if (session('error'))
                <div class="rounded-xl bg-red-50 border border-red-200 px-4 py-3 text-sm text-red-700 flex items-center gap-2">
                    <span class="material-symbols-outlined text-[16px] shrink-0" style="font-variation-settings:'FILL' 1;">error</span>
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login.attempt') }}" class="space-y-4">
                @csrf

                <div>
                    <label for="password" class="block text-sm font-semibold text-slate-700 mb-1.5">
                        Password
                    </label>
                    <input type="password" name="password" id="password"
                           autofocus required autocomplete="current-password"
                           placeholder="Enter your admin password"
                           class="w-full rounded-xl border-slate-300 focus:border-primary focus:ring-primary text-sm">

                    @error('password')
                        <p class="mt-1.5 text-xs text-red-600 flex items-center gap-1">
                            <span class="material-symbols-outlined text-[13px]">error</span>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <button type="submit"
                        class="w-full rounded-xl bg-primary text-white font-bold py-2.5 text-sm
                               hover:bg-primary/90 active:scale-[0.98] transition-all duration-150
                               shadow-md shadow-primary/20">
                    Log in
                </button>
            </form>
        </div>

        <p class="text-center text-xs text-slate-400 mt-5">
            <a href="{{ url('/') }}" class="hover:text-slate-600 transition">← Back to public site</a>
        </p>
    </div>

</body>
</html>
