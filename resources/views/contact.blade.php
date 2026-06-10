@extends('layouts.master')

@section('title', "Contact Us — 16th Colombo Scout Group, S. Thomas' College")
@section('meta_description', "Get in touch with the 16th Colombo Scout Group at S. Thomas' College, Mount Lavinia. Find our address, contact numbers, email, and location map.")

@section('content')

    {{-- ═══════════════════════════════ PAGE-SPECIFIC STYLES ═══════════════════════════════ --}}
    <style>
        .ct-card {
            background: #fff;
            border: 1.5px solid rgba(0,10,30,0.08);
            border-radius: 18px;
            padding: 28px;
            box-shadow: 0 2px 16px rgba(0,10,30,0.05);
            transition: box-shadow 0.2s ease, transform 0.2s ease;
        }
        .ct-card:hover {
            box-shadow: 0 6px 24px rgba(0,10,30,0.1);
            transform: translateY(-2px);
        }
        .ct-icon-wrap {
            width: 44px; height: 44px;
            border-radius: 12px;
            background: rgba(0,10,30,0.05);
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .ct-icon-wrap .material-symbols-outlined { font-size: 20px; color: #000a1e; }
        .ct-label { font-size: 11px; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; color: #8a9bab; margin-bottom: 3px; }
        .ct-value { font-size: 14px; font-weight: 600; color: #000a1e; }
        .ct-value a { color: #000a1e; text-decoration: none; }
        .ct-value a:hover { text-decoration: underline; }

        @keyframes ctFadeUp {
            from { opacity: 0; transform: translateY(14px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .ct-animate { animation: ctFadeUp 0.4s ease both; }
        .ct-animate:nth-child(1) { animation-delay: 0.05s; }
        .ct-animate:nth-child(2) { animation-delay: 0.10s; }
        .ct-animate:nth-child(3) { animation-delay: 0.15s; }
        .ct-animate:nth-child(4) { animation-delay: 0.20s; }
        .ct-animate:nth-child(5) { animation-delay: 0.25s; }
        .ct-animate:nth-child(6) { animation-delay: 0.30s; }
    </style>

    {{-- ═══════════════════════════════ HERO ═══════════════════════════════════════════════ --}}
    <div class="relative bg-primary overflow-hidden">
        <div class="absolute inset-0 opacity-[0.05]" style="background-image:radial-gradient(circle,rgba(255,255,255,0.9) 1px,transparent 1px);background-size:28px 28px;"></div>
        <div class="absolute bottom-0 inset-x-0 h-20 bg-gradient-to-t from-primary/90 to-transparent pointer-events-none"></div>

        <div class="relative max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop pt-10 pb-12 md:pt-14 md:pb-16">
            <nav aria-label="Breadcrumb" class="flex items-center gap-1.5 text-xs text-white/45 mb-7">
                <a href="{{ url('/') }}" class="hover:text-white/70 transition-colors">Home</a>
                <span class="material-symbols-outlined text-[11px] leading-none translate-y-px">chevron_right</span>
                <span class="text-white/80 font-medium">Contact Us</span>
            </nav>

            <div class="flex items-end gap-8">
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-0.5 h-9 bg-white/40 rounded-full"></div>
                        <span class="text-white/50 text-xs font-semibold tracking-[0.18em] uppercase">16th Colombo Scout Group · S. Thomas' College</span>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-extrabold text-white leading-[1.05] tracking-tight">Contact Us</h1>
                    <p class="mt-3 text-white/55 text-sm md:text-base max-w-lg leading-relaxed">
                        Reach out to the troop through any of the channels below.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- ═══════════════════════════════ CONTENT ═══════════════════════════════════════════ --}}
    <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-10 md:py-14">

        {{-- Contact cards grid --}}
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">

            {{-- Address --}}
            <div class="ct-card ct-animate flex items-start gap-4">
                <div class="ct-icon-wrap"><span class="material-symbols-outlined">location_on</span></div>
                <div>
                    <div class="ct-label">Address</div>
                    <div class="ct-value">S. Thomas' College<br>Mount Lavinia, Sri Lanka</div>
                </div>
            </div>

            {{-- Scout Master --}}
            <div class="ct-card ct-animate flex items-start gap-4">
                <div class="ct-icon-wrap"><span class="material-symbols-outlined">military_tech</span></div>
                <div>
                    <div class="ct-label">Scout Master</div>
                    <div class="ct-value">Mr. Dilanka Dayananda</div>
                    <div class="ct-value mt-0.5"><a href="tel:0701944131">070 194 4131</a></div>
                </div>
            </div>

            {{-- Group Scout Administrator --}}
            <div class="ct-card ct-animate flex items-start gap-4">
                <div class="ct-icon-wrap"><span class="material-symbols-outlined">manage_accounts</span></div>
                <div>
                    <div class="ct-label">Group Scout Administrator</div>
                    <div class="ct-value">Mrs. Wathsala Wijewickrema</div>
                    <div class="ct-value mt-0.5"><a href="tel:0772930805">077 293 0805</a></div>
                </div>
            </div>

            {{-- Troop Leader --}}
            <div class="ct-card ct-animate flex items-start gap-4">
                <div class="ct-icon-wrap"><span class="material-symbols-outlined">shield_person</span></div>
                <div>
                    <div class="ct-label">Troop Leader</div>
                    <div class="ct-value">S.T. Kulatilaka</div>
                </div>
            </div>

            {{-- Email --}}
            <div class="ct-card ct-animate flex items-start gap-4">
                <div class="ct-icon-wrap"><span class="material-symbols-outlined">mail</span></div>
                <div>
                    <div class="ct-label">Troop E-Mail</div>
                    <div class="ct-value"><a href="mailto:stcscouts@gmail.com">stcscouts@gmail.com</a></div>
                </div>
            </div>

            {{-- Social --}}
            <div class="ct-card ct-animate flex items-start gap-4">
                <div class="ct-icon-wrap"><span class="material-symbols-outlined">share</span></div>
                <div>
                    <div class="ct-label">Social Media</div>
                    <div class="ct-value">
                        <a href="https://www.facebook.com/stcscouts" target="_blank" class="flex items-center gap-1.5 mb-1">
                            <i class="fab fa-facebook-f text-xs"></i> Thomian Scout Troop
                        </a>
                        <a href="https://www.instagram.com/stcscouts/" target="_blank" class="flex items-center gap-1.5 mb-1">
                            <i class="fab fa-instagram text-xs"></i> @stcscouts
                        </a>
                        <a href="https://www.youtube.com/stcscouts" target="_blank" class="flex items-center gap-1.5">
                            <i class="fab fa-youtube text-xs"></i> stcscouts
                        </a>
                    </div>
                </div>
            </div>

        </div>

        {{-- Map --}}
        <div class="ct-animate rounded-2xl overflow-hidden border border-outline-variant/40 shadow-sm" style="height:420px;">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3688.061940898536!2d79.865034!3d6.837401!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25b185cb65ba3%3A0x359e4cab22d61c21!2sS.%20Thomas&#39;%20College!5e1!3m2!1sen!2slk!4v1690163091413!5m2!1sen!2slk"
                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade" title="S. Thomas' College, Mount Lavinia map">
            </iframe>
        </div>

    </div>

@endsection
