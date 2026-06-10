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
                        <div class="text-3xl font-extrabold text-white leading-none">26</div>
                        <div class="text-[11px] text-white/45 mt-1.5 font-semibold tracking-wide uppercase">Years</div>
                    </div>
                    <div class="bg-white/[0.08] backdrop-blur-sm border border-white/[0.1] rounded-2xl px-5 py-4 text-center">
                        <div class="text-3xl font-extrabold text-white leading-none">40+</div>
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
                @foreach (['1995-1999','2000-2004','2005-2009','2010-2014','2015-2019','2020-2024'] as $r)
                    <a id="btn-{{ $r }}" href="#section-{{ $r }}" class="ryr-tab" onclick="smoothJump(event,'section-{{ $r }}')">{{ $r }}</a>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ═══════════════════════════════ CONTENT AREA ═══════════════════════════════════════ --}}
    <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-10 md:py-14">

        {{-- ─────────────────────────────────────────────────────────────
             SECTION: 1995–1999
        ──────────────────────────────────────────────────────────────── --}}
        <div id="section-1995-1999" class="ryr-section">
            <div class="ryr-range-header" style="padding-top:0;">
                <span class="ryr-range-rule"></span>
                <div class="ryr-range-label">1995 – 1999</div>
                <p class="ryr-range-desc">The founding era — Asia-Pacific jamborees, pioneering expeditions, and the troop's first major international presence.</p>
            </div>

            <div class="ryr-timeline">

                {{-- 1995 --}}
                <div class="ryr-entry">
                    <div class="ryr-node">
                        <div class="ryr-dot"><span class="material-symbols-outlined ryr-dot-icon">calendar_today</span></div>
                        <div class="ryr-year-num">1995</div>
                        <div class="ryr-count-label">2 entries</div>
                    </div>
                    <div class="ryr-chips">
                        <a href="{{ url('/2nd-asia-pacific-6th-new-zealand-venture-scout-camp-1995') }}" class="ryr-chip ryr-chip-event">
                            <span class="material-symbols-outlined chip-ico">explore</span>Asia Pacific Scout Camp '95
                        </a>
                        <a href="{{ url('/year-report-1995') }}" class="ryr-chip ryr-chip-report">
                            <span class="material-symbols-outlined chip-ico">description</span>Year Report – 1995
                        </a>
                    </div>
                </div>

                {{-- 1996 --}}
                <div class="ryr-entry">
                    <div class="ryr-node">
                        <div class="ryr-dot"><span class="material-symbols-outlined ryr-dot-icon">calendar_today</span></div>
                        <div class="ryr-year-num">1996</div>
                        <div class="ryr-count-label">3 entries</div>
                    </div>
                    <div class="ryr-chips">
                        <a href="{{ url('/17th-Asia-Pacific-Scout-Jamboree-1996') }}" class="ryr-chip ryr-chip-event">
                            <span class="material-symbols-outlined chip-ico">campaign</span>17th AP Scout Jamboree
                        </a>
                        <a href="{{ url('/Tidal-Wave-1996') }}" class="ryr-chip ryr-chip-event">
                            <span class="material-symbols-outlined chip-ico">water</span>Tidal Wave – 1996
                        </a>
                        <a href="{{ url('/year-report-1996') }}" class="ryr-chip ryr-chip-report">
                            <span class="material-symbols-outlined chip-ico">description</span>Year Report – 1996
                        </a>
                    </div>
                </div>

                {{-- 1997 --}}
                <div class="ryr-entry">
                    <div class="ryr-node">
                        <div class="ryr-dot"><span class="material-symbols-outlined ryr-dot-icon">calendar_today</span></div>
                        <div class="ryr-year-num">1997</div>
                        <div class="ryr-count-label">3 entries</div>
                    </div>
                    <div class="ryr-chips">
                        <a href="{{ url('/18th-Asia-Pacific-Scout-Jamboree-1997') }}" class="ryr-chip ryr-chip-event">
                            <span class="material-symbols-outlined chip-ico">campaign</span>18th AP Scout Jamboree
                        </a>
                        <a href="{{ url('/Coastal-Winds–1997') }}" class="ryr-chip ryr-chip-event">
                            <span class="material-symbols-outlined chip-ico">air</span>Coastal Winds – 1997
                        </a>
                        <a href="{{ url('/year-report-1997') }}" class="ryr-chip ryr-chip-report">
                            <span class="material-symbols-outlined chip-ico">description</span>Year Report – 1997
                        </a>
                    </div>
                </div>

                {{-- 1998 --}}
                <div class="ryr-entry">
                    <div class="ryr-node">
                        <div class="ryr-dot"><span class="material-symbols-outlined ryr-dot-icon">calendar_today</span></div>
                        <div class="ryr-year-num">1998</div>
                        <div class="ryr-count-label">2 entries</div>
                    </div>
                    <div class="ryr-chips">
                        <a href="{{ url('/Sand-Storm–1998') }}" class="ryr-chip ryr-chip-event">
                            <span class="material-symbols-outlined chip-ico">grain</span>Sand Storm – 1998
                        </a>
                        <a href="{{ url('/year-report-1998') }}" class="ryr-chip ryr-chip-report">
                            <span class="material-symbols-outlined chip-ico">description</span>Year Report – 1998
                        </a>
                    </div>
                </div>

                {{-- 1999 (last in era) --}}
                <div class="ryr-entry ryr-last">
                    <div class="ryr-node">
                        <div class="ryr-dot"><span class="material-symbols-outlined ryr-dot-icon">calendar_today</span></div>
                        <div class="ryr-year-num">1999</div>
                        <div class="ryr-count-label">4 entries</div>
                    </div>
                    <div class="ryr-chips">
                        <a href="{{ url('/Sweden-National-Jamboree-\'99') }}" class="ryr-chip ryr-chip-event">
                            <span class="material-symbols-outlined chip-ico">flag</span>Sweden National Jamboree '99
                        </a>
                        <a href="{{ url('/De-Ja-\'Vu–1999') }}" class="ryr-chip ryr-chip-event">
                            <span class="material-symbols-outlined chip-ico">history</span>De Ja 'Vu – 1999
                        </a>
                        <a href="{{ url('/Thai-National-Jamboree-\'99') }}" class="ryr-chip ryr-chip-event">
                            <span class="material-symbols-outlined chip-ico">forest</span>Thai National Jamboree '99
                        </a>
                        <a href="{{ url('/year-report-1999') }}" class="ryr-chip ryr-chip-report">
                            <span class="material-symbols-outlined chip-ico">description</span>Year Report – 1999
                        </a>
                    </div>
                </div>

            </div>
        </div>

        <hr class="ryr-era-divider">

        {{-- ─────────────────────────────────────────────────────────────
             SECTION: 2000–2004
        ──────────────────────────────────────────────────────────────── --}}
        <div id="section-2000-2004" class="ryr-section">
            <div class="ryr-range-header">
                <span class="ryr-range-rule"></span>
                <div class="ryr-range-label">2000 – 2004</div>
                <p class="ryr-range-desc">The millennium era of tribal craft, cyclone expeditions, and continued troop growth through the new century.</p>
            </div>

            <div class="ryr-timeline">

                {{-- 2000 --}}
                <div class="ryr-entry">
                    <div class="ryr-node">
                        <div class="ryr-dot"><span class="material-symbols-outlined ryr-dot-icon">calendar_today</span></div>
                        <div class="ryr-year-num">2000</div>
                        <div class="ryr-count-label">2 entries</div>
                    </div>
                    <div class="ryr-chips">
                        <a href="{{ url('/Cyclone-2000') }}" class="ryr-chip ryr-chip-event">
                            <span class="material-symbols-outlined chip-ico">cyclone</span>Cyclone 2000
                        </a>
                        <a href="{{ url('/year-report-2000') }}" class="ryr-chip ryr-chip-report">
                            <span class="material-symbols-outlined chip-ico">description</span>Year Report – 2000
                        </a>
                    </div>
                </div>

                {{-- 2001 --}}
                <div class="ryr-entry">
                    <div class="ryr-node">
                        <div class="ryr-dot"><span class="material-symbols-outlined ryr-dot-icon">calendar_today</span></div>
                        <div class="ryr-year-num">2001</div>
                        <div class="ryr-count-label">1 entry</div>
                    </div>
                    <div class="ryr-chips">
                        <a href="{{ url('/year-report-2001') }}" class="ryr-chip ryr-chip-report">
                            <span class="material-symbols-outlined chip-ico">description</span>Year Report – 2001
                        </a>
                    </div>
                </div>

                {{-- 2002 --}}
                <div class="ryr-entry">
                    <div class="ryr-node">
                        <div class="ryr-dot"><span class="material-symbols-outlined ryr-dot-icon">calendar_today</span></div>
                        <div class="ryr-year-num">2002</div>
                        <div class="ryr-count-label">2 entries</div>
                    </div>
                    <div class="ryr-chips">
                        <a href="{{ url('/Tribe-Out-2002') }}" class="ryr-chip ryr-chip-event">
                            <span class="material-symbols-outlined chip-ico">groups</span>Tribe Out 2002
                        </a>
                        <a href="{{ url('/year-report-2002') }}" class="ryr-chip ryr-chip-report">
                            <span class="material-symbols-outlined chip-ico">description</span>Year Report – 2002
                        </a>
                    </div>
                </div>

                {{-- 2003 --}}
                <div class="ryr-entry">
                    <div class="ryr-node">
                        <div class="ryr-dot"><span class="material-symbols-outlined ryr-dot-icon">calendar_today</span></div>
                        <div class="ryr-year-num">2003</div>
                        <div class="ryr-count-label">1 entry</div>
                    </div>
                    <div class="ryr-chips">
                        <a href="{{ url('/year-report-2003') }}" class="ryr-chip ryr-chip-report">
                            <span class="material-symbols-outlined chip-ico">description</span>Year Report – 2003
                        </a>
                    </div>
                </div>

                {{-- 2004 (last in era) --}}
                <div class="ryr-entry ryr-last">
                    <div class="ryr-node">
                        <div class="ryr-dot"><span class="material-symbols-outlined ryr-dot-icon">calendar_today</span></div>
                        <div class="ryr-year-num">2004</div>
                        <div class="ryr-count-label">2 entries</div>
                    </div>
                    <div class="ryr-chips">
                        <a href="{{ url('/tribal-craft-2004') }}" class="ryr-chip ryr-chip-event">
                            <span class="material-symbols-outlined chip-ico">handyman</span>Tribal Craft 2004
                        </a>
                        <a href="{{ url('/year-report-2004') }}" class="ryr-chip ryr-chip-report">
                            <span class="material-symbols-outlined chip-ico">description</span>Year Report – 2004
                        </a>
                    </div>
                </div>

            </div>
        </div>

        <hr class="ryr-era-divider">

        {{-- ─────────────────────────────────────────────────────────────
             SECTION: 2005–2009
        ──────────────────────────────────────────────────────────────── --}}
        <div id="section-2005-2009" class="ryr-section">
            <div class="ryr-range-header">
                <span class="ryr-range-rule"></span>
                <div class="ryr-range-label">2005 – 2009</div>
                <p class="ryr-range-desc">Steady years of scouting dedication, training, and annual reporting through a formative decade.</p>
            </div>

            <div class="ryr-timeline">

                @foreach ([2005, 2006, 2007, 2008] as $yr)
                <div class="ryr-entry">
                    <div class="ryr-node">
                        <div class="ryr-dot"><span class="material-symbols-outlined ryr-dot-icon">calendar_today</span></div>
                        <div class="ryr-year-num">{{ $yr }}</div>
                        <div class="ryr-count-label">1 entry</div>
                    </div>
                    <div class="ryr-chips">
                        <a href="{{ url('/year-report-' . $yr) }}" class="ryr-chip ryr-chip-report">
                            <span class="material-symbols-outlined chip-ico">description</span>Year Report – {{ $yr }}
                        </a>
                    </div>
                </div>
                @endforeach

                <div class="ryr-entry ryr-last">
                    <div class="ryr-node">
                        <div class="ryr-dot"><span class="material-symbols-outlined ryr-dot-icon">calendar_today</span></div>
                        <div class="ryr-year-num">2009</div>
                        <div class="ryr-count-label">1 entry</div>
                    </div>
                    <div class="ryr-chips">
                        <a href="{{ url('/year-report-2009') }}" class="ryr-chip ryr-chip-report">
                            <span class="material-symbols-outlined chip-ico">description</span>Year Report – 2009
                        </a>
                    </div>
                </div>

            </div>
        </div>

        <hr class="ryr-era-divider">

        {{-- ─────────────────────────────────────────────────────────────
             SECTION: 2010–2014
        ──────────────────────────────────────────────────────────────── --}}
        <div id="section-2010-2014" class="ryr-section">
            <div class="ryr-range-header">
                <span class="ryr-range-rule"></span>
                <div class="ryr-range-label">2010 – 2014</div>
                <p class="ryr-range-desc">The centennial decade — featuring the landmark Centennial Flames celebration in 2012 and international achievements.</p>
            </div>

            <div class="ryr-timeline">

                @foreach ([2010, 2011] as $yr)
                <div class="ryr-entry">
                    <div class="ryr-node">
                        <div class="ryr-dot"><span class="material-symbols-outlined ryr-dot-icon">calendar_today</span></div>
                        <div class="ryr-year-num">{{ $yr }}</div>
                        <div class="ryr-count-label">1 entry</div>
                    </div>
                    <div class="ryr-chips">
                        <a href="{{ url('/year-report-' . $yr) }}" class="ryr-chip ryr-chip-report">
                            <span class="material-symbols-outlined chip-ico">description</span>Year Report – {{ $yr }}
                        </a>
                    </div>
                </div>
                @endforeach

                {{-- 2012 — landmark year --}}
                <div class="ryr-entry">
                    <div class="ryr-node">
                        <div class="ryr-dot" style="background: linear-gradient(135deg, #0e4194, #000a1e);">
                            <span class="material-symbols-outlined ryr-dot-icon">star</span>
                        </div>
                        <div class="ryr-year-num">2012</div>
                        <div class="ryr-count-label">3 entries</div>
                    </div>
                    <div class="ryr-chips" style="border-left-color: rgba(14,65,148,0.18);">
                        <a href="{{ url('/Centennial-Flames-2012') }}" class="ryr-chip ryr-chip-event">
                            <span class="material-symbols-outlined chip-ico">local_fire_department</span>Centennial Flames 2012
                        </a>
                        <a href="{{ url('/International-Achievement') }}" class="ryr-chip ryr-chip-event">
                            <span class="material-symbols-outlined chip-ico">public</span>International Achievement
                        </a>
                        <a href="{{ url('/year-report-2012') }}" class="ryr-chip ryr-chip-report">
                            <span class="material-symbols-outlined chip-ico">description</span>Year Report – 2012
                        </a>
                    </div>
                </div>

                @foreach ([2013, 2014] as $yr)
                <div class="ryr-entry {{ $yr === 2014 ? 'ryr-last' : '' }}">
                    <div class="ryr-node">
                        <div class="ryr-dot"><span class="material-symbols-outlined ryr-dot-icon">calendar_today</span></div>
                        <div class="ryr-year-num">{{ $yr }}</div>
                        <div class="ryr-count-label">1 entry</div>
                    </div>
                    <div class="ryr-chips">
                        <a href="{{ url('/year-report-' . $yr) }}" class="ryr-chip ryr-chip-report">
                            <span class="material-symbols-outlined chip-ico">description</span>Year Report – {{ $yr }}
                        </a>
                    </div>
                </div>
                @endforeach

            </div>
        </div>

        <hr class="ryr-era-divider">

        {{-- ─────────────────────────────────────────────────────────────
             SECTION: 2015–2019
        ──────────────────────────────────────────────────────────────── --}}
        <div id="section-2015-2019" class="ryr-section">
            <div class="ryr-range-header">
                <span class="ryr-range-rule"></span>
                <div class="ryr-range-label">2015 – 2019</div>
                <p class="ryr-range-desc">The Escapade years — a modern revival with fresh energy, signature events, and renewed scouting spirit.</p>
            </div>

            <div class="ryr-timeline">

                @foreach ([2015, 2016, 2017, 2018] as $yr)
                <div class="ryr-entry">
                    <div class="ryr-node">
                        <div class="ryr-dot"><span class="material-symbols-outlined ryr-dot-icon">calendar_today</span></div>
                        <div class="ryr-year-num">{{ $yr }}</div>
                        <div class="ryr-count-label">1 entry</div>
                    </div>
                    <div class="ryr-chips">
                        <a href="{{ url('/year-report-' . $yr) }}" class="ryr-chip ryr-chip-report">
                            <span class="material-symbols-outlined chip-ico">description</span>Year Report – {{ $yr }}
                        </a>
                    </div>
                </div>
                @endforeach

                {{-- 2019 (last in era) --}}
                <div class="ryr-entry ryr-last">
                    <div class="ryr-node">
                        <div class="ryr-dot"><span class="material-symbols-outlined ryr-dot-icon">calendar_today</span></div>
                        <div class="ryr-year-num">2019</div>
                        <div class="ryr-count-label">2 entries</div>
                    </div>
                    <div class="ryr-chips">
                        <a href="{{ url('/Escapade-2019') }}" class="ryr-chip ryr-chip-event">
                            <span class="material-symbols-outlined chip-ico">celebration</span>Escapade 2019
                        </a>
                        <a href="{{ url('/year-report-2019') }}" class="ryr-chip ryr-chip-report">
                            <span class="material-symbols-outlined chip-ico">description</span>Year Report – 2019
                        </a>
                    </div>
                </div>

            </div>
        </div>

        <hr class="ryr-era-divider">

        {{-- ─────────────────────────────────────────────────────────────
             SECTION: 2020–2024
        ──────────────────────────────────────────────────────────────── --}}
        <div id="section-2020-2024" class="ryr-section">
            <div class="ryr-range-header">
                <span class="ryr-range-rule"></span>
                <div class="ryr-range-label">2020 – 2024</div>
                <p class="ryr-range-desc">Scouting adapted — virtual events, at-home activities, and online camp fires kept the troop connected through unprecedented times.</p>
            </div>

            <div class="ryr-timeline">

                {{-- 2020 (last) --}}
                <div class="ryr-entry ryr-last">
                    <div class="ryr-node">
                        <div class="ryr-dot"><span class="material-symbols-outlined ryr-dot-icon">calendar_today</span></div>
                        <div class="ryr-year-num">2020</div>
                        <div class="ryr-count-label">2 entries</div>
                    </div>
                    <div class="ryr-chips">
                        <a href="{{ url('/ESCAPADE=At-Home-\"Kids\"') }}" class="ryr-chip ryr-chip-event">
                            <span class="material-symbols-outlined chip-ico">home_work</span>ESCAPADE At Home "Kids"
                        </a>
                        <a href="{{ url('/ONLINE-CAMP-FIRE') }}" class="ryr-chip ryr-chip-event">
                            <span class="material-symbols-outlined chip-ico">local_fire_department</span>Online Camp Fire
                        </a>
                    </div>
                </div>

            </div>
        </div>

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
