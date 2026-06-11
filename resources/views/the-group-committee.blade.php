@extends('layouts.master')

@section('title', "The Group Committee — 16th Colombo Scout Group, S. Thomas' College")
@section('meta_description', "The administrative support body that handles the financial, planning, and advisory roles for the 16th Colombo Scout Group of S. Thomas' College, Mount Lavinia.")

@section('content')

    {{-- ═══════════════════════════════ HERO ═══════════════════════════════════════════════ --}}
    <div class="relative bg-primary overflow-hidden">
        <div class="absolute inset-0 opacity-[0.05]" style="background-image:radial-gradient(circle,rgba(255,255,255,0.9) 1px,transparent 1px);background-size:28px 28px;"></div>
        <div class="absolute bottom-0 inset-x-0 h-20 bg-gradient-to-t from-primary/90 to-transparent pointer-events-none"></div>

        <div class="relative max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop pt-10 pb-12 md:pt-14 md:pb-16">
            <nav aria-label="Breadcrumb" class="flex items-center gap-1.5 text-xs text-white/45 mb-7">
                <a href="{{ url('/') }}" class="hover:text-white/70 transition-colors">Home</a>
                <span class="material-symbols-outlined text-[11px] leading-none translate-y-px">chevron_right</span>
                <span class="text-white/45">The Troop</span>
                <span class="material-symbols-outlined text-[11px] leading-none translate-y-px">chevron_right</span>
                <span class="text-white/80 font-medium">The Group Committee</span>
            </nav>

            <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-8">
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-0.5 h-9 bg-white/40 rounded-full"></div>
                        <span class="text-white/50 text-xs font-semibold tracking-[0.18em] uppercase">Administration · 16th Colombo Scout Group</span>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-extrabold text-white leading-[1.05] tracking-tight">
                        The Group Committee
                    </h1>
                    <p class="mt-3 text-white/55 text-sm md:text-base max-w-xl leading-relaxed">
                        The Group Committee plays a crucial role in supporting the Troop by managing the financial administration, operations planning, and advisory tasks of the Scout Group.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- ═══════════════════════════════ CONTENT ═══════════════════════════════════════════ --}}
    <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-10 md:py-14 bg-background text-on-background">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            {{-- Column 1 & 2: Main Office Bearers & Leaders --}}
            <div class="lg:col-span-2 flex flex-col gap-8">
                
                {{-- Office Bearers --}}
                <div class="bg-surface border border-outline-variant/30 rounded-2xl p-6 md:p-8 shadow-sm">
                    <h3 class="text-xs font-bold text-secondary uppercase tracking-widest pb-3 border-b border-outline-variant/30 mb-4 flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm">shield_person</span>
                        Sponsoring Authority & Key Office Bearers
                    </h3>
                    <div class="flex flex-col gap-1">
                        @foreach ([
                            ['Sponsoring Authority (Warden)',       'Mr. Asanka Perera'],
                            ['Sponsoring Authority (Sub Warden)',   'Dr. Radeeka Mendis'],
                            ['Group Adviser',                       'Mr. Nanda Fernando'],
                            ['Group Chairman',                      'Mr. Senaka De Fonseka'],
                            ['Group Secretary',                     'Mr. Dananjaya Peter'],
                            ['Group Treasurer',                     'Ms. Shiara Perera'],
                            ['Asst. Group Treasurer',               'Ms. Shalini Rubasinghe'],
                            ['Group Scout Leader (GSL)',            'Ms. Wathsala Wijewickrama'],
                        ] as [$role, $name])
                        <div class="flex justify-between items-center py-2.5 border-b border-outline-variant/20 last:border-0 text-sm">
                            <span class="font-semibold text-primary">{{ $role }}</span>
                            <span class="text-secondary font-medium">{{ $name }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Scouters & Leaders --}}
                <div class="bg-surface border border-outline-variant/30 rounded-2xl p-6 md:p-8 shadow-sm">
                    <h3 class="text-xs font-bold text-secondary uppercase tracking-widest pb-3 border-b border-outline-variant/30 mb-4 flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm">groups</span>
                        Active Scouters & Section Leaders
                    </h3>
                    <div class="flex flex-col gap-1">
                        @foreach ([
                            ['Scout Master',                        'Ms. Dilanka Dayananda'],
                            ['Visiting Scout Master',               'Dr. Beshan Kulapala'],
                            ['TIC Singithi Scouts',                 'Ms. Udya Fernando'],
                            ['TIC Cub Scouts',                      'Ms. Sanduni Perera'],
                            ['Coordinator - Scouts',                'Ms. Melani Perera'],
                            ['Director of Music (DOM) / DOS',       'Mr. Dinesh Kumarasinghe'],
                            ['Parent on Guard (POG)',               'Mr. Dilshan Gunawardhana'],
                        ] as [$role, $name])
                        <div class="flex justify-between items-center py-2.5 border-b border-outline-variant/20 last:border-0 text-sm">
                            <span class="font-semibold text-primary">{{ $role }}</span>
                            <span class="text-secondary font-medium">{{ $name }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Former Office Bearers --}}
                <div class="bg-surface border border-outline-variant/30 rounded-2xl p-6 md:p-8 shadow-sm">
                    <h3 class="text-xs font-bold text-secondary uppercase tracking-widest pb-3 border-b border-outline-variant/30 mb-4 flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm">history</span>
                        Former Office Bearers
                    </h3>
                    <div class="flex flex-col gap-1">
                        @foreach ([
                            ['Former Secretary',                    'Mr. Sidath Gajanayaka'],
                            ['Former Treasurer',                    'Ms. Angeeka De Silva'],
                            ['Former Treasurer',                    'Dr. Aseni Wickramatillake'],
                            ['Former Treasurer',                    'Ms. Chamika Peris'],
                        ] as [$role, $name])
                        <div class="flex justify-between items-center py-2.5 border-b border-outline-variant/20 last:border-0 text-sm">
                            <span class="font-semibold text-primary">{{ $role }}</span>
                            <span class="text-secondary font-medium">{{ $name }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>

            {{-- Column 3: Committee Members --}}
            <div class="flex flex-col gap-8">
                
                {{-- Parent Representatives --}}
                <div class="bg-surface border border-outline-variant/30 rounded-2xl p-6 md:p-8 shadow-sm">
                    <h3 class="text-xs font-bold text-secondary uppercase tracking-widest pb-3 border-b border-outline-variant/30 mb-4 flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm">family_restroom</span>
                        Committee Members (Parents)
                    </h3>
                    <div class="flex flex-col gap-1 pr-1">
                        @foreach ([
                            'Ms. Kishani Tennakoon',
                            'Ms. Anoma Jayasundera',
                            'Ms. Dinushi Suriyaarachchi',
                            'Ms. Suwani Thamanegama',
                        ] as $name)
                        <div class="flex items-center gap-2.5 py-2 text-sm text-secondary border-b border-outline-variant/10 last:border-0">
                            <span class="w-1.5 h-1.5 bg-primary/45 rounded-full shrink-0"></span>
                            <span>{{ $name }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Past Scout Representatives --}}
                <div class="bg-surface border border-outline-variant/30 rounded-2xl p-6 md:p-8 shadow-sm">
                    <h3 class="text-xs font-bold text-secondary uppercase tracking-widest pb-3 border-b border-outline-variant/30 mb-4 flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm">explore</span>
                        Committee Members (Past Scouts)
                    </h3>
                    <div class="flex flex-col gap-1 pr-1">
                        @foreach ([
                            'Mr. Mahesh Karunaratne',
                            'Mr. Chatura Kulathilaka',
                            'Mr. Milindu Mallawaratchie',
                            'Mr. Nirodha Dias',
                            'Mr. Pasan Perera',
                            'Mr. Jayanga Perera',
                            'Mr. Harinda Fonseka',
                            'Mr. Shamil Shiraz',
                            'Mr. Ganesh Neelaghandan',
                        ] as $name)
                        <div class="flex items-center gap-2.5 py-2 text-sm text-secondary border-b border-outline-variant/10 last:border-0">
                            <span class="w-1.5 h-1.5 bg-primary/45 rounded-full shrink-0"></span>
                            <span>{{ $name }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Instructors & Active Youth Leaders --}}
                <div class="bg-surface border border-outline-variant/30 rounded-2xl p-6 md:p-8 shadow-sm">
                    <h3 class="text-xs font-bold text-secondary uppercase tracking-widest pb-3 border-b border-outline-variant/30 mb-4 flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm">badge</span>
                        Instructors & Youth Leaders
                    </h3>
                    <div class="flex flex-col gap-1 pr-1">
                        <div class="text-xs font-bold text-primary uppercase tracking-wider mb-2">Active Youth Leaders</div>
                        <div class="flex justify-between items-center py-2.5 border-b border-outline-variant/10 text-sm">
                            <span class="font-semibold text-primary">Troop Leader</span>
                            <span class="text-secondary font-medium">Mr. Ranesh Wickramatillake</span>
                        </div>
                        <div class="flex justify-between items-center py-2.5 border-b border-outline-variant/10 mb-4 text-sm">
                            <span class="font-semibold text-primary">Asst. Troop Leader</span>
                            <span class="text-secondary font-medium">Mr. Randiv Fernando</span>
                        </div>

                        <div class="text-xs font-bold text-primary uppercase tracking-wider mb-2">Instructors</div>
                        @foreach ([
                            ['Mr. Marlon Jesudason', 'Instructor'],
                            ['Mr. Imeth Kaluarachchi', 'Instructor (2021)'],
                            ['Mr. Vikkaas Sivanesarajah', 'Instructor (2022)'],
                            ['Mr. Saai Syvendra', 'Instructor (2022)'],
                            ['Mr. Chayanka Sirisena', 'Instructor (2022)'],
                            ['Mr. Vidun Wijesinghe', 'Instructor (2022)'],
                            ['Mr. Pankaja Weerasekara', 'Instructor (2022)'],
                            ['Mr. Risijaya', 'Instructor (2022)'],
                            ['Mr. Dulmeth Perera', 'Instructor (2022)'],
                            ['Mr. Dhojitha Purijjala', 'Instructor (2023)'],
                            ['Mr. Dulsith Perera', 'Instructor (2024)'],
                        ] as [$name, $role])
                        <div class="flex justify-between items-center py-2.5 border-b border-outline-variant/10 last:border-0 text-sm">
                            <span class="font-semibold text-primary">{{ $role }}</span>
                            <span class="text-secondary font-medium">{{ $name }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection
