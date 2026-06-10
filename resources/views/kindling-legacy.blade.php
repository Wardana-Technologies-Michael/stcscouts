@extends('layouts.master')

@section('title', 'Kindling Legacy Scout Camp 2026 | 16th Colombo Scouts')
@section('meta_description', "Official event portal for the Kindling Legacy Inter-School Scout Camp hosted by S. Thomas' College Mount Lavinia. View schedule, campsite map, trainer spotlight, and download official invite packs.")

@section('content')
    <style>
        /* ───── Design tokens ─────────────────────────────────────────────────── */
        :root {
            --kl-navy: #000a1e;
            --kl-blue: #002147;
            --kl-blue-accent: #0e4194;
            --kl-blue-accent-l: #0a337a;
            --kl-card: #ffffff;
            --kl-border: rgba(0, 10, 30, 0.08);
            --kl-bg: #fcf9f8;
            --kl-text: #1c1b1b;
            --kl-muted: #50606f;
        }

        /* ───── Page wrapper ─────────────────────────────────────────────────── */
        .kl-wrap {
            background-color: var(--kl-bg);
            color: var(--kl-text);
            font-family: 'Plus Jakarta Sans', sans-serif;
            overflow-x: hidden;
        }

        /* ───── Hero ─────────────────────────────────────────────────────────── */
        .kl-hero {
            position: relative;
            padding: 96px 0 80px;
            background: linear-gradient(160deg, #000a1e 0%, #001533 55%, #0a2040 100%);
            border-bottom: 1px solid rgba(14, 65, 148, 0.25);
            overflow: hidden;
        }

        .kl-hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: radial-gradient(circle at 25% 50%, rgba(14, 65, 148, 0.08) 0%, transparent 60%),
                radial-gradient(circle at 75% 20%, rgba(0, 33, 71, 0.6) 0%, transparent 55%);
            pointer-events: none;
        }

        /* Dot-grid overlay */
        .kl-hero::after {
            content: '';
            position: absolute;
            inset: 0;
            background-image: radial-gradient(circle, rgba(255, 255, 255, 0.04) 1px, transparent 1px);
            background-size: 26px 26px;
            pointer-events: none;
        }

        .kl-hero-inner {
            position: relative;
            z-index: 1;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 48px;
        }

        @media (max-width: 768px) {
            .kl-hero-inner {
                padding: 0 16px;
            }
        }

        .kl-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(174, 199, 246, 0.12);
            border: 1px solid rgba(174, 199, 246, 0.3);
            border-radius: 9999px;
            padding: 6px 18px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: #aec7f6;
            margin-bottom: 24px;
        }

        .kl-hero h1 {
            font-size: clamp(2.5rem, 6vw, 4rem);
            font-weight: 800;
            letter-spacing: -0.03em;
            line-height: 1.05;
            color: #ffffff !important;
            margin-bottom: 8px;
        }

        .kl-hero h1 span {
            color: #aec7f6;
        }

        .kl-hero-sub {
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.5);
            font-weight: 500;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            margin-bottom: 36px;
        }

        /* Countdown */
        .kl-countdown {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
        }

        .kl-cd-card {
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 14px;
            width: 90px;
            padding: 14px 8px;
            text-align: center;
            backdrop-filter: blur(12px);
            transition: border-color 0.25s;
        }

        .kl-cd-card:hover {
            border-color: rgba(174, 199, 246, 0.4);
        }

        .kl-cd-val {
            display: block;
            font-size: 2rem;
            font-weight: 800;
            color: #aec7f6;
            line-height: 1.15;
            letter-spacing: -0.02em;
        }

        .kl-cd-lbl {
            font-size: 10px;
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.35);
            margin-top: 2px;
        }

        /* Hero stats badges */
        .kl-hero-stats {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 36px;
        }

        .kl-stat-badge {
            background: rgba(255, 255, 255, 0.07);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 12px;
            padding: 14px 20px;
            text-align: center;
            min-width: 100px;
        }

        .kl-stat-num {
            font-size: 1.6rem;
            font-weight: 800;
            color: #fff;
            line-height: 1;
        }

        .kl-stat-lbl {
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.4);
            margin-top: 4px;
        }

        /* ───── Section system ───────────────────────────────────────────────── */
        .kl-section {
            padding: 80px 0;
            background: var(--kl-bg);
        }

        .kl-section-alt {
            padding: 80px 0;
            background: #f0edec;
        }

        .kl-inner {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 48px;
        }

        @media (max-width: 768px) {
            .kl-inner {
                padding: 0 16px;
            }
        }

        /* Section header */
        .kl-section-hd {
            margin-bottom: 52px;
        }

        .kl-section-hd.centered {
            text-align: center;
        }

        .kl-section-label {
            display: inline-block;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: var(--kl-blue-accent-l);
            margin-bottom: 10px;
        }

        .kl-section-title {
            font-size: clamp(1.6rem, 3vw, 2.2rem);
            font-weight: 800;
            color: var(--kl-navy);
            letter-spacing: -0.025em;
            line-height: 1.15;
            margin-bottom: 12px;
        }

        .kl-section-desc {
            font-size: 0.95rem;
            color: var(--kl-muted);
            line-height: 1.7;
            max-width: 600px;
        }

        .kl-section-hd.centered .kl-section-desc {
            margin: 0 auto;
        }

        /* Blue rule */
        .kl-rule {
            display: block;
            width: 36px;
            height: 3px;
            background: var(--kl-blue-accent);
            border-radius: 99px;
            margin-bottom: 14px;
        }

        .kl-section-hd.centered .kl-rule {
            margin-left: auto;
            margin-right: auto;
        }

        /* ───── Contingent Grid ───────────────────────────────────────────────── */
        .kl-contingent-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }

        .kl-cont-card {
            background: var(--kl-card);
            border: 1px solid var(--kl-border);
            border-radius: 18px;
            padding: 26px 22px;
            text-align: center;
            position: relative;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 20px rgba(0, 10, 30, 0.02);
        }

        .kl-cont-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: rgba(0, 10, 30, 0.05);
        }

        .kl-cont-card.host::before {
            background: linear-gradient(90deg, var(--kl-blue), var(--kl-blue-accent));
        }

        .kl-cont-card:hover {
            transform: translateY(-6px);
            border-color: rgba(14, 65, 148, 0.25);
            box-shadow: 0 16px 40px rgba(0, 10, 30, 0.08);
        }

        .kl-cont-school {
            font-size: 1rem;
            font-weight: 700;
            color: var(--kl-navy);
            margin-bottom: 8px;
            line-height: 1.3;
        }

        .kl-cont-count {
            font-size: 2.8rem;
            font-weight: 800;
            color: var(--kl-blue-accent-l);
            line-height: 1;
            margin: 14px 0;
            letter-spacing: -0.03em;
        }

        .kl-cont-badge {
            display: inline-block;
            font-size: 0.78rem;
            color: var(--kl-muted);
            background: rgba(0, 10, 30, 0.05);
            padding: 4px 12px;
            border-radius: 6px;
            font-weight: 500;
        }

        /* ───── Map Section ──────────────────────────────────────────────────── */
        .kl-map-card {
            background: var(--kl-card);
            border: 1px solid var(--kl-border);
            border-radius: 20px;
            padding: 18px;
            box-shadow: 0 12px 40px rgba(0, 10, 30, 0.04);
        }

        .kl-map-img-wrap {
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid rgba(0, 10, 30, 0.06);
        }

        .kl-map-img-wrap img {
            width: 100%;
            display: block;
            transition: transform 0.5s ease;
        }

        .kl-map-img-wrap:hover img {
            transform: scale(1.03);
        }

        .kl-legend {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(190px, 1fr));
            gap: 12px;
            margin-top: 22px;
        }

        .kl-legend-item {
            display: flex;
            align-items: center;
            gap: 10px;
            background: #ffffff;
            padding: 10px 14px;
            border-radius: 10px;
            border: 1.5px solid var(--kl-border);
            border-left: 3px solid;
        }

        .kl-legend-text {
            font-size: 0.85rem;
            color: var(--kl-text);
            font-weight: 500;
            line-height: 1.3;
        }

        /* ───── Schedule / Timeline ──────────────────────────────────────────── */
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide { -ms-overflow-style:none; scrollbar-width:none; }

        .kl-day-section {
            scroll-margin-top: 140px; /* offset for sticky header + jumpbar */
        }

        .kl-day-btn,
        .kl-day-btn:link,
        .kl-day-btn:visited {
            padding: 10px 26px;
            border-radius: 9999px;
            border: 1.5px solid var(--kl-border);
            background: #ffffff;
            color: var(--kl-muted);
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.25s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            white-space: nowrap;
        }

        .kl-day-btn:hover {
            border-color: var(--kl-navy);
            color: var(--kl-navy);
            background: rgba(0, 10, 30, 0.02);
            text-decoration: none;
        }

        .kl-day-btn.active,
        .kl-day-btn.active:link,
        .kl-day-btn.active:visited {
            background: var(--kl-navy);
            border-color: var(--kl-navy);
            color: #ffffff;
            box-shadow: 0 4px 18px rgba(0, 10, 30, 0.15);
            text-decoration: none;
        }

        .kl-table-wrap {
            background: var(--kl-card);
            border: 1px solid var(--kl-border);
            border-radius: 20px;
            overflow: hidden;
        }

        .kl-table {
            width: 100%;
            border-collapse: collapse;
        }

        .kl-table thead th {
            background: rgba(0, 10, 30, 0.04);
            color: var(--kl-navy);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            padding: 14px 20px;
            text-align: left;
            border-bottom: 1px solid var(--kl-border);
        }

        .kl-table tbody tr {
            border-bottom: 1px solid var(--kl-border);
            transition: background 0.2s;
        }

        .kl-table tbody tr:last-child {
            border-bottom: none;
        }

        .kl-table tbody tr:hover {
            background: rgba(0, 10, 30, 0.015);
        }

        .kl-table tbody td {
            padding: 16px 20px;
            vertical-align: middle;
            font-size: 14px;
            color: var(--kl-text);
            line-height: 1.45;
        }

        .kl-td-time {
            font-weight: 700;
            color: var(--kl-blue-accent-l);
            white-space: nowrap;
            font-size: 13px;
            letter-spacing: 0.02em;
        }

        .kl-td-event {
            color: var(--kl-navy);
            font-weight: 600;
            font-size: 14px;
        }

        .kl-td-incharge {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
        }

        .kl-person-chip {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: rgba(0, 10, 30, 0.04);
            border: 1px solid rgba(0, 10, 30, 0.08);
            border-radius: 9999px;
            padding: 3px 11px 3px 8px;
            font-size: 12px;
            font-weight: 600;
            color: var(--kl-navy);
            white-space: nowrap;
        }

        .kl-person-chip .kl-chip-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--kl-blue-accent-l);
            flex-shrink: 0;
        }

        .kl-td-notes {
            font-size: 12.5px;
            color: var(--kl-muted);
            font-style: italic;
        }

        /* Milestone row highlight */
        .kl-row-milestone td {
            background: rgba(14, 65, 148, 0.06);
        }

        .kl-row-milestone .kl-td-event {
            color: var(--kl-blue-accent-l);
        }

        /* Responsive table */
        @media (max-width: 640px) {
            .kl-table thead {
                display: none;
            }

            .kl-table tbody tr {
                display: block;
                padding: 14px 16px;
                border-bottom: 1px solid var(--kl-border);
            }

            .kl-table tbody td {
                display: block;
                padding: 3px 0;
                border: none;
            }

            .kl-td-time {
                font-size: 12px;
                margin-bottom: 4px;
            }

            .kl-td-event {
                margin-bottom: 6px;
            }
        }

        /* ───── Trainer Spotlight ────────────────────────────────────────────── */


        /* ───── Download Cards ───────────────────────────────────────────────── */
        .kl-dl-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }

        .kl-dl-card {
            background: var(--kl-card);
            border: 1px solid var(--kl-border);
            border-radius: 18px;
            padding: 28px 24px;
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
        }

        .kl-dl-card:hover {
            transform: translateY(-5px);
            border-color: var(--kl-navy);
            box-shadow: 0 12px 32px rgba(0, 10, 30, 0.06);
        }

        .kl-dl-ico {
            font-size: 2.2rem;
            color: var(--kl-blue-accent-l);
            margin-bottom: 18px;
        }

        .kl-dl-title {
            font-size: 1rem;
            font-weight: 700;
            color: var(--kl-navy);
            margin-bottom: 8px;
        }

        .kl-dl-desc {
            font-size: 0.85rem;
            color: var(--kl-muted);
            line-height: 1.6;
            flex-grow: 1;
            margin-bottom: 20px;
        }

        .kl-dl-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--kl-navy);
            border: none;
            color: #fff;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 13px;
            font-weight: 700;
            padding: 10px 18px;
            border-radius: 9px;
            text-decoration: none;
            transition: all 0.25s;
            align-self: flex-start;
        }

        .kl-dl-btn:hover {
            background: var(--kl-blue);
            color: #fff;
            box-shadow: 0 4px 14px rgba(0, 10, 30, 0.15);
        }

        /* ───── Sponsor Card ─────────────────────────────────────────────────── */
        .kl-sponsor {
            background: #fff;
            border: 1px solid var(--kl-border);
            border-radius: 20px;
            padding: 40px;
            text-align: center;
            max-width: 540px;
            margin: 48px auto 0;
            box-shadow: 0 12px 40px rgba(0, 10, 30, 0.04);
        }

        .kl-sponsor-label {
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: #64748b;
            display: block;
            margin-bottom: 20px;
        }

        .kl-sponsor-name {
            font-size: 2rem;
            font-weight: 800;
            color: #0f172a;
            letter-spacing: -0.02em;
            margin-bottom: 6px;
        }

        .kl-sponsor-sub {
            font-size: 0.9rem;
            color: #64748b;
            font-weight: 500;
        }
    </style>

    <div class="kl-wrap">

        {{-- ═════════════════════════ HERO ═════════════════════════ --}}
        <header class="kl-hero">
            <div class="kl-hero-inner">
                <div class="kl-eyebrow">
                    <span class="material-symbols-outlined" style="font-size:14px;">star</span>
                    Inter-School Camp 2026
                </div>
                <h1>Kindling <span>Legacy</span></h1>
                <p class="kl-hero-sub">16th Colombo Scout Group · S. Thomas' College, Mount Lavinia</p>

                <div class="kl-countdown">
                    <div class="kl-cd-card">
                        <span class="kl-cd-val" id="kl-days">--</span>
                        <span class="kl-cd-lbl">Days</span>
                    </div>
                    <div class="kl-cd-card">
                        <span class="kl-cd-val" id="kl-hours">--</span>
                        <span class="kl-cd-lbl">Hours</span>
                    </div>
                    <div class="kl-cd-card">
                        <span class="kl-cd-val" id="kl-mins">--</span>
                        <span class="kl-cd-lbl">Mins</span>
                    </div>
                    <div class="kl-cd-card">
                        <span class="kl-cd-val" id="kl-secs">--</span>
                        <span class="kl-cd-lbl">Secs</span>
                    </div>
                </div>

                <div class="kl-hero-stats">
                    <div class="kl-stat-badge">
                        <div class="kl-stat-num">150+</div>
                        <div class="kl-stat-lbl">Participants</div>
                    </div>
                    <div class="kl-stat-badge">
                        <div class="kl-stat-num">6</div>
                        <div class="kl-stat-lbl">Schools</div>
                    </div>
                    <div class="kl-stat-badge">
                        <div class="kl-stat-num">3</div>
                        <div class="kl-stat-lbl">Days</div>
                    </div>
                </div>
            </div>
        </header>

        {{-- ═════════════════════════ OVERVIEW ═════════════════════ --}}
        <section class="kl-section">
            <div class="kl-inner">
                <div class="kl-section-hd centered">
                    <span class="kl-rule"></span>
                    <span class="kl-section-label">Event Overview</span>
                    <h2 class="kl-section-title">Participating Contingents</h2>
                    <p class="kl-section-desc">Hosted by S. Thomas' College, Mount Lavinia. Bringing together Scouts,
                        Guides, and Cub Scouts from premier schools across the island for approximately 150+ participants.
                    </p>
                </div>

                <div class="kl-contingent-grid">
                    <div class="kl-cont-card host">
                        <div class="kl-cont-school">S. Thomas' College (ML)</div>
                        <div class="kl-cont-badge">Host Contingent</div>
                        <div class="kl-cont-count">70</div>
                        <div class="kl-cont-badge">Camping On-Site</div>
                    </div>
                    <div class="kl-cont-card">
                        <div class="kl-cont-school">STC Guruthalawe</div>
                        <div class="kl-cont-badge">Visiting School</div>
                        <div class="kl-cont-count">25+</div>
                        <div class="kl-cont-badge">Friday Arrival (Boarding)</div>
                    </div>
                    <div class="kl-cont-card">
                        <div class="kl-cont-school">STC Bandarawela</div>
                        <div class="kl-cont-badge">Visiting School</div>
                        <div class="kl-cont-count">25+</div>
                        <div class="kl-cont-badge">Friday Arrival (Boarding)</div>
                    </div>
                    <div class="kl-cont-card">
                        <div class="kl-cont-school">STC Prep School</div>
                        <div class="kl-cont-badge">Visiting School</div>
                        <div class="kl-cont-count">25</div>
                        <div class="kl-cont-badge">Saturday Morning Arrival</div>
                    </div>
                    <div class="kl-cont-card">
                        <div class="kl-cont-school">Bishop's College</div>
                        <div class="kl-cont-badge">Invited Girls' School</div>
                        <div class="kl-cont-count">25</div>
                        <div class="kl-cont-badge">Saturday Arrival</div>
                    </div>
                    <div class="kl-cont-card">
                        <div class="kl-cont-school">Ladies' College</div>
                        <div class="kl-cont-badge">Invited Girls' School</div>
                        <div class="kl-cont-count">25</div>
                        <div class="kl-cont-badge">Saturday Arrival</div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ═════════════════════════ CAMPSITE MAP ═════════════════ --}}
        <section class="kl-section-alt">
            <div class="kl-inner">
                <div class="kl-section-hd centered">
                    <span class="kl-rule"></span>
                    <span class="kl-section-label">Site Planning</span>
                    <h2 class="kl-section-title">Campsite Layout & Zoning Map</h2>
                    <p class="kl-section-desc">Zoning map for the grounds & sports complex. Arrivals and tent pitching will
                        follow the allocated sectors below.</p>
                </div>

                <div class="row align-items-center">
                    <div class="col-lg-7 mb-4 mb-lg-0">
                        <div class="kl-map-card">
                            <div class="kl-map-img-wrap">
                                <img src="{{ asset('images/kindling_campsite_map.png') }}" alt="Campsite Zoning Map" />
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <h3 style="color:var(--kl-navy); font-weight:700; font-size:1.2rem; margin-bottom:12px;">Campsite
                            Layout Details</h3>
                        <p style="color:var(--kl-muted); font-size:0.9rem; line-height:1.7; margin-bottom:24px;">To
                            accommodate up to 150+ participants safely, the STC Mount Lavinia Grounds have been structured
                            into designated zones. Specific activities and camp setups will follow the layout below.</p>
                        <div class="kl-legend">
                            <div class="kl-legend-item" style="border-color:#3b82f6;">
                                <span class="kl-legend-text"><strong>Campsites:</strong> Main camping and tent pitching area
                                    (Top)</span>
                            </div>
                            <div class="kl-legend-item" style="border-color:#60a5fa;">
                                <span class="kl-legend-text"><strong>Stalls & Gateway:</strong> Food stalls and entry
                                    gateway (Left)</span>
                            </div>
                            <div class="kl-legend-item" style="border-color:#93c5fd;">
                                <span class="kl-legend-text"><strong>Cub Activities:</strong> Designated zone for Cub Scouts
                                    (Right)</span>
                            </div>
                            <div class="kl-legend-item" style="border-color:#ef4444;">
                                <span class="kl-legend-text"><strong>Stage & Campfire:</strong> Performance arena and
                                    campfire circle (Bottom)</span>
                            </div>
                            <div class="kl-legend-item" style="border-color:#eab308;">
                                <span class="kl-legend-text"><strong>Cricket Pitch:</strong> Main landmark</span>
                            </div>
                            <div class="kl-legend-item" style="border-color:#ca8a04;">
                                <span class="kl-legend-text"><strong>Gym & Pavilion:</strong> Landmark structures and
                                    seating areas</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ═════════════════════════ SCHEDULE ═════════════════════ --}}
        <section class="kl-section">
            <div class="kl-inner">
                <div class="kl-section-hd centered">
                    <span class="kl-rule"></span>
                    <span class="kl-section-label">Run of Show</span>
                    <h2 class="kl-section-title">Detailed Camp Schedule</h2>
                    <p class="kl-section-desc">Full schedule with timings, events, in-charges, and notes. Scroll to explore the schedule or jump to a specific day.</p>
                </div>

                {{-- Day selector (sticky jumpnav) --}}
                <div id="kl-jumpnav" class="sticky top-16 z-40 bg-[#fcf9f8]/95 backdrop-blur-md border-b border-outline-variant/30 shadow-[0_1px_8px_rgba(0,0,0,0.06)] -mx-margin-mobile md:-mx-margin-desktop px-margin-mobile md:px-margin-desktop mb-10">
                    <div class="max-w-container-max mx-auto py-3">
                        <div class="flex items-center overflow-x-auto scrollbar-hide gap-2">
                            <a id="btn-friday" href="#kl-friday" class="kl-day-btn active" onclick="smoothJump(event,'kl-friday')">
                                <span class="material-symbols-outlined" style="font-size:15px; vertical-align:-3px; margin-right:4px;">event</span>Friday – Arrival
                            </a>
                            <a id="btn-saturday" href="#kl-saturday" class="kl-day-btn" onclick="smoothJump(event,'kl-saturday')">
                                <span class="material-symbols-outlined" style="font-size:15px; vertical-align:-3px; margin-right:4px;">wb_sunny</span>Saturday – Main Day
                            </a>
                            <a id="btn-sunday" href="#kl-sunday" class="kl-day-btn" onclick="smoothJump(event,'kl-sunday')">
                                <span class="material-symbols-outlined" style="font-size:15px; vertical-align:-3px; margin-right:4px;">flag</span>Sunday – Closing
                            </a>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-12">
                    {{-- ── FRIDAY ── --}}
                    <div id="kl-friday" class="kl-day-section">
                        <h3 class="text-xl font-bold text-primary mb-4 flex items-center gap-2">
                            <span class="material-symbols-outlined text-secondary">event</span>Friday – Arrival
                        </h3>
                    <div class="kl-table-wrap">
                        <table class="kl-table">
                            <thead>
                                <tr>
                                    <th style="width:150px;">Time</th>
                                    <th>Event</th>
                                    <th style="width:220px;">In-Charge</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="kl-td-time">04:00 PM</td>
                                    <td class="kl-td-event">Scouts Arrival</td>
                                    <td>
                                        <div class="kl-td-incharge">
                                            <span class="kl-person-chip"><span class="kl-chip-dot"></span>Ahmed</span>
                                            <span class="kl-person-chip"><span class="kl-chip-dot"></span>Thanushkhan</span>
                                        </div>
                                    </td>
                                    <td class="kl-td-notes">—</td>
                                </tr>
                                <tr>
                                    <td class="kl-td-time">04:30 PM</td>
                                    <td class="kl-td-event">Tea</td>
                                    <td>
                                        <div class="kl-td-incharge">
                                            <span class="kl-person-chip"><span class="kl-chip-dot"></span>Yukhapriyan</span>
                                            <span class="kl-person-chip"><span class="kl-chip-dot"></span>Aakarsan</span>
                                        </div>
                                    </td>
                                    <td class="kl-td-notes">—</td>
                                </tr>
                                <tr class="kl-row-milestone">
                                    <td class="kl-td-time">05:00 – 07:00 PM</td>
                                    <td class="kl-td-event">Campsite Preparation</td>
                                    <td>
                                        <div class="kl-td-incharge">
                                            <span class="kl-person-chip"><span class="kl-chip-dot"></span>Ramika</span>
                                            <span class="kl-person-chip"><span class="kl-chip-dot"></span>Inesh</span>
                                        </div>
                                    </td>
                                    <td class="kl-td-notes">Gateway, Fence, Flagpole and a Cloth Rack</td>
                                </tr>
                                <tr>
                                    <td class="kl-td-time">07:00 – 08:00 PM</td>
                                    <td class="kl-td-event">Dinner</td>
                                    <td>
                                        <div class="kl-td-incharge">
                                            <span class="kl-person-chip"><span class="kl-chip-dot"></span>Yukhapriyan</span>
                                            <span class="kl-person-chip"><span class="kl-chip-dot"></span>Aakarsan</span>
                                        </div>
                                    </td>
                                    <td class="kl-td-notes">—</td>
                                </tr>
                                <tr>
                                    <td class="kl-td-time">08:00 PM</td>
                                    <td class="kl-td-event">Lights Out</td>
                                    <td>
                                        <div class="kl-td-incharge">
                                            <span class="kl-person-chip"><span class="kl-chip-dot"></span>Sassvinth</span>
                                            <span class="kl-person-chip"><span class="kl-chip-dot"></span>Abikash</span>
                                        </div>
                                    </td>
                                    <td class="kl-td-notes">—</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- ── SATURDAY ── --}}
                <div id="kl-saturday" class="kl-day-section">
                    <h3 class="text-xl font-bold text-primary mb-4 flex items-center gap-2">
                        <span class="material-symbols-outlined text-secondary">wb_sunny</span>Saturday – Main Day
                    </h3>
                    <div class="kl-table-wrap">
                        <table class="kl-table">
                            <thead>
                                <tr>
                                    <th style="width:150px;">Time</th>
                                    <th>Event</th>
                                    <th style="width:220px;">In-Charge</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="kl-td-time">06:30 AM</td>
                                    <td class="kl-td-event">Wake Up</td>
                                    <td>
                                        <div class="kl-td-incharge">
                                            <span class="kl-person-chip"><span class="kl-chip-dot"></span>Hashwanth</span>
                                            <span class="kl-person-chip"><span class="kl-chip-dot"></span>Cantha</span>
                                        </div>
                                    </td>
                                    <td class="kl-td-notes">—</td>
                                </tr>
                                <tr>
                                    <td class="kl-td-time">07:00 – 07:30 AM</td>
                                    <td class="kl-td-event">Breakfast</td>
                                    <td>
                                        <div class="kl-td-incharge">
                                            <span class="kl-person-chip"><span class="kl-chip-dot"></span>Yukhapriyan</span>
                                            <span class="kl-person-chip"><span class="kl-chip-dot"></span>Aakarsan</span>
                                        </div>
                                    </td>
                                    <td class="kl-td-notes">—</td>
                                </tr>
                                <tr>
                                    <td class="kl-td-time">07:30 – 08:00 AM</td>
                                    <td class="kl-td-event">Preparation for Opening Rally</td>
                                    <td>
                                        <div class="kl-td-incharge">
                                            <span class="kl-person-chip"><span class="kl-chip-dot"></span>Thanushkhan</span>
                                            <span class="kl-person-chip"><span class="kl-chip-dot"></span>Inesh</span>
                                        </div>
                                    </td>
                                    <td class="kl-td-notes">—</td>
                                </tr>
                                <tr class="kl-row-milestone">
                                    <td class="kl-td-time">08:00 – 09:00 AM</td>
                                    <td class="kl-td-event">Opening Ceremony</td>
                                    <td>
                                        <div class="kl-td-incharge">
                                            <span class="kl-person-chip"><span class="kl-chip-dot"></span>Thenu</span>
                                            <span class="kl-person-chip"><span class="kl-chip-dot"></span>Jaison</span>
                                        </div>
                                    </td>
                                    <td class="kl-td-notes">—</td>
                                </tr>
                                <tr>
                                    <td class="kl-td-time">09:00 AM – 01:30 PM</td>
                                    <td class="kl-td-event">Activities – Scouts, Guides & Cub Scouts</td>
                                    <td>
                                        <div class="kl-td-incharge">
                                            <span class="kl-person-chip"><span class="kl-chip-dot"></span>Adchayan</span>
                                            <span class="kl-person-chip"><span class="kl-chip-dot"></span>Michael</span>
                                        </div>
                                    </td>
                                    <td class="kl-td-notes">—</td>
                                </tr>
                                <tr>
                                    <td class="kl-td-time">01:30 – 02:30 PM</td>
                                    <td class="kl-td-event">Lunch + Shower</td>
                                    <td>
                                        <div class="kl-td-incharge">
                                            <span class="kl-person-chip"><span class="kl-chip-dot"></span>Thanushkhan</span>
                                            <span class="kl-person-chip"><span class="kl-chip-dot"></span>Yukhapriyan</span>
                                        </div>
                                    </td>
                                    <td class="kl-td-notes">—</td>
                                </tr>
                                <tr>
                                    <td class="kl-td-time">02:30 – 05:00 PM</td>
                                    <td class="kl-td-event">Scouts & Guides Activity II</td>
                                    <td>
                                        <div class="kl-td-incharge">
                                            <span class="kl-person-chip"><span class="kl-chip-dot"></span>Thanushkhan</span>
                                            <span class="kl-person-chip"><span class="kl-chip-dot"></span>Hashwanth</span>
                                        </div>
                                    </td>
                                    <td class="kl-td-notes">—</td>
                                </tr>
                                <tr>
                                    <td class="kl-td-time">05:00 – 06:00 PM</td>
                                    <td class="kl-td-event">Free Time / Campfire Preparation</td>
                                    <td>
                                        <div class="kl-td-incharge">
                                            <span class="kl-person-chip"><span class="kl-chip-dot"></span>Thanushkhan</span>
                                            <span class="kl-person-chip"><span class="kl-chip-dot"></span>Inesh</span>
                                        </div>
                                    </td>
                                    <td class="kl-td-notes">—</td>
                                </tr>
                                <tr class="kl-row-milestone">
                                    <td class="kl-td-time">06:00 – 07:00 PM</td>
                                    <td class="kl-td-event">Campfire</td>
                                    <td>
                                        <div class="kl-td-incharge">
                                            <span class="kl-person-chip"><span class="kl-chip-dot"></span>Ahmed</span>
                                            <span class="kl-person-chip"><span class="kl-chip-dot"></span>Binduhewa</span>
                                        </div>
                                    </td>
                                    <td class="kl-td-notes">—</td>
                                </tr>
                                <tr>
                                    <td class="kl-td-time">07:00 – 08:00 PM</td>
                                    <td class="kl-td-event">Dinner</td>
                                    <td>
                                        <div class="kl-td-incharge">
                                            <span class="kl-person-chip"><span class="kl-chip-dot"></span>Yukhapriyan</span>
                                            <span class="kl-person-chip"><span class="kl-chip-dot"></span>Aakarsan</span>
                                        </div>
                                    </td>
                                    <td class="kl-td-notes">—</td>
                                </tr>
                                <tr>
                                    <td class="kl-td-time">08:00 – 10:00 PM</td>
                                    <td class="kl-td-event">Movie</td>
                                    <td>
                                        <div class="kl-td-incharge">
                                            <span class="kl-person-chip"><span class="kl-chip-dot"></span>Ahmed</span>
                                            <span class="kl-person-chip"><span class="kl-chip-dot"></span>Thanushkhan</span>
                                        </div>
                                    </td>
                                    <td class="kl-td-notes">—</td>
                                </tr>
                                <tr>
                                    <td class="kl-td-time">10:00 PM</td>
                                    <td class="kl-td-event">Guides Depart / Lights Out</td>
                                    <td>
                                        <div class="kl-td-incharge">
                                            <span class="kl-person-chip"><span class="kl-chip-dot"></span>Thanushkhan</span>
                                            <span class="kl-person-chip"><span class="kl-chip-dot"></span>Karthik</span>
                                        </div>
                                    </td>
                                    <td class="kl-td-notes">—</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- ── SUNDAY ── --}}
                <div id="kl-sunday" class="kl-day-section">
                    <h3 class="text-xl font-bold text-primary mb-4 flex items-center gap-2">
                        <span class="material-symbols-outlined text-secondary">flag</span>Sunday – Closing
                    </h3>
                    <div class="kl-table-wrap">
                        <table class="kl-table">
                            <thead>
                                <tr>
                                    <th style="width:150px;">Time</th>
                                    <th>Event</th>
                                    <th style="width:220px;">In-Charge</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="kl-td-time">06:00 AM</td>
                                    <td class="kl-td-event">Wake Up</td>
                                    <td>
                                        <div class="kl-td-incharge">
                                            <span class="kl-person-chip"><span class="kl-chip-dot"></span>Hashwanth</span>
                                            <span class="kl-person-chip"><span class="kl-chip-dot"></span>Cantha</span>
                                        </div>
                                    </td>
                                    <td class="kl-td-notes">—</td>
                                </tr>
                                <tr>
                                    <td class="kl-td-time">06:30 – 07:00 AM</td>
                                    <td class="kl-td-event">Morning Exercises</td>
                                    <td>
                                        <div class="kl-td-incharge">
                                            <span class="kl-person-chip"><span class="kl-chip-dot"></span>Jaison</span>
                                            <span class="kl-person-chip"><span class="kl-chip-dot"></span>Ryan</span>
                                        </div>
                                    </td>
                                    <td class="kl-td-notes">—</td>
                                </tr>
                                <tr>
                                    <td class="kl-td-time">07:00 – 07:30 AM</td>
                                    <td class="kl-td-event">Breakfast</td>
                                    <td>
                                        <div class="kl-td-incharge">
                                            <span class="kl-person-chip"><span class="kl-chip-dot"></span>Yukhapriyan</span>
                                            <span class="kl-person-chip"><span class="kl-chip-dot"></span>Aakarsan</span>
                                        </div>
                                    </td>
                                    <td class="kl-td-notes">—</td>
                                </tr>
                                <tr class="kl-row-milestone">
                                    <td class="kl-td-time">08:00 AM</td>
                                    <td class="kl-td-event">Closing Rally</td>
                                    <td>
                                        <div class="kl-td-incharge">
                                            <span class="kl-person-chip"><span class="kl-chip-dot"></span>Ahmed</span>
                                            <span class="kl-person-chip"><span class="kl-chip-dot"></span>Karthik</span>
                                        </div>
                                    </td>
                                    <td class="kl-td-notes">—</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                </div> {{-- End flex flex-col gap-12 --}}

            </div>
        </section>



        {{-- ═════════════════════════ DOWNLOADS ════════════════════ --}}
        <section class="kl-section">
            <div class="kl-inner">
                <div class="kl-section-hd centered">
                    <span class="kl-rule"></span>
                    <span class="kl-section-label">Resources</span>
                    <h2 class="kl-section-title">Documents & Downloads</h2>
                    <p class="kl-section-desc">Download invitation letters, confirmation checklists, and catering plans to
                        prepare your contingent for the camp.</p>
                </div>

                <div class="kl-dl-grid">
                    <div class="kl-dl-card">
                        <div class="kl-dl-ico"><i class="far fa-file-pdf"></i></div>
                        <div class="kl-dl-title">Official Invitation Package</div>
                        <p class="kl-dl-desc">Includes the formal invite letter, full agenda, contact directory, and packing
                            list specifications.</p>
                        <a href="{{ asset('scout_docs/kindling-legacy-invitation.pdf') }}" class="kl-dl-btn" download>
                            <i class="fas fa-download"></i> Download PDF
                        </a>
                    </div>
                    <div class="kl-dl-card">
                        <div class="kl-dl-ico"><i class="far fa-file-pdf"></i></div>
                        <div class="kl-dl-title">Mass-Catering Menu Layout</div>
                        <p class="kl-dl-desc">Details the meals provided (Friday dinner to Sunday breakfast), dietary
                            options, and allergen notice info.</p>
                        <a href="{{ asset('scout_docs/kindling-legacy-menu-layout.pdf') }}" class="kl-dl-btn" download>
                            <i class="fas fa-download"></i> Download PDF
                        </a>
                    </div>
                    <div class="kl-dl-card">
                        <div class="kl-dl-ico"><i class="far fa-file-pdf"></i></div>
                        <div class="kl-dl-title">Contingent Confirmation</div>
                        <p class="kl-dl-desc">Sheet for submitting participating scout rosters, emergency contacts, and
                            confirmation details.</p>
                        <a href="{{ asset('scout_docs/kindling-legacy-contingent-confirmation.pdf') }}" class="kl-dl-btn"
                            download>
                            <i class="fas fa-download"></i> Download PDF
                        </a>
                    </div>
                </div>

                <div class="kl-sponsor">
                    <span class="kl-sponsor-label">Strategic Corporate Partner</span>
                    <div class="kl-sponsor-name">John Keells Holdings</div>
                    <div class="kl-sponsor-sub">Supporting Youth Leadership & Scouting Excellence</div>
                </div>
            </div>
        </section>

    </div>

    <script>
        // ── Countdown ────────────────────────────────────────────────
        const klTarget = new Date("July 11, 2026 09:00:00").getTime();
        function klTick() {
            const diff = klTarget - Date.now();
            if (diff < 0) {
                ['kl-days', 'kl-hours', 'kl-mins', 'kl-secs'].forEach(id => {
                    document.getElementById(id).textContent = '00';
                });
                return;
            }
            document.getElementById('kl-days').textContent = String(Math.floor(diff / 86400000)).padStart(2, '0');
            document.getElementById('kl-hours').textContent = String(Math.floor((diff % 86400000) / 3600000)).padStart(2, '0');
            document.getElementById('kl-mins').textContent = String(Math.floor((diff % 3600000) / 60000)).padStart(2, '0');
            document.getElementById('kl-secs').textContent = String(Math.floor((diff % 60000) / 1000)).padStart(2, '0');
        }
        setInterval(klTick, 1000);
        klTick();

        // ── Scroll Spy Jump & Active Highlighting ──────────────────────
        const DAYS = ['friday', 'saturday', 'sunday'];
        const JUMP_NAV_HEIGHT = () => document.getElementById('kl-jumpnav').offsetHeight + 64; // nav bar + jump bar

        function smoothJump(e, dayId) {
            e.preventDefault();
            const el = document.getElementById(dayId);
            if (!el) return;
            const top = el.getBoundingClientRect().top + window.scrollY - JUMP_NAV_HEIGHT() - 12;
            window.scrollTo({ top, behavior: 'smooth' });
        }

        function updateActiveDay() {
            let activeDay = DAYS[0];
            const offset = JUMP_NAV_HEIGHT() + 20;

            for (const d of DAYS) {
                const el = document.getElementById('kl-' + d);
                if (!el) continue;
                if (el.getBoundingClientRect().top <= offset) {
                    activeDay = d;
                }
            }

            DAYS.forEach(d => {
                const btn = document.getElementById('btn-' + d);
                if (btn) btn.classList.toggle('active', d === activeDay);
            });
        }

        document.addEventListener('DOMContentLoaded', updateActiveDay);

        let ticking = false;
        window.addEventListener('scroll', () => {
            if (!ticking) {
                requestAnimationFrame(() => { updateActiveDay(); ticking = false; });
                ticking = true;
            }
        }, { passive: true });
    </script>
@endsection