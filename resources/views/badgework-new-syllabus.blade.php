@extends('layouts.master')

@section('title', 'Badge Work – New Syllabus (2015) | 16th Colombo Scout Group')
@section('meta_description', 'Download and preview official badge work syllabus documents for the Sri Lanka Scout Association New Programme (effective 2015). Covers all award levels from Membership to President\'s Award.')

@section('content')
<main class="bg-background text-on-background min-h-screen">

    {{-- ── Page Hero ──────────────────────────────────────────────────── --}}
    <section class="bg-primary relative overflow-hidden py-14 md:py-20">
        <div class="absolute inset-0 opacity-[0.04]"
             style="background-image: radial-gradient(circle, #fff 1px, transparent 1px); background-size: 28px 28px;"></div>
        <div class="absolute inset-0 bg-gradient-to-br from-primary via-primary-container/60 to-primary pointer-events-none"></div>
        <div class="relative max-w-[1200px] mx-auto px-4 md:px-12">
            <nav class="flex items-center gap-1.5 text-xs text-on-primary-container mb-5 font-semibold tracking-wide uppercase">
                <a href="{{ url('/') }}" class="hover:text-on-primary transition-colors">Home</a>
                <span class="material-symbols-outlined text-xs leading-none">chevron_right</span>
                <span class="text-on-primary">Badge Work</span>
            </nav>
            <h1 class="text-4xl md:text-5xl font-bold text-on-primary mb-3 tracking-tight leading-tight">
                Badge Work
            </h1>
            <p class="text-body-lg text-on-primary-container max-w-2xl leading-relaxed">
                Official syllabus resources for the Sri Lanka Scout Association badge progression programme.
                Download or preview each document directly in your browser.
            </p>
        </div>
    </section>

    {{-- ── Syllabus Switcher ───────────────────────────────────────────── --}}
    <div class="bg-surface border-b border-outline-variant/40 sticky top-0 z-20 shadow-sm">
        <div class="max-w-[1200px] mx-auto px-4 md:px-12">
            <div class="flex">
                <a href="{{ url('/badgework-new-syllabus') }}"
                   class="px-6 py-4 text-sm font-bold text-primary border-b-2 border-primary tracking-wider uppercase whitespace-nowrap">
                    New Syllabus (2015–)
                </a>
                <a href="{{ url('/badgework-old-syllabus') }}"
                   class="px-6 py-4 text-sm font-bold text-secondary hover:text-primary border-b-2 border-transparent hover:border-primary/40 tracking-wider uppercase whitespace-nowrap transition-colors">
                    Old Syllabus (Pre-2015)
                </a>
            </div>
        </div>
    </div>

    {{-- ── Intro Banner ────────────────────────────────────────────────── --}}
    <div class="max-w-[1200px] mx-auto px-4 md:px-12 pt-10 pb-4">
        <div class="bg-tertiary-container rounded-xl border border-on-tertiary-container/15 p-6 flex items-start gap-4">
            <span class="material-symbols-outlined text-2xl text-on-tertiary-container shrink-0 mt-0.5">info</span>
            <div>
                <p class="text-sm font-semibold text-on-tertiary-container leading-relaxed">
                    Download Zone — New Syllabus (Effective from 2015)
                </p>
                <p class="text-sm text-on-tertiary-container/80 mt-1 leading-relaxed">
                    All notes related to the Badgework Syllabus set out for Scouts under the programme effective from 2015.
                    Documents sourced from the Sri Lanka Scout Association's <em>The Youth Programme</em> publication (Chief Commissioner's Award onward).
                </p>
            </div>
        </div>
    </div>

    {{-- ── Award Cards ─────────────────────────────────────────────────── --}}
    <div class="max-w-[1200px] mx-auto px-4 md:px-12 py-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            {{-- ── 1. National Scout Membership Badge ── --}}
            <div class="bg-surface rounded-xl border border-outline-variant/60 overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-300">
                <div class="p-6 flex items-start gap-4">
                    <div class="shrink-0 w-11 h-11 rounded-full bg-tertiary-container flex items-center justify-center">
                        <span class="material-symbols-outlined text-xl text-on-tertiary-container">badge</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <span class="text-xs font-bold text-tertiary tracking-widest uppercase">Level 1</span>
                        <h2 class="text-title-lg font-bold text-primary mt-1">National Scout Membership Badge</h2>
                        <p class="text-body-md text-secondary mt-2 leading-relaxed">
                            The entry-level award earned on joining the Scout section. Verifies knowledge of the Scout Promise, Law, and fundamental scouting skills under the 2015 programme.
                        </p>
                    </div>
                </div>
                <div class="px-6 pb-6 flex items-center gap-3 flex-wrap">
                    <a href="https://drive.usercontent.google.com/download?id=1FCvNHfd55uvj-JHs7nt61R_kjvA587kn&export=download&authuser=0"
                       target="_blank"
                       class="inline-flex items-center gap-2 bg-primary text-on-primary font-bold text-xs tracking-wider uppercase px-5 py-2.5 rounded hover:bg-primary-container transition-all">
                        <span class="material-symbols-outlined text-sm">download</span>
                        Download
                    </a>
                    <button onclick="bwToggle('preview-1', 'https://drive.google.com/file/d/1FCvNHfd55uvj-JHs7nt61R_kjvA587kn/preview')"
                            id="btn-1"
                            class="inline-flex items-center gap-2 border border-outline text-secondary hover:border-primary hover:text-primary font-bold text-xs tracking-wider uppercase px-5 py-2.5 rounded transition-all">
                        <span class="material-symbols-outlined text-sm">visibility</span>
                        Preview
                    </button>
                </div>
                <div id="preview-1" class="hidden border-t border-outline-variant/30">
                    <div class="relative w-full" style="padding-top: 62.5%;">
                        <iframe class="absolute inset-0 w-full h-full border-0" src="about:blank" allow="autoplay" loading="lazy"></iframe>
                    </div>
                </div>
            </div>

            {{-- ── 2. Scout Master's Award ── --}}
            <div class="bg-surface rounded-xl border border-outline-variant/60 overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-300">
                <div class="p-6 flex items-start gap-4">
                    <div class="shrink-0 w-11 h-11 rounded-full bg-tertiary-container flex items-center justify-center">
                        <span class="material-symbols-outlined text-xl text-on-tertiary-container">shield</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <span class="text-xs font-bold text-tertiary tracking-widest uppercase">Level 2</span>
                        <h2 class="text-title-lg font-bold text-primary mt-1">Scout Master's Award</h2>
                        <p class="text-body-md text-secondary mt-2 leading-relaxed">
                            Intermediate award testing a broadening set of scouting competencies including camping, first aid, navigation, and community service under Scout leadership.
                        </p>
                    </div>
                </div>
                <div class="px-6 pb-6 flex items-center gap-3 flex-wrap">
                    <a href="https://drive.usercontent.google.com/download?id=15_0jf29lmYoufmzVNq865N42oRCQ0xIc&export=download&authuser=0"
                       target="_blank"
                       class="inline-flex items-center gap-2 bg-primary text-on-primary font-bold text-xs tracking-wider uppercase px-5 py-2.5 rounded hover:bg-primary-container transition-all">
                        <span class="material-symbols-outlined text-sm">download</span>
                        Download
                    </a>
                    <button onclick="bwToggle('preview-2', 'https://drive.google.com/file/d/15_0jf29lmYoufmzVNq865N42oRCQ0xIc/preview')"
                            id="btn-2"
                            class="inline-flex items-center gap-2 border border-outline text-secondary hover:border-primary hover:text-primary font-bold text-xs tracking-wider uppercase px-5 py-2.5 rounded transition-all">
                        <span class="material-symbols-outlined text-sm">visibility</span>
                        Preview
                    </button>
                </div>
                <div id="preview-2" class="hidden border-t border-outline-variant/30">
                    <div class="relative w-full" style="padding-top: 62.5%;">
                        <iframe class="absolute inset-0 w-full h-full border-0" src="about:blank" allow="autoplay" loading="lazy"></iframe>
                    </div>
                </div>
            </div>

            {{-- ── 3. Group Scout Master's Award ── --}}
            <div class="bg-surface rounded-xl border border-outline-variant/60 overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-300">
                <div class="p-6 flex items-start gap-4">
                    <div class="shrink-0 w-11 h-11 rounded-full bg-tertiary-container flex items-center justify-center">
                        <span class="material-symbols-outlined text-xl text-on-tertiary-container">military_tech</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <span class="text-xs font-bold text-tertiary tracking-widest uppercase">Level 3</span>
                        <h2 class="text-title-lg font-bold text-primary mt-1">Group Scout Master's Award</h2>
                        <p class="text-body-md text-secondary mt-2 leading-relaxed">
                            Advanced award requiring demonstrated leadership across patrol activities, successful project coordination, and sustained contribution to the Scout group.
                        </p>
                    </div>
                </div>
                <div class="px-6 pb-6 flex items-center gap-3 flex-wrap">
                    <a href="https://drive.usercontent.google.com/download?id=1IsOzsBtxgpW2U2oGMh2qVYk2nzfkpguJ&export=download&authuser=0"
                       target="_blank"
                       class="inline-flex items-center gap-2 bg-primary text-on-primary font-bold text-xs tracking-wider uppercase px-5 py-2.5 rounded hover:bg-primary-container transition-all">
                        <span class="material-symbols-outlined text-sm">download</span>
                        Download
                    </a>
                    <button onclick="bwToggle('preview-3', 'https://drive.google.com/file/d/1IsOzsBtxgpW2U2oGMh2qVYk2nzfkpguJ/preview')"
                            id="btn-3"
                            class="inline-flex items-center gap-2 border border-outline text-secondary hover:border-primary hover:text-primary font-bold text-xs tracking-wider uppercase px-5 py-2.5 rounded transition-all">
                        <span class="material-symbols-outlined text-sm">visibility</span>
                        Preview
                    </button>
                </div>
                <div id="preview-3" class="hidden border-t border-outline-variant/30">
                    <div class="relative w-full" style="padding-top: 62.5%;">
                        <iframe class="absolute inset-0 w-full h-full border-0" src="about:blank" allow="autoplay" loading="lazy"></iframe>
                    </div>
                </div>
            </div>

            {{-- ── 4. District Commissioner's Award ── --}}
            <div class="bg-surface rounded-xl border border-outline-variant/60 overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-300">
                <div class="p-6 flex items-start gap-4">
                    <div class="shrink-0 w-11 h-11 rounded-full bg-tertiary-container flex items-center justify-center">
                        <span class="material-symbols-outlined text-xl text-on-tertiary-container">verified_user</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <span class="text-xs font-bold text-tertiary tracking-widest uppercase">Level 4</span>
                        <h2 class="text-title-lg font-bold text-primary mt-1">District Commissioner's Award</h2>
                        <p class="text-body-md text-secondary mt-2 leading-relaxed">
                            Senior award demonstrating commitment to service at a district level and mastery of advanced scouting requirements set by the District Commissioner's office.
                        </p>
                    </div>
                </div>
                <div class="px-6 pb-6 flex items-center gap-3 flex-wrap">
                    <a href="https://drive.usercontent.google.com/download?id=1sbB7nGguhrumFvMp0QOXnKSwhOduTT_K&export=download&authuser=0"
                       target="_blank"
                       class="inline-flex items-center gap-2 bg-primary text-on-primary font-bold text-xs tracking-wider uppercase px-5 py-2.5 rounded hover:bg-primary-container transition-all">
                        <span class="material-symbols-outlined text-sm">download</span>
                        Download
                    </a>
                    <button onclick="bwToggle('preview-4', 'https://drive.google.com/file/d/1sbB7nGguhrumFvMp0QOXnKSwhOduTT_K/preview')"
                            id="btn-4"
                            class="inline-flex items-center gap-2 border border-outline text-secondary hover:border-primary hover:text-primary font-bold text-xs tracking-wider uppercase px-5 py-2.5 rounded transition-all">
                        <span class="material-symbols-outlined text-sm">visibility</span>
                        Preview
                    </button>
                </div>
                <div id="preview-4" class="hidden border-t border-outline-variant/30">
                    <div class="relative w-full" style="padding-top: 62.5%;">
                        <iframe class="absolute inset-0 w-full h-full border-0" src="about:blank" allow="autoplay" loading="lazy"></iframe>
                    </div>
                </div>
            </div>

            {{-- ── 5. Chief Commissioner's Award ── --}}
            <div class="bg-surface rounded-xl border border-outline-variant/60 overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-300">
                <div class="p-6 flex items-start gap-4">
                    <div class="shrink-0 w-11 h-11 rounded-full bg-primary-container flex items-center justify-center">
                        <span class="material-symbols-outlined text-xl text-on-primary-container">workspace_premium</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <span class="text-xs font-bold text-primary tracking-widest uppercase">Level 5</span>
                        <h2 class="text-title-lg font-bold text-primary mt-1">Chief Commissioner's Award</h2>
                        <p class="text-body-md text-secondary mt-2 leading-relaxed">
                            Elite recognition for outstanding long-term contribution to the Scout Movement. Extracted from <em>The Youth Programme</em> published by the Sri Lanka Scout Association.
                        </p>
                    </div>
                </div>
                <div class="px-6 pb-6 flex items-center gap-3 flex-wrap">
                    <a href="{{ asset('scout_docs/CHIEF-COMMISSIONERS-AWARD.pdf') }}"
                       target="_blank"
                       class="inline-flex items-center gap-2 bg-primary text-on-primary font-bold text-xs tracking-wider uppercase px-5 py-2.5 rounded hover:bg-primary-container transition-all">
                        <span class="material-symbols-outlined text-sm">download</span>
                        Download
                    </a>
                    <button onclick="bwToggle('preview-5', '{{ asset('scout_docs/CHIEF-COMMISSIONERS-AWARD.pdf') }}')"
                            id="btn-5"
                            class="inline-flex items-center gap-2 border border-outline text-secondary hover:border-primary hover:text-primary font-bold text-xs tracking-wider uppercase px-5 py-2.5 rounded transition-all">
                        <span class="material-symbols-outlined text-sm">visibility</span>
                        Preview
                    </button>
                </div>
                <div id="preview-5" class="hidden border-t border-outline-variant/30">
                    <div class="relative w-full" style="padding-top: 62.5%;">
                        <iframe class="absolute inset-0 w-full h-full border-0" src="about:blank" allow="autoplay" loading="lazy"></iframe>
                    </div>
                </div>
            </div>

            {{-- ── 6. President's Award ── --}}
            <div class="bg-primary rounded-xl border border-primary-container/40 overflow-hidden shadow-sm hover:shadow-lg transition-shadow duration-300">
                <div class="p-6 flex items-start gap-4">
                    <div class="shrink-0 w-11 h-11 rounded-full bg-on-primary/10 border border-on-primary/20 flex items-center justify-center">
                        <span class="material-symbols-outlined text-xl text-on-primary">emoji_events</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <span class="text-xs font-bold text-aec7f6 tracking-widest uppercase" style="color: #aec7f6;">Level 6 — Highest Honour</span>
                        <h2 class="text-title-lg font-bold text-on-primary mt-1">President's Award</h2>
                        <p class="text-body-md mt-2 leading-relaxed" style="color: #708ab5;">
                            The highest honour in Sri Lankan Scouting. Awarded by the President of Sri Lanka for exceptional service and achievement within the Scout Movement.
                        </p>
                    </div>
                </div>
                <div class="px-6 pb-6 flex items-center gap-3 flex-wrap">
                    <a href="{{ asset('scout_docs/PRESIDENTS-AWARD.pdf') }}"
                       target="_blank"
                       class="inline-flex items-center gap-2 bg-on-primary text-primary font-bold text-xs tracking-wider uppercase px-5 py-2.5 rounded hover:bg-surface-container transition-all">
                        <span class="material-symbols-outlined text-sm">download</span>
                        Download
                    </a>
                    <button onclick="bwToggle('preview-6', '{{ asset('scout_docs/PRESIDENTS-AWARD.pdf') }}')"
                            id="btn-6"
                            class="inline-flex items-center gap-2 border border-on-primary/30 text-on-primary/70 hover:border-on-primary hover:text-on-primary font-bold text-xs tracking-wider uppercase px-5 py-2.5 rounded transition-all">
                        <span class="material-symbols-outlined text-sm">visibility</span>
                        Preview
                    </button>
                </div>
                <div id="preview-6" class="hidden border-t border-on-primary/15">
                    <div class="relative w-full" style="padding-top: 62.5%;">
                        <iframe class="absolute inset-0 w-full h-full border-0" src="about:blank" allow="autoplay" loading="lazy"></iframe>
                    </div>
                </div>
            </div>

        </div>{{-- /grid --}}
    </div>{{-- /max-w container --}}

    {{-- ── Bottom CTA ──────────────────────────────────────────────────── --}}
    <div class="bg-surface-container-low border-t border-outline-variant/30 py-12">
        <div class="max-w-[1200px] mx-auto px-4 md:px-12 flex flex-col sm:flex-row items-center justify-between gap-6">
            <div>
                <h3 class="text-title-lg font-bold text-primary">Looking for the Pre-2015 Syllabus?</h3>
                <p class="text-body-md text-secondary mt-1">Access badge documents from the previous programme.</p>
            </div>
            <a href="{{ url('/badgework-old-syllabus') }}"
               class="inline-flex items-center gap-2 border border-secondary text-secondary hover:bg-secondary-container/20 font-bold text-xs tracking-wider uppercase px-6 py-3.5 rounded transition-all shrink-0">
                Old Syllabus
                <span class="material-symbols-outlined text-sm">arrow_forward</span>
            </a>
        </div>
    </div>

</main>

<script>
    function bwToggle(id, src) {
        const panel = document.getElementById(id);
        const iframe = panel.querySelector('iframe');
        const isHidden = panel.classList.contains('hidden');
        if (isHidden) {
            if (iframe.getAttribute('src') === 'about:blank') {
                iframe.setAttribute('src', src);
            }
            panel.classList.remove('hidden');
        } else {
            panel.classList.add('hidden');
        }
    }
</script>
@endsection
