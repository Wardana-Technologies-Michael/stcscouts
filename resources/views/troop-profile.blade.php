@extends('layouts.master')

@section('title', "Present Troop Profile — 16th Colombo Scout Group, S. Thomas' College")
@section('meta_description', "The official active roster for the 16th Colombo Scout Group at S. Thomas' College, Mount Lavinia. View our current officials, senior scouts, and junior patrol divisions.")

@section('content')

    {{-- ═══════════════════════════════ PAGE-SPECIFIC STYLES ═══════════════════════════════ --}}
    <style>
        /* ── Cards & UI Blocks ────────────────────────────────────── */
        .tp-card {
            background: #fff;
            border: 1.5px solid rgba(0,10,30,0.08);
            border-radius: 18px;
            padding: 32px 28px;
            box-shadow: 0 2px 16px rgba(0,10,30,0.05);
        }

        .tp-section-title {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: #50606f;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1.5px solid rgba(0,10,30,0.08);
        }

        /* ── Officials List ───────────────────────────────────────── */
        .tp-officials-row {
            display: flex;
            align-items: baseline;
            justify-content: space-between;
            padding: 9px 12px;
            border-radius: 9px;
            transition: background 0.15s ease;
            gap: 12px;
        }
        .tp-officials-row:hover { background: rgba(0,10,30,0.03); }
        .tp-officials-role {
            font-size: 13px;
            font-weight: 600;
            color: #000a1e;
            white-space: nowrap;
        }
        .tp-officials-dots {
            flex: 1;
            border-bottom: 1.5px dotted rgba(0,10,30,0.15);
            margin: 0 8px 3px;
        }
        .tp-officials-name {
            font-size: 13px;
            color: #50606f;
            font-weight: 500;
            white-space: nowrap;
        }

        /* ── Senior Roster Pills ──────────────────────────────────── */
        .tp-seniors-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            gap: 8px;
        }
        .tp-senior-pill {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 12px;
            border-radius: 9px;
            background: rgba(0,10,30,0.03);
            border: 1px solid rgba(0,10,30,0.07);
            font-size: 13px;
            font-weight: 500;
            color: #3d5069;
            transition: all 0.15s ease;
        }
        .tp-senior-pill:hover {
            background: rgba(0,10,30,0.06);
            color: #000a1e;
        }
        .tp-senior-dot {
            width: 6px; height: 6px;
            border-radius: 50%;
            background: #000a1e;
            flex-shrink: 0;
            opacity: 0.4;
        }

        /* ── Patrol Cards ─────────────────────────────────────────── */
        .tp-patrol-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }
        .tp-patrol-card {
            border: 1.5px solid rgba(0,10,30,0.08);
            border-radius: 14px;
            overflow: hidden;
            background: #fff;
            transition: box-shadow 0.2s ease, transform 0.2s ease;
        }
        .tp-patrol-card:hover {
            box-shadow: 0 6px 24px rgba(0,10,30,0.1);
            transform: translateY(-2px);
        }
        .tp-patrol-header {
            background: #000a1e;
            padding: 14px 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .tp-patrol-icon {
            font-size: 20px !important;
            color: rgba(255,255,255,0.7);
        }
        .tp-patrol-name {
            font-size: 14px;
            font-weight: 700;
            color: #fff;
            letter-spacing: 0.04em;
        }
        .tp-patrol-body { padding: 16px 20px; }
        .tp-patrol-member {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 7px 0;
            border-bottom: 1px solid rgba(0,10,30,0.05);
            font-size: 13px;
            color: #3d5069;
            font-weight: 500;
        }
        .tp-patrol-member:last-child { border-bottom: none; }
        .tp-patrol-badge {
            font-size: 10px;
            font-weight: 700;
            padding: 2px 7px;
            border-radius: 99px;
            white-space: nowrap;
            flex-shrink: 0;
        }
        .badge-pl  { background: #000a1e; color: #fff; }
        .badge-apl { background: rgba(0,10,30,0.08); color: #000a1e; }
    </style>

    {{-- ═══════════════════════════════ HERO ═══════════════════════════════════════════════ --}}
    <div class="relative bg-primary overflow-hidden">
        <div class="absolute inset-0 opacity-[0.05]" style="background-image:radial-gradient(circle,rgba(255,255,255,0.9) 1px,transparent 1px);background-size:28px 28px;"></div>
        <div class="absolute bottom-0 inset-x-0 h-20 bg-gradient-to-t from-primary/90 to-transparent pointer-events-none"></div>

        <div class="relative max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop pt-10 pb-12 md:pt-14 md:pb-16">
            <nav aria-label="Breadcrumb" class="flex items-center gap-1.5 text-xs text-white/45 mb-7">
                <a href="{{ url('/') }}" class="hover:text-white/70 transition-colors">Home</a>
                <span class="material-symbols-outlined text-[11px] leading-none translate-y-px">chevron_right</span>
                <span class="text-white/80 font-medium">Present Troop Profile</span>
            </nav>

            <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-8">
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-0.5 h-9 bg-white/40 rounded-full"></div>
                        <span class="text-white/50 text-xs font-semibold tracking-[0.18em] uppercase">16th Colombo Scout Group · S. Thomas' College</span>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-extrabold text-white leading-[1.05] tracking-tight">
                        Present Troop Profile
                    </h1>
                    <p class="mt-3 text-white/55 text-sm md:text-base max-w-lg leading-relaxed">
                        The active composition and structural breakdown of the Senior and Junior Scout Troops for the current year (2026).
                    </p>
                </div>
                <div class="flex gap-3 flex-shrink-0">
                    <div class="bg-white/[0.08] backdrop-blur-sm border border-white/[0.1] rounded-2xl px-5 py-4 text-center">
                        <div class="text-3xl font-extrabold text-white leading-none">2026</div>
                        <div class="text-[11px] text-white/45 mt-1.5 font-semibold tracking-wide uppercase">Year</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ═══════════════════════════════ CONTENT ═══════════════════════════════════════════ --}}
    <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-10 md:py-14 flex flex-col gap-16">

        <section class="flex flex-col gap-10">
            {{-- Senior Troop --}}
            <div class="flex flex-col gap-6">
                <h3 class="text-lg font-bold text-primary flex items-center gap-2">
                    <span class="material-symbols-outlined text-secondary">shield_person</span>
                    Senior Troop
                </h3>
                <div class="grid md:grid-cols-2 gap-6">
                    {{-- Officials --}}
                    <div class="tp-card">
                        <div class="tp-section-title">Officials</div>
                        <div class="flex flex-col gap-0.5">
                            @foreach ([
                                ['Troop Leader',            'S.T. Kulatilaka'],
                                ['Asst. Troop Leader',      'A. Iflal'],
                                ['Asst. Troop Leader',      'K.K. Binduhewa'],
                                ['Scribe',                  'T.M. Senadheera'],
                                ['Asst. Scribe',            'T.M. Thanushkhan'],
                                ['Treasurer',               'R.S. Luckshan'],
                                ['Asst. Treasurer',         'H.R. Tennakoon'],
                                ['Quartermaster',           'J.R. Rajadurai'],
                                ['Asst. Quartermaster',     'N. Yukhapriyan'],
                                ['Badge Secretary',         'J.W. Pillai'],
                                ['Asst. Badge Secretary',   'S. Hashwanth'],
                            ] as [$role, $name])
                            <div class="tp-officials-row">
                                <span class="tp-officials-role">{{ $role }}</span>
                                <span class="tp-officials-dots"></span>
                                <span class="tp-officials-name">{{ $name }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Senior Scouts --}}
                    <div class="tp-card">
                        <div class="tp-section-title">Senior Scouts</div>
                        <div class="tp-seniors-grid">
                            @foreach ([
                                'M.J.A. Gunawardana', 'T. Karthik', 'D.S. Gunawardane', 
                                'A. Charis', 'M.A. Karunaratne', 'A. Sassvinth', 
                                'S. Saureishon', 'N. Yukhappiriyan', 'S. Krithigan', 
                                'S. Aakarahan'
                            ] as $s)
                            <div class="tp-senior-pill">
                                <span class="tp-senior-dot"></span>
                                {{ $s }}
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            {{-- Junior Troop --}}
            <div class="flex flex-col gap-6">
                <h3 class="text-lg font-bold text-primary flex items-center gap-2">
                    <span class="material-symbols-outlined text-secondary">groups</span>
                    Junior Patrols
                </h3>
                <div class="tp-patrol-grid">
                    {{-- Eagles --}}
                    <div class="tp-patrol-card">
                        <div class="tp-patrol-header">
                            <span class="material-symbols-outlined tp-patrol-icon">sports_score</span>
                            <span class="tp-patrol-name">Eagles</span>
                        </div>
                        <div class="tp-patrol-body">
                            <div class="tp-patrol-member"><span class="tp-patrol-badge badge-pl">PL</span>S. Kulatilaka</div>
                            <div class="tp-patrol-member"><span class="tp-patrol-badge badge-apl">APL</span>R. Mendis</div>
                            @foreach (['C. Fonseka','A. Siddeeq','A. Zameethd','P. Susitharan','A. Wickramasinghe','M. Kariyawasam','T. Avory','T. Liyanage','O. Abenayaka','D. Kalupahana'] as $m)
                            <div class="tp-patrol-member">{{ $m }}</div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Leopards --}}
                    <div class="tp-patrol-card">
                        <div class="tp-patrol-header">
                            <span class="material-symbols-outlined tp-patrol-icon">pets</span>
                            <span class="tp-patrol-name">Leopards</span>
                        </div>
                        <div class="tp-patrol-body">
                            <div class="tp-patrol-member"><span class="tp-patrol-badge badge-pl">PL</span>D. Thalgahagoda</div>
                            <div class="tp-patrol-member"><span class="tp-patrol-badge badge-apl">APL</span>A. Tennakoon</div>
                            @foreach (['D. Paiva','A. Senarath','N. Ramachandran','H. Sivalohithan','A. Amhar','T. Paranathala','K. Chandrasekara','H. Mahindaratne','R. Senaratne','J. Fernando'] as $m)
                            <div class="tp-patrol-member">{{ $m }}</div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Kingfishers --}}
                    <div class="tp-patrol-card">
                        <div class="tp-patrol-header">
                            <span class="material-symbols-outlined tp-patrol-icon">flutter_dash</span>
                            <span class="tp-patrol-name">Kingfishers</span>
                        </div>
                        <div class="tp-patrol-body">
                            <div class="tp-patrol-member"><span class="tp-patrol-badge badge-pl">PL</span>K. Perera</div>
                            <div class="tp-patrol-member"><span class="tp-patrol-badge badge-apl">APL</span>R. Ekanayake</div>
                            @foreach (['Y. Galapatha','J. Thivaahara','O. Ratwatte','W. Wilkins','N. Jeyanth','W. Dhanapala','C. Ashvigan','M. Aaruthrran','N. Susitharan'] as $m)
                            <div class="tp-patrol-member">{{ $m }}</div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Bears --}}
                    <div class="tp-patrol-card">
                        <div class="tp-patrol-header">
                            <span class="material-symbols-outlined tp-patrol-icon">cruelty_free</span>
                            <span class="tp-patrol-name">Bears</span>
                        </div>
                        <div class="tp-patrol-body">
                            <div class="tp-patrol-member"><span class="tp-patrol-badge badge-pl">PL</span>M. Chandrasena</div>
                            <div class="tp-patrol-member"><span class="tp-patrol-badge badge-apl">APL</span>D. Peter</div>
                            @foreach (['P. Fernando','S. Seyon','D. Wikramasinghe','A. Thayaparan','S. Fernando','J. Wilkins','K. Wijekoon','B. Delpagoda'] as $m)
                            <div class="tp-patrol-member">{{ $m }}</div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Sharks --}}
                    <div class="tp-patrol-card">
                        <div class="tp-patrol-header">
                            <span class="material-symbols-outlined tp-patrol-icon">water</span>
                            <span class="tp-patrol-name">Sharks</span>
                        </div>
                        <div class="tp-patrol-body">
                            <div class="tp-patrol-member"><span class="tp-patrol-badge badge-pl">PL</span>N. Kodikara</div>
                            <div class="tp-patrol-member"><span class="tp-patrol-badge badge-apl">APL</span>Y. Peris</div>
                            @foreach (['S.A. Paiva','S. Dhasaanayaka','R.M.N. Dewthisa','V. Manatunga','A. Bandara','A. Rajakumar','M. Aksharan'] as $m)
                            <div class="tp-patrol-member">{{ $m }}</div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

@endsection
