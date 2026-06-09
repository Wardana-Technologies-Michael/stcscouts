@extends('layouts.master')

@section('title', 'Kindling Legacy Scout Camp 2026 | 16th Colombo Scouts')
@section('meta_description', "Official event portal for the Kindling Legacy Inter-School Scout Camp hosted by S. Thomas' College Mount Lavinia. View schedule, campsite map, trainer spotlight, and download official invite packs.")

@section('content')
<style>
    /* ───── Design tokens ─────────────────────────────────────────────────── */
    :root {
        --kl-navy:   #000a1e;
        --kl-blue:   #002147;
        --kl-gold:   #c9a84c;
        --kl-gold-l: #f0d080;
        --kl-card:   #0d1524;
        --kl-border: rgba(255,255,255,0.09);
    }

    /* ───── Page wrapper ─────────────────────────────────────────────────── */
    .kl-wrap {
        background-color: #080f1c;
        color: #e8edf4;
        font-family: 'Plus Jakarta Sans', sans-serif;
        overflow-x: hidden;
    }

    /* ───── Hero ─────────────────────────────────────────────────────────── */
    .kl-hero {
        position: relative;
        padding: 96px 0 80px;
        background: linear-gradient(160deg, #000a1e 0%, #001533 55%, #0a2040 100%);
        border-bottom: 1px solid rgba(201,168,76,0.25);
        overflow: hidden;
    }
    .kl-hero::before {
        content: '';
        position: absolute; inset: 0;
        background-image: radial-gradient(circle at 25% 50%, rgba(201,168,76,0.08) 0%, transparent 60%),
                          radial-gradient(circle at 75% 20%, rgba(0,33,71,0.6) 0%, transparent 55%);
        pointer-events: none;
    }
    /* Dot-grid overlay */
    .kl-hero::after {
        content: '';
        position: absolute; inset: 0;
        background-image: radial-gradient(circle, rgba(255,255,255,0.04) 1px, transparent 1px);
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
    @media (max-width: 768px) { .kl-hero-inner { padding: 0 16px; } }

    .kl-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(201,168,76,0.12);
        border: 1px solid rgba(201,168,76,0.3);
        border-radius: 9999px;
        padding: 6px 18px;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.14em;
        text-transform: uppercase;
        color: var(--kl-gold);
        margin-bottom: 24px;
    }
    .kl-hero h1 {
        font-size: clamp(2.5rem, 6vw, 4rem);
        font-weight: 800;
        letter-spacing: -0.03em;
        line-height: 1.05;
        color: #fff;
        margin-bottom: 8px;
    }
    .kl-hero h1 span { color: var(--kl-gold); }
    .kl-hero-sub {
        font-size: 1rem;
        color: rgba(255,255,255,0.5);
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
        background: rgba(255,255,255,0.06);
        border: 1px solid var(--kl-border);
        border-radius: 14px;
        width: 90px;
        padding: 14px 8px;
        text-align: center;
        backdrop-filter: blur(12px);
        transition: border-color 0.25s;
    }
    .kl-cd-card:hover { border-color: rgba(201,168,76,0.4); }
    .kl-cd-val {
        display: block;
        font-size: 2rem;
        font-weight: 800;
        color: var(--kl-gold);
        line-height: 1.15;
        letter-spacing: -0.02em;
    }
    .kl-cd-lbl {
        font-size: 10px;
        font-weight: 600;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: rgba(255,255,255,0.35);
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
        background: rgba(255,255,255,0.07);
        border: 1px solid var(--kl-border);
        border-radius: 12px;
        padding: 14px 20px;
        text-align: center;
        min-width: 100px;
    }
    .kl-stat-num { font-size: 1.6rem; font-weight: 800; color: #fff; line-height: 1; }
    .kl-stat-lbl { font-size: 11px; font-weight: 600; letter-spacing: 0.08em; text-transform: uppercase; color: rgba(255,255,255,0.4); margin-top: 4px; }

    /* ───── Section system ───────────────────────────────────────────────── */
    .kl-section {
        padding: 80px 0;
        background: #080f1c;
    }
    .kl-section-alt {
        padding: 80px 0;
        background: #060c18;
    }
    .kl-inner {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 48px;
    }
    @media (max-width: 768px) { .kl-inner { padding: 0 16px; } }

    /* Section header */
    .kl-section-hd {
        margin-bottom: 52px;
    }
    .kl-section-hd.centered { text-align: center; }
    .kl-section-label {
        display: inline-block;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.14em;
        text-transform: uppercase;
        color: var(--kl-gold);
        margin-bottom: 10px;
    }
    .kl-section-title {
        font-size: clamp(1.6rem, 3vw, 2.2rem);
        font-weight: 800;
        color: #fff;
        letter-spacing: -0.025em;
        line-height: 1.15;
        margin-bottom: 12px;
    }
    .kl-section-desc {
        font-size: 0.95rem;
        color: rgba(255,255,255,0.45);
        line-height: 1.7;
        max-width: 600px;
    }
    .kl-section-hd.centered .kl-section-desc { margin: 0 auto; }

    /* Gold rule */
    .kl-rule {
        display: block;
        width: 36px;
        height: 3px;
        background: var(--kl-gold);
        border-radius: 99px;
        margin-bottom: 14px;
    }
    .kl-section-hd.centered .kl-rule { margin-left: auto; margin-right: auto; }

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
        transition: all 0.3s cubic-bezier(0.4,0,0.2,1);
    }
    .kl-cont-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 3px;
        background: rgba(255,255,255,0.1);
    }
    .kl-cont-card.host::before {
        background: linear-gradient(90deg, var(--kl-blue), var(--kl-gold));
    }
    .kl-cont-card:hover {
        transform: translateY(-6px);
        border-color: rgba(201,168,76,0.25);
        box-shadow: 0 16px 40px rgba(0,0,0,0.4);
    }
    .kl-cont-school {
        font-size: 1rem;
        font-weight: 700;
        color: #fff;
        margin-bottom: 8px;
        line-height: 1.3;
    }
    .kl-cont-count {
        font-size: 2.8rem;
        font-weight: 800;
        color: var(--kl-gold);
        line-height: 1;
        margin: 14px 0;
        letter-spacing: -0.03em;
    }
    .kl-cont-badge {
        display: inline-block;
        font-size: 0.78rem;
        color: rgba(255,255,255,0.45);
        background: rgba(0,0,0,0.25);
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
        box-shadow: 0 12px 40px rgba(0,0,0,0.35);
    }
    .kl-map-img-wrap {
        border-radius: 12px;
        overflow: hidden;
        border: 1px solid rgba(255,255,255,0.07);
    }
    .kl-map-img-wrap img {
        width: 100%;
        display: block;
        transition: transform 0.5s ease;
    }
    .kl-map-img-wrap:hover img { transform: scale(1.03); }
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
        background: rgba(0,0,0,0.2);
        padding: 10px 14px;
        border-radius: 10px;
        border-left: 3px solid;
    }
    .kl-legend-text {
        font-size: 0.85rem;
        color: rgba(255,255,255,0.75);
        font-weight: 500;
        line-height: 1.3;
    }

    /* ───── Schedule / Timeline ──────────────────────────────────────────── */
    .kl-day-nav {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        margin-bottom: 40px;
    }
    .kl-day-btn {
        padding: 10px 26px;
        border-radius: 9999px;
        border: 1.5px solid var(--kl-border);
        background: rgba(255,255,255,0.04);
        color: rgba(255,255,255,0.5);
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.25s ease;
    }
    .kl-day-btn:hover:not(.active) {
        border-color: rgba(201,168,76,0.4);
        color: #fff;
    }
    .kl-day-btn.active {
        background: var(--kl-gold);
        border-color: var(--kl-gold);
        color: #080f1c;
        box-shadow: 0 4px 18px rgba(201,168,76,0.35);
    }

    /* Schedule table */
    .kl-schedule { display: none; }
    .kl-schedule.active {
        display: block;
        animation: klfadeUp 0.35s ease forwards;
    }

    @keyframes klfadeUp {
        from { opacity:0; transform:translateY(10px); }
        to   { opacity:1; transform:translateY(0); }
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
        background: rgba(201,168,76,0.12);
        color: var(--kl-gold);
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        padding: 14px 20px;
        text-align: left;
        border-bottom: 1px solid rgba(201,168,76,0.2);
    }
    .kl-table tbody tr {
        border-bottom: 1px solid rgba(255,255,255,0.05);
        transition: background 0.2s;
    }
    .kl-table tbody tr:last-child { border-bottom: none; }
    .kl-table tbody tr:hover { background: rgba(255,255,255,0.03); }
    .kl-table tbody td {
        padding: 16px 20px;
        vertical-align: middle;
        font-size: 14px;
        color: rgba(255,255,255,0.75);
        line-height: 1.45;
    }
    .kl-td-time {
        font-weight: 700;
        color: var(--kl-gold);
        white-space: nowrap;
        font-size: 13px;
        letter-spacing: 0.02em;
    }
    .kl-td-event {
        color: #e8edf4;
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
        background: rgba(255,255,255,0.06);
        border: 1px solid rgba(255,255,255,0.1);
        border-radius: 9999px;
        padding: 3px 11px 3px 8px;
        font-size: 12px;
        font-weight: 600;
        color: rgba(255,255,255,0.7);
        white-space: nowrap;
    }
    .kl-person-chip .kl-chip-dot {
        width: 6px; height: 6px;
        border-radius: 50%;
        background: var(--kl-gold);
        flex-shrink: 0;
    }
    .kl-td-notes {
        font-size: 12.5px;
        color: rgba(255,255,255,0.38);
        font-style: italic;
    }

    /* Milestone row highlight */
    .kl-row-milestone td { background: rgba(201,168,76,0.06); }
    .kl-row-milestone .kl-td-event { color: var(--kl-gold-l); }

    /* Responsive table */
    @media (max-width: 640px) {
        .kl-table thead { display: none; }
        .kl-table tbody tr { display: block; padding: 14px 16px; border-bottom: 1px solid rgba(255,255,255,0.06); }
        .kl-table tbody td { display: block; padding: 3px 0; border: none; }
        .kl-td-time { font-size: 12px; margin-bottom: 4px; }
        .kl-td-event { margin-bottom: 6px; }
    }

    /* ───── Trainer Spotlight ────────────────────────────────────────────── */
    .kl-spotlight {
        background: linear-gradient(135deg, rgba(13,21,36,0.95) 0%, rgba(6,12,24,0.95) 100%);
        border: 1px solid var(--kl-border);
        border-radius: 22px;
        padding: 40px;
        display: flex;
        gap: 32px;
        align-items: center;
        flex-direction: column;
    }
    @media (min-width: 768px) { .kl-spotlight { flex-direction: row; } }
    .kl-spotlight-avatar {
        width: 130px; height: 130px;
        border-radius: 50%;
        border: 3px solid var(--kl-gold);
        background: #1a2840;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.8rem;
        color: var(--kl-gold);
        flex-shrink: 0;
        box-shadow: 0 0 0 6px rgba(201,168,76,0.12);
    }
    .kl-spotlight-name {
        font-size: 1.5rem; font-weight: 800; color: #fff; margin-bottom: 4px;
    }
    .kl-spotlight-role {
        font-size: 0.8rem; font-weight: 700; letter-spacing: 0.12em;
        text-transform: uppercase; color: var(--kl-gold); margin-bottom: 14px;
    }
    .kl-spotlight-bio {
        font-size: 0.93rem; color: rgba(255,255,255,0.5); line-height: 1.7;
    }

    /* ───── Safety Card ──────────────────────────────────────────────────── */
    .kl-safety {
        background: linear-gradient(135deg, rgba(185,28,28,0.12) 0%, rgba(127,29,29,0.05) 100%);
        border: 1px solid rgba(239,68,68,0.25);
        border-radius: 22px;
        padding: 36px;
    }
    .kl-safety-title {
        font-size: 1.1rem; font-weight: 800; color: #f87171;
        display: flex; align-items: center; gap: 10px; margin-bottom: 22px;
    }
    .kl-safety ul { list-style: none; padding: 0; margin: 0; }
    .kl-safety ul li {
        position: relative; padding-left: 24px;
        margin-bottom: 16px; font-size: 0.9rem;
        color: rgba(255,255,255,0.7); line-height: 1.6;
    }
    .kl-safety ul li::before {
        content: '';
        position: absolute; left: 0; top: 8px;
        width: 8px; height: 8px;
        border-radius: 50%;
        background: #f87171;
    }

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
        display: flex; flex-direction: column;
        transition: all 0.3s ease;
    }
    .kl-dl-card:hover {
        transform: translateY(-5px);
        border-color: rgba(25,135,84,0.4);
        box-shadow: 0 12px 32px rgba(0,0,0,0.35);
    }
    .kl-dl-ico {
        font-size: 2.2rem; color: var(--kl-gold); margin-bottom: 18px;
    }
    .kl-dl-title {
        font-size: 1rem; font-weight: 700; color: #fff; margin-bottom: 8px;
    }
    .kl-dl-desc {
        font-size: 0.85rem; color: rgba(255,255,255,0.4); line-height: 1.6; flex-grow: 1; margin-bottom: 20px;
    }
    .kl-dl-btn {
        display: inline-flex; align-items: center; gap: 8px;
        background: #0f5132; border: none; color: #fff;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 13px; font-weight: 700;
        padding: 10px 18px; border-radius: 9px;
        text-decoration: none; transition: all 0.25s;
        align-self: flex-start;
    }
    .kl-dl-btn:hover {
        background: #198754; color: #fff;
        box-shadow: 0 4px 14px rgba(25,135,84,0.35);
    }

    /* ───── Sponsor Card ─────────────────────────────────────────────────── */
    .kl-sponsor {
        background: #fff;
        border-radius: 20px;
        padding: 40px;
        text-align: center;
        max-width: 540px;
        margin: 48px auto 0;
        box-shadow: 0 12px 40px rgba(0,0,0,0.4);
    }
    .kl-sponsor-label {
        font-size: 10px; font-weight: 700; letter-spacing: 0.18em;
        text-transform: uppercase; color: #64748b; display: block; margin-bottom: 20px;
    }
    .kl-sponsor-name {
        font-size: 2rem; font-weight: 800; color: #0f172a;
        letter-spacing: -0.02em; margin-bottom: 6px;
    }
    .kl-sponsor-sub {
        font-size: 0.9rem; color: #64748b; font-weight: 500;
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
                    <div class="kl-stat-num">800+</div>
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
                <p class="kl-section-desc">Hosted by S. Thomas' College, Mount Lavinia. Bringing together Scouts, Guides, and Cub Scouts from premier schools across the island for approximately 800 participants.</p>
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
                <p class="kl-section-desc">Zoning map for the grounds & sports complex. Arrivals and tent pitching will follow the allocated sectors below.</p>
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
                    <h3 style="color:#fff; font-weight:700; font-size:1.2rem; margin-bottom:12px;">Zoning Details</h3>
                    <p style="color:rgba(255,255,255,0.45); font-size:0.9rem; line-height:1.7; margin-bottom:24px;">To accommodate up to 800 participants safely, the STC Mount Lavinia Grounds and Sports Complex have been structured into distinct zones. Specific arrivals will proceed to their allocated camping sectors or boarding blocks.</p>
                    <div class="kl-legend">
                        <div class="kl-legend-item" style="border-color:#3b82f6;">
                            <span class="kl-legend-text"><strong>Zone A:</strong> STC ML Host Camping Area</span>
                        </div>
                        <div class="kl-legend-item" style="border-color:#22c55e;">
                            <span class="kl-legend-text"><strong>Zone B:</strong> Visiting Boys' Schools Camping</span>
                        </div>
                        <div class="kl-legend-item" style="border-color:#ec4899;">
                            <span class="kl-legend-text"><strong>Zone C:</strong> Invited Girls' Schools Hub</span>
                        </div>
                        <div class="kl-legend-item" style="border-color:#eab308;">
                            <span class="kl-legend-text"><strong>Zone D:</strong> Main Staging & Activities</span>
                        </div>
                        <div class="kl-legend-item" style="border-color:#f97316;">
                            <span class="kl-legend-text"><strong>Boarding:</strong> Guru & Banda Overnight Stay</span>
                        </div>
                        <div class="kl-legend-item" style="border-color:#a855f7;">
                            <span class="kl-legend-text"><strong>Dining Hall:</strong> Mass Catering & Vendor Stalls</span>
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
                <p class="kl-section-desc">Full schedule with timings, events, in-charges, and notes. Select a day to view its programme.</p>
            </div>

            {{-- Day selector --}}
            <div class="kl-day-nav">
                <button class="kl-day-btn active" onclick="klSwitchDay('friday', this)">
                    <span class="material-symbols-outlined" style="font-size:15px; vertical-align:-3px; margin-right:4px;">event</span>Friday – Arrival
                </button>
                <button class="kl-day-btn" onclick="klSwitchDay('saturday', this)">
                    <span class="material-symbols-outlined" style="font-size:15px; vertical-align:-3px; margin-right:4px;">wb_sunny</span>Saturday – Main Day
                </button>
                <button class="kl-day-btn" onclick="klSwitchDay('sunday', this)">
                    <span class="material-symbols-outlined" style="font-size:15px; vertical-align:-3px; margin-right:4px;">flag</span>Sunday – Closing
                </button>
            </div>

            {{-- ── FRIDAY ── --}}
            <div id="kl-friday" class="kl-schedule active">
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
            <div id="kl-saturday" class="kl-schedule">
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
            <div id="kl-sunday" class="kl-schedule">
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

        </div>
    </section>

    {{-- ═════════════════════════ TRAINER + SAFETY ════════════ --}}
    <section class="kl-section-alt">
        <div class="kl-inner">
            <div class="row">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="kl-section-hd" style="margin-bottom:28px;">
                        <span class="kl-rule"></span>
                        <span class="kl-section-label">Spotlight</span>
                        <h2 class="kl-section-title" style="font-size:1.6rem;">Trainer Spotlight</h2>
                    </div>
                    <div class="kl-spotlight">
                        <div class="kl-spotlight-avatar">
                            <span class="material-symbols-outlined" style="font-size:3rem;">person</span>
                        </div>
                        <div>
                            <div class="kl-spotlight-name">Mr. Geeth Ramesh</div>
                            <div class="kl-spotlight-role">Lead Campfire & Skills Trainer</div>
                            <p class="kl-spotlight-bio">We are honoured to introduce Mr. Geeth Ramesh as the main training officer for Kindling Legacy 2026. He will lead Saturday's comprehensive badge training session, focusing on campfire skills, performance preparation, and advanced scouting techniques.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="kl-section-hd" style="margin-bottom:28px;">
                        <span class="kl-rule" style="background:#f87171;"></span>
                        <span class="kl-section-label" style="color:#f87171;">Important</span>
                        <h2 class="kl-section-title" style="font-size:1.6rem; color:#f87171;">Campfire Safety & Rules</h2>
                    </div>
                    <div class="kl-safety">
                        <div class="kl-safety-title">
                            <span class="material-symbols-outlined">warning</span>
                            Mandatory Safety Guidelines
                        </div>
                        <ul>
                            <li><strong>3-Metre Clearance Zone:</strong> A strict 3-metre safety perimeter must be kept clear around the campfire ring at all times. Only designated fire crew are allowed inside this zone.</li>
                            <li><strong>Lawn Staging Protection:</strong> The campfire firebed will be elevated on raised steel/staging structures to protect the grass and lawn surfaces from fire damage.</li>
                            <li><strong>Safety Marshals:</strong> Senior safety marshals will be positioned around the circle perimeter. All instructions from marshals must be followed immediately.</li>
                            <li><strong>Emergency Standby:</strong> Fire extinguishers, sand buckets, water hoses, and a first aid station will be on standby next to the campfire site.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ═════════════════════════ DOWNLOADS ════════════════════ --}}
    <section class="kl-section">
        <div class="kl-inner">
            <div class="kl-section-hd centered">
                <span class="kl-rule"></span>
                <span class="kl-section-label">Resources</span>
                <h2 class="kl-section-title">Documents & Downloads</h2>
                <p class="kl-section-desc">Download invitation letters, confirmation checklists, and catering plans to prepare your contingent for the camp.</p>
            </div>

            <div class="kl-dl-grid">
                <div class="kl-dl-card">
                    <div class="kl-dl-ico"><i class="far fa-file-pdf"></i></div>
                    <div class="kl-dl-title">Official Invitation Package</div>
                    <p class="kl-dl-desc">Includes the formal invite letter, full agenda, contact directory, and packing list specifications.</p>
                    <a href="{{ asset('scout_docs/kindling-legacy-invitation.pdf') }}" class="kl-dl-btn" download>
                        <i class="fas fa-download"></i> Download PDF
                    </a>
                </div>
                <div class="kl-dl-card">
                    <div class="kl-dl-ico"><i class="far fa-file-pdf"></i></div>
                    <div class="kl-dl-title">Mass-Catering Menu Layout</div>
                    <p class="kl-dl-desc">Details the meals provided (Friday dinner to Sunday breakfast), dietary options, and allergen notice info.</p>
                    <a href="{{ asset('scout_docs/kindling-legacy-menu-layout.pdf') }}" class="kl-dl-btn" download>
                        <i class="fas fa-download"></i> Download PDF
                    </a>
                </div>
                <div class="kl-dl-card">
                    <div class="kl-dl-ico"><i class="far fa-file-pdf"></i></div>
                    <div class="kl-dl-title">Contingent Confirmation</div>
                    <p class="kl-dl-desc">Sheet for submitting participating scout rosters, emergency contacts, and confirmation details.</p>
                    <a href="{{ asset('scout_docs/kindling-legacy-contingent-confirmation.pdf') }}" class="kl-dl-btn" download>
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
    const klTarget = new Date("October 16, 2026 09:00:00").getTime();
    function klTick() {
        const diff = klTarget - Date.now();
        if (diff < 0) {
            ['kl-days','kl-hours','kl-mins','kl-secs'].forEach(id => {
                document.getElementById(id).textContent = '00';
            });
            return;
        }
        document.getElementById('kl-days').textContent  = String(Math.floor(diff / 86400000)).padStart(2,'0');
        document.getElementById('kl-hours').textContent = String(Math.floor((diff % 86400000) / 3600000)).padStart(2,'0');
        document.getElementById('kl-mins').textContent  = String(Math.floor((diff % 3600000) / 60000)).padStart(2,'0');
        document.getElementById('kl-secs').textContent  = String(Math.floor((diff % 60000) / 1000)).padStart(2,'0');
    }
    setInterval(klTick, 1000);
    klTick();

    // ── Day switcher ─────────────────────────────────────────────
    function klSwitchDay(day, btn) {
        document.querySelectorAll('.kl-schedule').forEach(s => s.classList.remove('active'));
        document.querySelectorAll('.kl-day-btn').forEach(b => b.classList.remove('active'));
        document.getElementById('kl-' + day).classList.add('active');
        btn.classList.add('active');
    }
</script>
@endsection
