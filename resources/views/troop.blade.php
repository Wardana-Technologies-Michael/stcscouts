@extends('layouts.master')

@section('title', "The Troop & Heritage — 16th Colombo Scout Group, S. Thomas' College")
@section('meta_description', "The official portal for the 16th Colombo Scout Group at S. Thomas' College, Mount Lavinia. Explore our current roster, group committee, history, and Scout Dunk requisitions.")

@section('content')

    {{-- ═══════════════════════════════ PAGE-SPECIFIC STYLES ═══════════════════════════════ --}}
    <style>
        /* ── Scrollbar hide ───────────────────────────────────────── */
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide { -ms-overflow-style:none; scrollbar-width:none; }

        /* ── Scroll margin for sticky navigation ───────────────────── */
        .tp-section-anchor {
            scroll-margin-top: 140px; /* Offset for header + sticky sub-nav */
        }

        /* ── Navigation Buttons ───────────────────────────────────── */
        .tp-nav-btn,
        .tp-nav-btn:link,
        .tp-nav-btn:visited {
            padding: 8px 18px;
            border-radius: 8px;
            font-size: 13.5px;
            font-weight: 600;
            color: #50606f;
            cursor: pointer;
            transition: all 0.2s ease;
            white-space: nowrap;
            border: none;
            background: transparent;
            text-decoration: none;
            display: inline-block;
        }
        .tp-nav-btn:hover {
            color: #000a1e;
            background: rgba(0,10,30,0.06);
            text-decoration: none;
        }
        .tp-nav-btn.active,
        .tp-nav-btn.active:link,
        .tp-nav-btn.active:visited {
            background: #000a1e;
            color: #fff;
            box-shadow: 0 2px 10px rgba(0,10,30,0.22);
            text-decoration: none;
        }

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

        /* ── History Era Cards ────────────────────────────────────── */
        .tp-history-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 24px;
        }
        .tp-history-card {
            background: #fff;
            border: 1px solid rgba(0,10,30,0.08);
            border-radius: 16px;
            padding: 24px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0,10,30,0.02);
        }
        .tp-history-card:hover {
            transform: translateY(-4px);
            border-color: #000a1e;
            box-shadow: 0 10px 24px rgba(0,10,30,0.08);
        }
        .tp-history-title {
            font-size: 1.1rem;
            font-weight: 800;
            color: #000a1e;
            margin-bottom: 8px;
        }
        .tp-history-desc {
            font-size: 13.5px;
            color: #50606f;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        .tp-history-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 12.5px;
            font-weight: 700;
            color: #000a1e;
            text-decoration: none;
            transition: gap 0.25s;
        }
        .tp-history-btn:hover {
            color: #0e4194;
            gap: 10px;
            text-decoration: none;
        }

        /* ── Fade in animation ────────────────────────────────────── */
        @keyframes tpFadeUp {
            from { opacity: 0; transform: translateY(14px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .tp-animate { animation: tpFadeUp 0.4s ease both; }
        .tp-animate:nth-child(1) { animation-delay: 0.05s; }
        .tp-animate:nth-child(2) { animation-delay: 0.10s; }
        .tp-animate:nth-child(3) { animation-delay: 0.15s; }
    </style>

    {{-- ═══════════════════════════════ HERO ═══════════════════════════════════════════════ --}}
    <div class="relative bg-primary overflow-hidden">
        <div class="absolute inset-0 opacity-[0.05]" style="background-image:radial-gradient(circle,rgba(255,255,255,0.9) 1px,transparent 1px);background-size:28px 28px;"></div>
        <div class="absolute bottom-0 inset-x-0 h-20 bg-gradient-to-t from-primary/90 to-transparent pointer-events-none"></div>

        <div class="relative max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop pt-10 pb-12 md:pt-14 md:pb-16">
            <nav aria-label="Breadcrumb" class="flex items-center gap-1.5 text-xs text-white/45 mb-7">
                <a href="{{ url('/') }}" class="hover:text-white/70 transition-colors">Home</a>
                <span class="material-symbols-outlined text-[11px] leading-none translate-y-px">chevron_right</span>
                <span class="text-white/80 font-medium">The Troop</span>
            </nav>

            <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-8">
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-0.5 h-9 bg-white/40 rounded-full"></div>
                        <span class="text-white/50 text-xs font-semibold tracking-[0.18em] uppercase">16th Colombo Scout Group · S. Thomas' College</span>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-extrabold text-white leading-[1.05] tracking-tight">
                        The Troop
                    </h1>
                    <p class="mt-3 text-white/55 text-sm md:text-base max-w-lg leading-relaxed">
                        A century of scouting excellence at Mount Lavinia — combining character development, adventure, and history.
                    </p>
                </div>
                <div class="flex gap-3 flex-shrink-0">
                    <div class="bg-white/[0.08] backdrop-blur-sm border border-white/[0.1] rounded-2xl px-5 py-4 text-center">
                        <div class="text-3xl font-extrabold text-white leading-none">1912</div>
                        <div class="text-[11px] text-white/45 mt-1.5 font-semibold tracking-wide uppercase">Founded</div>
                    </div>
                    <div class="bg-white/[0.08] backdrop-blur-sm border border-white/[0.1] rounded-2xl px-5 py-4 text-center">
                        <div class="text-3xl font-extrabold text-white leading-none">100+</div>
                        <div class="text-[11px] text-white/45 mt-1.5 font-semibold tracking-wide uppercase">Active Scouts</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ═══════════════════════════════ STICKY SUB-NAVIGATION ══════════════════════════════ --}}
    <div id="tp-jumpnav" class="sticky top-16 z-40 bg-surface/95 backdrop-blur-md border-b border-outline-variant/30 shadow-[0_1px_8px_rgba(0,0,0,0.06)]">
        <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
            <div class="flex items-center overflow-x-auto scrollbar-hide gap-1 py-3">
                <a id="btn-roster" href="#roster" class="tp-nav-btn active" onclick="smoothJump(event,'roster')">Present Roster</a>
                <a id="btn-history" href="#history" class="tp-nav-btn" onclick="smoothJump(event,'history')">History &amp; Evolution</a>
                <a id="btn-committee" href="#committee" class="tp-nav-btn" onclick="smoothJump(event,'committee')">Group Committee</a>
                <a id="btn-dunk" href="#dunk" class="tp-nav-btn" onclick="smoothJump(event,'dunk')">Scout Dunk</a>
            </div>
        </div>
    </div>

    {{-- ═══════════════════════════════ CONTENT ═══════════════════════════════════════════ --}}
    <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-10 md:py-14 flex flex-col gap-16">

        {{-- ── SECTION 1: PRESENT ROSTER ────────────────────────────────────────────────── --}}
        <section id="roster" class="tp-section-anchor tp-animate flex flex-col gap-10">
            <div>
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-1 h-8 bg-primary rounded-full"></div>
                    <h2 class="text-2xl font-extrabold text-primary tracking-tight">Present Roster</h2>
                </div>
                <p class="text-secondary text-sm md:text-base leading-relaxed max-w-xl">
                    The active composition of the Senior and Junior Scout Troops for the current year (2026).
                </p>
            </div>

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

        {{-- ── SECTION 2: HISTORY & EVOLUTION ───────────────────────────────────────────── --}}
        <section id="history" class="tp-section-anchor flex flex-col gap-8 border-t border-outline-variant/30 pt-16">
            <div>
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-1 h-8 bg-primary rounded-full"></div>
                    <h2 class="text-2xl font-extrabold text-primary tracking-tight">History &amp; Evolution</h2>
                </div>
                <p class="text-secondary text-sm md:text-base leading-relaxed max-w-xl">
                    Since our founding in 1912, the 16th Colombo Scout Group has built a rich legacy of leadership, courage, and traditional scouting.
                </p>
            </div>

            <div class="tp-history-grid">
                <!-- Beginnings -->
                <div class="tp-history-card">
                    <div>
                        <h4 class="tp-history-title">The Beginnings: 1912-1948</h4>
                        <p class="tp-history-desc">The early foundation of scouting at College, tracing the initial camps, formation of patrol structures, and our integration into the island's movement.</p>
                    </div>
                    <a href="{{ url('history-of-scouting-at-college') }}" class="tp-history-btn">
                        Read Detailed Era <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </a>
                </div>

                <!-- Post War -->
                <div class="tp-history-card">
                    <div>
                        <h4 class="tp-history-title">Post-War Scouting: 1948-1968</h4>
                        <p class="tp-history-desc">Navigating post-war expansion, international jamboree participation, and the modernization of our troop syllabus under legendary leaders.</p>
                    </div>
                    <a href="{{ url('history-of-scouting-at-college-2') }}" class="tp-history-btn">
                        Read Detailed Era <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </a>
                </div>

                <!-- Recent Times -->
                <div class="tp-history-card">
                    <div>
                        <h4 class="tp-history-title">The Recent Times: 1968-Present</h4>
                        <p class="tp-history-desc">Our current history, reflecting recent camps, environmental expeditions, digital archives expansion, and centennial celebrations.</p>
                    </div>
                    <a href="{{ url('history-of-scouting-at-college-3') }}" class="tp-history-btn">
                        Read Detailed Era <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </a>
                </div>
            </div>

            {{-- personalities and honors --}}
            <div class="grid md:grid-cols-2 gap-6 mt-2">
                <div class="tp-card flex flex-col justify-between">
                    <div>
                        <h4 class="text-base font-bold text-primary mb-2">Group Personalities</h4>
                        <p class="text-secondary text-sm leading-relaxed mb-4">Read about the lives, dedication, and historical scouting contributions of our legendary leaders and instructors.</p>
                    </div>
                    <div class="flex gap-4">
                        <a href="{{ url('mr-w-i-muttiah') }}" class="text-xs font-bold text-primary hover:text-primary-container flex items-center gap-1">Mr. W.I. Muttiah →</a>
                        <a href="{{ url('mr-rex-jayasinha') }}" class="text-xs font-bold text-primary hover:text-primary-container flex items-center gap-1">Mr. Rex Jayasingha →</a>
                    </div>
                </div>

                <div class="tp-card flex flex-col justify-between">
                    <div>
                        <h4 class="text-base font-bold text-primary mb-2">Honors &amp; Awards</h4>
                        <p class="text-secondary text-sm leading-relaxed mb-4">View lists of scouts who have achieved the highest honors in the scouting movement over the decades.</p>
                    </div>
                    <div class="flex flex-wrap gap-x-4 gap-y-2">
                        <a href="{{ url('/Past-Troop-Leaders') }}" class="text-xs font-bold text-primary hover:text-primary-container">Past Troop Leaders →</a>
                        <a href="{{ url('/King\'s-and-Queen\'s-Scouts') }}" class="text-xs font-bold text-primary hover:text-primary-container">King's &amp; Queen's Scouts →</a>
                        <a href="{{ url('/President\'s-Award-Winners') }}" class="text-xs font-bold text-primary hover:text-primary-container">President's Award Winners →</a>
                    </div>
                </div>
            </div>
        </section>

        {{-- ── SECTION 3: GROUP COMMITTEE ──────────────────────────────────────────────── --}}
        <section id="committee" class="tp-section-anchor flex flex-col gap-8 border-t border-outline-variant/30 pt-16">
            <div>
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-1 h-8 bg-primary rounded-full"></div>
                    <h2 class="text-2xl font-extrabold text-primary tracking-tight">The Group Committee</h2>
                </div>
                <p class="text-secondary text-sm md:text-base leading-relaxed max-w-xl">
                    The administrative support body that handles the financial, planning, and advisory roles for the Group.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-6">
                <!-- Sponsoring Authority & Office Bearers -->
                <div class="tp-card md:col-span-2 flex flex-col gap-4">
                    <div class="tp-section-title">Sponsoring Authority &amp; Office Bearers</div>
                    <div class="flex flex-col gap-1">
                        @foreach ([
                            ['Sponsoring Authority (Warden)',       'Rev. Mark Billmoria'],
                            ['Sponsoring Authority (Sub Warden)',   'Mr. Asanka Perera'],
                            ['Group Chairman',                      'Mr. Senaka De Fonseka'],
                            ['Group Secretary',                     'Mr. S. C. Gajanayaka'],
                            ['Group Treasurer',                     'Dr. Aseni Wickramathilake'],
                            ['Group Scout Leader',                  'Mrs. Wathsala Wijewickrema'],
                        ] as [$office, $name])
                        <div class="flex justify-between items-center py-2 border-b border-outline-variant/35 last:border-0 text-sm">
                            <span class="font-semibold text-primary">{{ $office }}</span>
                            <span class="text-secondary">{{ $name }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Committee Members -->
                <div class="tp-card flex flex-col gap-4">
                    <div class="tp-section-title">Committee Members</div>
                    <div class="flex flex-col gap-0.5 max-h-[260px] overflow-y-auto pr-2">
                        @foreach ([
                            'Mrs. Anoma Jayasundera',
                            'Mr. Wirendra Wannakuwatta',
                            'Mrs. Angeeka De Silva',
                            'Mrs. Anusha Hettiararachchi Hettigoda',
                            'Mr. Harin De Mel',
                            'Mr. Nandana Liyanagamage',
                            'Mr. V. R. Ramanayake',
                            'Mrs. Ama Alagiyawanna',
                            'Mr. Milindu Malawarachchi',
                            'Mr. Nirodha Dias'
                        ] as $m)
                        <div class="flex items-center gap-2 py-1.5 text-sm text-secondary">
                            <span class="w-1.5 h-1.5 bg-primary/45 rounded-full shrink-0"></span>
                            {{ $m }}
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        {{-- ── SECTION 4: SCOUT DUNK ───────────────────────────────────────────────────── --}}
        <section id="dunk" class="tp-section-anchor flex flex-col gap-8 border-t border-outline-variant/30 pt-16">
            <div>
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-1 h-8 bg-primary rounded-full"></div>
                    <h2 class="text-2xl font-extrabold text-primary tracking-tight">Request the Scout Dunk</h2>
                </div>
                <p class="text-secondary text-sm md:text-base leading-relaxed max-w-xl">
                    Our famous "Dreaded Dunk" — a unique attraction designed and built by our troop, perfect for carnivals, party games, and outdoor events.
                </p>
            </div>

            <div class="bg-surface rounded-xl border border-outline-variant/40 overflow-hidden flex flex-col lg:flex-row shadow-sm">
                <div class="w-full lg:w-1/2 h-64 lg:h-auto overflow-hidden">
                    <img class="w-full h-full object-cover" 
                         alt="The Scout Dunk Structure" 
                         src="{{ asset('images/DUNK-1024x768.jpg') }}"/>
                </div>
                <div class="w-full lg:w-1/2 p-8 md:p-10 flex flex-col justify-between gap-6">
                    <div>
                        <span class="text-xs font-bold text-tertiary tracking-widest uppercase">Tradition &amp; Fun</span>
                        <h3 class="text-xl font-extrabold text-primary mt-2">The "Dreaded Dunk" Requisition</h3>
                        <p class="text-secondary text-sm leading-relaxed mt-3">
                            First introduced at "April Rhythms 1997", the Scout Dunk has been updated with several custom mechanisms and remains a staple attraction at STC Mount Lavinia carnivals and local charity events.
                        </p>
                    </div>
                    <div class="flex flex-col gap-3">
                        <p class="text-xs text-secondary">Download the requisition form below to view terms &amp; conditions and make a booking.</p>
                        <a href="{{ asset('scout_docs/SCOUT-DUNK-REQUISITION-FORM.pdf') }}" 
                           class="inline-flex items-center justify-center gap-2 bg-primary text-on-primary font-bold text-xs tracking-wider uppercase px-6 py-4 rounded hover:bg-primary-container transition-all self-start" 
                           download>
                            <span class="material-symbols-outlined text-sm">download</span>
                            Download Requisition Form (PDF)
                        </a>
                    </div>
                </div>
            </div>
        </section>

    </div>

    {{-- ═══════════════════════════════ SCROLL-SPY JAVASCRIPT ═══════════════════════════════ --}}
    <script>
        const SECTIONS = ['roster', 'history', 'committee', 'dunk'];
        const JUMP_NAV_HEIGHT = () => document.getElementById('tp-jumpnav').offsetHeight + 64; // Header nav + sub nav height

        /* ── Smooth Scroll to Section ────────────────────────────── */
        function smoothJump(e, sectionId) {
            e.preventDefault();
            const el = document.getElementById(sectionId);
            if (!el) return;
            const top = el.getBoundingClientRect().top + window.scrollY - JUMP_NAV_HEIGHT() - 12;
            window.scrollTo({ top, behavior: 'smooth' });
        }

        /* ── Scroll Spy highlighting ────────────────────────────── */
        function updateActiveSection() {
            let activeSec = SECTIONS[0];
            const offset = JUMP_NAV_HEIGHT() + 20;

            for (const s of SECTIONS) {
                const el = document.getElementById(s);
                if (!el) continue;
                if (el.getBoundingClientRect().top <= offset) {
                    activeSec = s;
                }
            }

            SECTIONS.forEach(s => {
                const btn = document.getElementById('btn-' + s);
                if (btn) btn.classList.toggle('active', s === activeSec);
            });
        }

        document.addEventListener('DOMContentLoaded', updateActiveSection);

        let ticking = false;
        window.addEventListener('scroll', () => {
            if (!ticking) {
                requestAnimationFrame(() => { updateActiveSection(); ticking = false; });
                ticking = true;
            }
        }, { passive: true });
    </script>

@endsection
