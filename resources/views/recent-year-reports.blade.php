@extends('layouts.master')

@section('content')

    {{-- ═══════════════════════════════ PAGE-SPECIFIC STYLES ═══════════════════════════════ --}}
    <style>
        /* ── Scrollbar hide ───────────────────────────────────────── */
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide { -ms-overflow-style:none; scrollbar-width:none; }

        /* ── Jump-nav buttons ─────────────────────────────────────── */
        .ryr-tab,
        .ryr-tab:link,
        .ryr-tab:visited {
            flex-shrink: 0;
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
        .ryr-tab:hover {
            color: #000a1e;
            background: rgba(0,10,30,0.06);
        }
        .ryr-tab.active,
        .ryr-tab.active:link,
        .ryr-tab.active:visited {
            background: #000a1e;
            color: #fff;
            box-shadow: 0 2px 10px rgba(0,10,30,0.22);
        }

        /* ── Scroll offset so sticky bar doesn't cover the heading ── */
        .ryr-section {
            scroll-margin-top: 88px; /* nav (64px) + jump-bar (≈40px) + breathing room */
        }

        /* ── Era divider ──────────────────────────────────────────── */
        .ryr-era-divider {
            border: none;
            border-top: 1.5px solid rgba(0,10,30,0.07);
            margin: 56px 0 0 0;
        }

        /* ── Timeline layout ──────────────────────────────────────── */
        .ryr-timeline {
            display: flex;
            flex-direction: column;
            gap: 0;
        }
        .ryr-entry {
            display: grid;
            grid-template-columns: 130px 1fr;
            position: relative;
        }
        @media (max-width: 640px) {
            .ryr-entry { grid-template-columns: 80px 1fr; }
        }

        /* Vertical connector line */
        .ryr-entry:not(.ryr-last)::after {
            content: '';
            position: absolute;
            left: 51px;
            top: 64px;
            bottom: 0;
            width: 2px;
            background: linear-gradient(to bottom, rgba(0,10,30,0.12) 0%, rgba(0,10,30,0.02) 100%);
        }
        @media (max-width: 640px) {
            .ryr-entry:not(.ryr-last)::after { left: 31px; }
        }

        /* ── Year node (left column) ──────────────────────────────── */
        .ryr-node {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 18px;
            padding-right: 20px;
            gap: 5px;
        }
        .ryr-dot {
            width: 46px;
            height: 46px;
            border-radius: 50%;
            background: #000a1e;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 14px rgba(0,10,30,0.22);
            flex-shrink: 0;
        }
        .ryr-dot .ryr-dot-icon {
            font-size: 18px !important;
            color: #fff;
        }
        .ryr-year-num {
            font-size: 20px;
            font-weight: 800;
            color: #000a1e;
            letter-spacing: -0.03em;
            line-height: 1;
        }
        .ryr-count-label {
            font-size: 10px;
            color: #8a9bab;
            font-weight: 500;
        }

        /* ── Report chips (right column) ─────────────────────────── */
        .ryr-chips {
            padding: 22px 16px 30px 20px;
            border-left: 2px solid rgba(0,10,30,0.07);
            display: flex;
            flex-wrap: wrap;
            align-content: flex-start;
            gap: 8px;
        }
        .ryr-chip {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 8px 15px 8px 11px;
            border-radius: 9999px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            border: 1.5px solid;
            transition: all 0.2s ease;
            line-height: 1.2;
        }
        .ryr-chip .chip-ico {
            font-size: 15px !important;
            line-height: 1 !important;
            flex-shrink: 0;
        }

        /* Report chip (annual report) */
        .ryr-chip-report {
            border-color: rgba(0,10,30,0.16);
            color: #3d5069;
            background: #fff;
        }
        .ryr-chip-report:hover {
            border-color: #000a1e;
            color: #000a1e;
            background: rgba(0,10,30,0.04);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,10,30,0.1);
        }

        /* Event chip (jamborees, special events) */
        .ryr-chip-event {
            border-color: rgba(14, 65, 148, 0.22);
            color: #0e4194;
            background: rgba(14, 65, 148, 0.05);
        }
        .ryr-chip-event:hover {
            border-color: #0e4194;
            color: #0e4194;
            background: rgba(14, 65, 148, 0.1);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(14,65,148,0.15);
        }

        /* ── Range header ─────────────────────────────────────────── */
        .ryr-range-header {
            padding: 40px 0 36px 0;
        }
        .ryr-range-header:first-child {
            padding-top: 0;
        }
        .ryr-range-label {
            font-size: 28px;
            font-weight: 800;
            color: #000a1e;
            letter-spacing: -0.03em;
            line-height: 1.1;
        }
        .ryr-range-desc {
            font-size: 14px;
            color: #50606f;
            margin-top: 6px;
            max-width: 560px;
            line-height: 1.6;
        }
        .ryr-range-rule {
            display: block;
            width: 40px;
            height: 3px;
            background: #000a1e;
            border-radius: 99px;
            margin-bottom: 12px;
        }

        /* ── Fade-in on scroll ────────────────────────────────────── */
        @keyframes ryrFadeUp {
            from { opacity: 0; transform: translateY(14px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .ryr-section {
            animation: ryrFadeUp 0.4s ease both;
        }
        /* Stagger each section slightly */
        .ryr-section:nth-child(1) { animation-delay: 0.05s; }
        .ryr-section:nth-child(2) { animation-delay: 0.10s; }
        .ryr-section:nth-child(3) { animation-delay: 0.15s; }
        .ryr-section:nth-child(4) { animation-delay: 0.20s; }
        .ryr-section:nth-child(5) { animation-delay: 0.25s; }
        .ryr-section:nth-child(6) { animation-delay: 0.30s; }
    </style>

    {{-- ═══════════════════════════════ HERO SECTION ═══════════════════════════════════════ --}}
    <div class="relative bg-primary overflow-hidden">
        {{-- Subtle dot-grid overlay --}}
        <div class="absolute inset-0 opacity-[0.05]" style="
            background-image: radial-gradient(circle, rgba(255,255,255,0.9) 1px, transparent 1px);
            background-size: 28px 28px;
        "></div>
        {{-- Bottom soft fade --}}
        <div class="absolute bottom-0 inset-x-0 h-20 bg-gradient-to-t from-primary/90 to-transparent pointer-events-none"></div>

        <div class="relative max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop pt-10 pb-12 md:pt-14 md:pb-16">
            {{-- Breadcrumb --}}
            <nav aria-label="Breadcrumb" class="flex items-center gap-1.5 text-xs text-white/45 mb-7">
                <a href="{{ url('/') }}" class="hover:text-white/70 transition-colors">Home</a>
                <span class="material-symbols-outlined text-[11px] leading-none translate-y-px">chevron_right</span>
                <span class="text-white/45">The Troop</span>
                <span class="material-symbols-outlined text-[11px] leading-none translate-y-px">chevron_right</span>
                <span class="text-white/80 font-medium">Year Reports</span>
            </nav>

            <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-8">
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-0.5 h-9 bg-white/40 rounded-full"></div>
                        <span class="text-white/50 text-xs font-semibold tracking-[0.18em] uppercase">Archive · 16th Colombo Scout Group</span>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-extrabold text-white leading-[1.05] tracking-tight">
                        Year Reports
                    </h1>
                    <p class="mt-3 text-white/55 text-sm md:text-base max-w-lg leading-relaxed">
                        Over 25 years of annual reports, international jamborees, camps and milestones — preserved as a digital chronicle.
                    </p>
                </div>

                {{-- Stats badges --}}
                <div class="flex gap-3 flex-shrink-0">
                    <div class="bg-white/[0.08] backdrop-blur-sm border border-white/[0.1] rounded-2xl px-5 py-4 text-center">
                        <div class="text-3xl font-extrabold text-white leading-none">{{ $years }}</div>
                        <div class="text-[11px] text-white/45 mt-1.5 font-semibold tracking-wide uppercase">Years</div>
                    </div>
                    <div class="bg-white/[0.08] backdrop-blur-sm border border-white/[0.1] rounded-2xl px-5 py-4 text-center">
                        <div class="text-3xl font-extrabold text-white leading-none">{{ $total }}</div>
                        <div class="text-[11px] text-white/45 mt-1.5 font-semibold tracking-wide uppercase">Documents</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ═══════════════════════════════ STICKY JUMP-NAV ═══════════════════════════════════════ --}}
    <div id="ryr-jumpnav" class="sticky top-16 z-40 bg-surface/95 backdrop-blur-md border-b border-outline-variant/30 shadow-[0_1px_8px_rgba(0,0,0,0.06)]">
        <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
            <div class="flex items-center overflow-x-auto scrollbar-hide gap-1 py-3">
                @foreach ($eras as $era)
                    @php $r = $era['meta']['key']; @endphp
                    <a id="btn-{{ $r }}" href="#section-{{ $r }}" class="ryr-tab" onclick="smoothJump(event,'section-{{ $r }}')">{{ $r }}</a>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ═══════════════════════════════ CONTENT AREA ═══════════════════════════════════════ --}}
    <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-10 md:py-14">

        @forelse ($eras as $era)
            @if (! $loop->first)
                <hr class="ryr-era-divider">
            @endif

            <div id="section-{{ $era['meta']['key'] }}" class="ryr-section">
                <div class="ryr-range-header" @if($loop->first) style="padding-top:0;" @endif>
                    <span class="ryr-range-rule"></span>
                    <div class="ryr-range-label">{{ $era['meta']['label'] }}</div>
                    <p class="ryr-range-desc">{{ $era['meta']['desc'] }}</p>
                </div>

                <div class="ryr-timeline">
                    @php $yearLoopLast = $era['years']->keys()->last(); @endphp
                    @foreach ($era['years'] as $year => $entries)
                        <div class="ryr-entry {{ $year === $yearLoopLast ? 'ryr-last' : '' }}">
                            <div class="ryr-node">
                                <div class="ryr-dot"><span class="material-symbols-outlined ryr-dot-icon">calendar_today</span></div>
                                <div class="ryr-year-num">{{ $year }}</div>
                                <div class="ryr-count-label">{{ $entries->count() }} {{ \Illuminate\Support\Str::plural('entry', $entries->count()) }}</div>
                            </div>
                            <div class="ryr-chips">
                                @foreach ($entries as $entry)
                                    <a href="{{ url('/' . $entry->slug) }}"
                                       class="ryr-chip {{ $entry->category === 'event' ? 'ryr-chip-event' : 'ryr-chip-report' }}">
                                        <span class="material-symbols-outlined chip-ico">{{ $entry->icon }}</span>{{ $entry->chip_label_text }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @empty
            <div class="text-center py-20">
                <p class="ryr-range-desc" style="margin:0 auto;">No reports have been published yet.</p>
            </div>
        @endforelse

    </div>

    {{-- ═══════════════════════════════ JAVASCRIPT ══════════════════════════════════════════ --}}
    <script>
        const RANGES = ['1995-1999','2000-2004','2005-2009','2010-2014','2015-2019','2020-2024'];
        const JUMP_NAV_HEIGHT = () => document.getElementById('ryr-jumpnav').offsetHeight + 64; // nav bar + jump bar

        /* ── Smooth-scroll with offset for sticky bars ─────────────── */
        function smoothJump(e, sectionId) {
            e.preventDefault();
            const el = document.getElementById(sectionId);
            if (!el) return;
            const top = el.getBoundingClientRect().top + window.scrollY - JUMP_NAV_HEIGHT() - 12;
            window.scrollTo({ top, behavior: 'smooth' });
        }

        /* ── Highlight active tab based on scroll position ──────────── */
        function updateActiveTab() {
            let activeRange = RANGES[0];
            const offset = JUMP_NAV_HEIGHT() + 20;

            for (const r of RANGES) {
                const el = document.getElementById('section-' + r);
                if (!el) continue;
                if (el.getBoundingClientRect().top <= offset) {
                    activeRange = r;
                }
            }

            RANGES.forEach(r => {
                const btn = document.getElementById('btn-' + r);
                if (btn) btn.classList.toggle('active', r === activeRange);
            });
        }

        /* ── On load: jump to ?range= if present in URL ─────────────── */
        document.addEventListener('DOMContentLoaded', function () {
            const params = new URLSearchParams(window.location.search);
            const range  = params.get('range');
            if (range && RANGES.includes(range)) {
                // Wait one frame for layout to settle, then jump
                requestAnimationFrame(() => {
                    const el = document.getElementById('section-' + range);
                    if (el) {
                        const top = el.getBoundingClientRect().top + window.scrollY - JUMP_NAV_HEIGHT() - 12;
                        window.scrollTo({ top, behavior: 'instant' });
                    }
                });
            }
            updateActiveTab();
        });

        /* Throttled scroll listener */
        let ticking = false;
        window.addEventListener('scroll', () => {
            if (!ticking) {
                requestAnimationFrame(() => { updateActiveTab(); ticking = false; });
                ticking = true;
            }
        }, { passive: true });
    </script>

@endsection
