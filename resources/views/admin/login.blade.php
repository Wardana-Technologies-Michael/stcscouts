<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>Log in · Report Admin · STCSCOUTS</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <script>
        tailwind.config = { theme: { extend: {
            colors: { primary: "#000a1e" },
            fontFamily: { sans: ["Plus Jakarta Sans", "sans-serif"] },
        } } }
    </script>
    <style>body { font-family: "Plus Jakarta Sans", sans-serif; }</style>
</head>
<body class="bg-slate-100 text-slate-800 antialiased min-h-screen flex items-center justify-center px-4">

    <div class="w-full max-w-sm">
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-primary text-white mb-4">
                <span class="material-symbols-outlined text-[28px]">lock</span>
            </div>
            <h1 class="text-2xl font-extrabold text-primary">Report Admin</h1>
            <p class="text-sm text-slate-500 mt-1">Enter the password to manage troop reports.</p>
        </div>

        <form method="POST" action="{{ route('admin.login.attempt') }}"
              class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 space-y-4">
            @csrf

            <div>
                <label for="password" class="block text-sm font-semibold text-slate-700 mb-1.5">Password</label>
                <input type="password" name="password" id="password" autofocus required
                       class="w-full rounded-lg border-slate-300 focus:border-primary focus:ring-primary"
                       placeholder="••••••••">
            </div>

            @error('password')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror

            <button type="submit"
                    class="w-full rounded-lg bg-primary text-white font-semibold py-2.5 hover:bg-primary/90 transition">
                Log in
            </button>
        </form>

        <p class="text-center text-xs text-slate-400 mt-6">
            <a href="{{ url('/') }}" class="hover:text-slate-600">← Back to site</a>
        </p>
    </div>

</body>
</html>
