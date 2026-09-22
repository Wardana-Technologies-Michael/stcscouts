@extends('admin.layout')

@section('admin_title', 'Admin Guide')

@section('content')

{{-- Page header --}}
<div class="mb-8">
    <div class="flex items-center gap-3 mb-3">
        <div class="w-10 h-10 rounded-xl bg-primary flex items-center justify-center shrink-0">
            <span class="material-symbols-outlined text-white text-[20px]" style="font-variation-settings:'FILL' 1;">menu_book</span>
        </div>
        <div>
            <h1 class="text-2xl font-extrabold text-slate-900 leading-none">Admin Guide</h1>
            <p class="text-sm text-slate-500 mt-0.5">Everything you need to manage this website — in plain English.</p>
        </div>
    </div>

    {{-- Quick jump nav --}}
    <div class="flex flex-wrap gap-2 mt-5">
        @foreach ([
            ['#terms',   'Key Terms'],
            ['#reports', 'Reports'],
            ['#events',  'Events'],
            ['#media',   'Media Library'],
            ['#tips',    'Tips'],
        ] as [$anchor, $label])
            <a href="{{ $anchor }}"
               class="inline-flex items-center gap-1 rounded-lg border border-slate-200 bg-white text-slate-600 text-xs font-semibold px-3 py-1.5 hover:border-primary hover:text-primary transition">
                {{ $label }}
            </a>
        @endforeach
    </div>
</div>

{{-- ══════════════════════════════════════════════════════════════
     SECTION 1 — KEY TERMS
═══════════════════════════════════════════════════════════════ --}}
<div id="terms" class="scroll-mt-8 mb-10">
    <div class="flex items-center gap-3 mb-5">
        <span class="w-7 h-7 rounded-lg bg-accent/10 text-accent flex items-center justify-center text-xs font-extrabold shrink-0">1</span>
        <h2 class="text-lg font-extrabold text-slate-900">Key Terms Explained</h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

        {{-- Slug --}}
        <div class="bg-white rounded-2xl border border-slate-200 p-5">
            <div class="flex items-center gap-2.5 mb-3">
                <span class="material-symbols-outlined text-accent text-[20px]">link</span>
                <h3 class="font-bold text-slate-800">Slug</h3>
            </div>
            <p class="text-sm text-slate-600 leading-relaxed mb-3">
                The slug is the part of the web address that identifies your page. It is <strong>automatically generated</strong> from the title you enter — you never need to set it yourself.
            </p>
            <div class="bg-slate-50 rounded-lg p-3 text-xs font-mono text-slate-600 border border-slate-100">
                <span class="text-slate-400">Title:</span> Kindling Legacy Camp 2026<br>
                <span class="text-slate-400">Slug: </span> <span class="text-accent font-bold">kindling-legacy-camp-2026</span><br>
                <span class="text-slate-400">URL:  </span> stcscouts.lk/events/<span class="text-accent font-bold">kindling-legacy-camp-2026</span>
            </div>
            <div class="mt-3 flex items-start gap-2 text-xs text-amber-700 bg-amber-50 rounded-lg p-2.5 border border-amber-100">
                <span class="material-symbols-outlined text-[14px] mt-0.5 shrink-0">warning</span>
                <span>Changing the slug after publishing will break any links shared to that page. Only change it before a page goes live.</span>
            </div>
        </div>

        {{-- Published / Draft --}}
        <div class="bg-white rounded-2xl border border-slate-200 p-5">
            <div class="flex items-center gap-2.5 mb-3">
                <span class="material-symbols-outlined text-accent text-[20px]">visibility</span>
                <h3 class="font-bold text-slate-800">Published vs. Draft</h3>
            </div>
            <p class="text-sm text-slate-600 leading-relaxed mb-3">
                Controls whether the public can see the page.
            </p>
            <div class="space-y-2">
                <div class="flex items-start gap-2.5 bg-green-50 border border-green-100 rounded-lg p-3">
                    <span class="w-2 h-2 rounded-full bg-green-500 mt-1 shrink-0"></span>
                    <div>
                        <p class="text-xs font-bold text-green-800">Published</p>
                        <p class="text-xs text-green-700 mt-0.5">Visible to everyone visiting the website.</p>
                    </div>
                </div>
                <div class="flex items-start gap-2.5 bg-slate-50 border border-slate-200 rounded-lg p-3">
                    <span class="w-2 h-2 rounded-full bg-slate-400 mt-1 shrink-0"></span>
                    <div>
                        <p class="text-xs font-bold text-slate-600">Draft</p>
                        <p class="text-xs text-slate-500 mt-0.5">Saved but hidden. Only visible inside this admin panel. Use this while you're still working on a page.</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Sort Order --}}
        <div class="bg-white rounded-2xl border border-slate-200 p-5">
            <div class="flex items-center gap-2.5 mb-3">
                <span class="material-symbols-outlined text-accent text-[20px]">sort</span>
                <h3 class="font-bold text-slate-800">Sort Order</h3>
            </div>
            <p class="text-sm text-slate-600 leading-relaxed mb-3">
                A number that controls which item appears first when there are multiple items in the same year or group. <strong>Lower numbers appear first.</strong>
            </p>
            <div class="bg-slate-50 rounded-lg p-3 border border-slate-100 space-y-1.5 text-xs text-slate-600">
                <div class="flex items-center gap-2">
                    <span class="w-5 h-5 rounded bg-primary text-white flex items-center justify-center font-bold text-[10px] shrink-0">1</span>
                    Year Report 2024 — Annual <span class="ml-auto text-slate-400">appears 1st</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="w-5 h-5 rounded bg-slate-300 text-white flex items-center justify-center font-bold text-[10px] shrink-0">2</span>
                    Escapade 2024 — Camp Report <span class="ml-auto text-slate-400">appears 2nd</span>
                </div>
            </div>
        </div>

        {{-- Banner Image --}}
        <div class="bg-white rounded-2xl border border-slate-200 p-5">
            <div class="flex items-center gap-2.5 mb-3">
                <span class="material-symbols-outlined text-accent text-[20px]">image</span>
                <h3 class="font-bold text-slate-800">Banner Image</h3>
            </div>
            <p class="text-sm text-slate-600 leading-relaxed mb-3">
                The large photograph shown at the top of a page, and on the homepage card. Choose a wide, landscape photo for best results.
            </p>
            <ul class="text-xs text-slate-500 space-y-1">
                <li class="flex items-center gap-1.5"><span class="material-symbols-outlined text-[13px] text-green-500">check</span> JPG, PNG, GIF or WebP format</li>
                <li class="flex items-center gap-1.5"><span class="material-symbols-outlined text-[13px] text-green-500">check</span> Up to 8 MB in file size</li>
                <li class="flex items-center gap-1.5"><span class="material-symbols-outlined text-[13px] text-green-500">check</span> Wide / landscape orientation works best</li>
                <li class="flex items-center gap-1.5"><span class="material-symbols-outlined text-[13px] text-slate-400">info</span> If no banner is set, the Icon is shown instead (reports only)</li>
            </ul>
        </div>

        {{-- Body HTML --}}
        <div class="bg-white rounded-2xl border border-slate-200 p-5">
            <div class="flex items-center gap-2.5 mb-3">
                <span class="material-symbols-outlined text-accent text-[20px]">code</span>
                <h3 class="font-bold text-slate-800">Body (HTML)</h3>
            </div>
            <p class="text-sm text-slate-600 leading-relaxed mb-3">
                The main content of the page. It uses HTML — the language web pages are written in. You can paste fully styled HTML from a text editor or a colleague.
            </p>
            <p class="text-sm text-slate-600 leading-relaxed mb-3">
                Basic examples you can type directly:
            </p>
            <div class="bg-slate-50 rounded-lg p-3 border border-slate-100 text-xs font-mono text-slate-600 space-y-1">
                <div><span class="text-accent">&lt;p&gt;</span>A normal paragraph of text.<span class="text-accent">&lt;/p&gt;</span></div>
                <div><span class="text-accent">&lt;h2&gt;</span>A heading<span class="text-accent">&lt;/h2&gt;</span></div>
                <div><span class="text-accent">&lt;img src=</span><span class="text-green-600">"/uploads/photo.jpg"</span><span class="text-accent"> alt=</span><span class="text-green-600">"My photo"</span><span class="text-accent">&gt;</span></div>
                <div><span class="text-accent">&lt;a href=</span><span class="text-green-600">"/uploads/docs/file.pdf"</span><span class="text-accent">&gt;</span>Download PDF<span class="text-accent">&lt;/a&gt;</span></div>
            </div>
        </div>

        {{-- Chip Label --}}
        <div class="bg-white rounded-2xl border border-slate-200 p-5">
            <div class="flex items-center gap-2.5 mb-3">
                <span class="material-symbols-outlined text-accent text-[20px]">label</span>
                <h3 class="font-bold text-slate-800">Chip Label <span class="text-xs font-semibold text-slate-400 ml-1">Reports only</span></h3>
            </div>
            <p class="text-sm text-slate-600 leading-relaxed mb-3">
                A short label shown on the timeline cards on the Year Reports page. If you leave it blank, the full title is used instead.
            </p>
            <div class="flex items-center gap-3">
                <div class="bg-slate-50 rounded-lg border border-slate-200 p-2.5 text-xs text-slate-600 flex-1 text-center">
                    <div class="text-slate-400 mb-1">Full title</div>
                    <div class="font-semibold">Year Report – Annual Gathering 2024</div>
                </div>
                <span class="material-symbols-outlined text-slate-300">arrow_forward</span>
                <div class="bg-primary/5 rounded-lg border border-primary/15 p-2.5 text-xs text-primary flex-1 text-center">
                    <div class="text-slate-400 mb-1">Chip label</div>
                    <div class="font-bold">Annual 2024</div>
                </div>
            </div>
        </div>

        {{-- Icon --}}
        <div class="bg-white rounded-2xl border border-slate-200 p-5">
            <div class="flex items-center gap-2.5 mb-3">
                <span class="material-symbols-outlined text-accent text-[20px]">interests</span>
                <h3 class="font-bold text-slate-800">Icon <span class="text-xs font-semibold text-slate-400 ml-1">Reports only</span></h3>
            </div>
            <p class="text-sm text-slate-600 leading-relaxed mb-2">
                Shown on timeline cards when no banner image is set. You pick the icon by entering its name from Google's free icon library.
            </p>
            <p class="text-sm text-slate-600 leading-relaxed mb-3">
                Common useful icons:
            </p>
            <div class="flex flex-wrap gap-2 text-xs">
                @foreach ([
                    ['description',         'description'],
                    ['local_fire_department','local_fire_department'],
                    ['military_tech',        'military_tech'],
                    ['emoji_events',         'emoji_events'],
                    ['forest',               'forest'],
                    ['groups',               'groups'],
                ] as [$icon, $name])
                    <div class="flex items-center gap-1.5 bg-slate-50 border border-slate-200 rounded-lg px-2.5 py-1.5">
                        <span class="material-symbols-outlined text-[16px] text-slate-600">{{ $icon }}</span>
                        <span class="font-mono text-slate-500">{{ $name }}</span>
                    </div>
                @endforeach
            </div>
            <p class="text-xs text-slate-400 mt-3">Browse all icons at <a href="https://fonts.google.com/icons" target="_blank" class="text-accent hover:underline">fonts.google.com/icons ↗</a></p>
        </div>

        {{-- Year --}}
        <div class="bg-white rounded-2xl border border-slate-200 p-5">
            <div class="flex items-center gap-2.5 mb-3">
                <span class="material-symbols-outlined text-accent text-[20px]">calendar_today</span>
                <h3 class="font-bold text-slate-800">Year <span class="text-xs font-semibold text-slate-400 ml-1">Reports only</span></h3>
            </div>
            <p class="text-sm text-slate-600 leading-relaxed">
                Groups a report into the correct era on the Year Reports timeline. For example, the 2024 Annual Gathering report should have <strong>Year = 2024</strong>. The system automatically places it in the correct era band (e.g. 2020–2024).
            </p>
        </div>

    </div>
</div>

{{-- ══════════════════════════════════════════════════════════════
     SECTION 2 — REPORTS
═══════════════════════════════════════════════════════════════ --}}
<div id="reports" class="scroll-mt-8 mb-10">
    <div class="flex items-center gap-3 mb-5">
        <span class="w-7 h-7 rounded-lg bg-accent/10 text-accent flex items-center justify-center text-xs font-extrabold shrink-0">2</span>
        <h2 class="text-lg font-extrabold text-slate-900">Managing Reports</h2>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden mb-4">
        <div class="border-b border-slate-100 px-5 py-4">
            <h3 class="font-bold text-slate-800">What are Reports?</h3>
            <p class="text-sm text-slate-600 mt-1 leading-relaxed">
                Reports are the historical records that appear on the <strong>Year Reports</strong> timeline at <code class="bg-slate-100 px-1 rounded text-xs">/recent-year-reports</code>. Each one can be either an <em>annual report</em> (the main yearly summary) or an <em>event entry</em> (a camp, jamboree, or one-off activity that still belongs in the historical archive).
            </p>
        </div>
        <div class="px-5 py-4 bg-blue-50/50">
            <p class="text-xs font-semibold text-blue-800 mb-1">Reports vs. Events — which should I use?</p>
            <p class="text-xs text-blue-700 leading-relaxed">Use <strong>Reports</strong> for anything that belongs in the historical archive — year reports, past camps, old jamborees. Use <strong>Events</strong> (in the sidebar) for <em>current or upcoming</em> event pages that need their own dedicated page and appear in the main navigation.</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 p-5">
        <h3 class="font-bold text-slate-800 mb-4">How to create a new report — step by step</h3>
        <ol class="space-y-4">
            @foreach ([
                ['Click <strong>Reports</strong> in the left sidebar, then click the <strong>+ New Report</strong> button in the top right corner.', null],
                ['Enter a <strong>Title</strong>. This is the main heading shown on the page and on the timeline card.', null],
                ['Write or paste your <strong>HTML content</strong> in the Body field. You can also use the image upload button (just above the body field) to insert a photo directly into the content at the cursor position.', null],
                ['In the right panel, set the <strong>Year</strong> — the year this report belongs to (e.g. 2024).', null],
                ['Choose the <strong>Type</strong>: "Report (annual)" for yearly summaries, or "Event" for a specific camp or trip.', null],
                ['Optionally add a <strong>Chip Label</strong> (short timeline label), <strong>Icon</strong>, or <strong>Banner Image</strong>.', null],
                ['The <strong>URL Slug</strong> is filled in automatically — you do not need to touch it.', null],
                ['Tick <strong>Published</strong> if you want the report to be visible on the site right away. Leave it unticked to save as a draft.', null],
                ['Click <strong>Create report</strong>. Done.', null],
            ] as $i => [$step, $note])
                <li class="flex gap-3.5">
                    <span class="w-6 h-6 rounded-full bg-primary text-white text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">{{ $i + 1 }}</span>
                    <div class="text-sm text-slate-600 leading-relaxed">{!! $step !!}</div>
                </li>
            @endforeach
        </ol>
    </div>
</div>

{{-- ══════════════════════════════════════════════════════════════
     SECTION 3 — EVENTS
═══════════════════════════════════════════════════════════════ --}}
<div id="events" class="scroll-mt-8 mb-10">
    <div class="flex items-center gap-3 mb-5">
        <span class="w-7 h-7 rounded-lg bg-accent/10 text-accent flex items-center justify-center text-xs font-extrabold shrink-0">3</span>
        <h2 class="text-lg font-extrabold text-slate-900">Managing Events</h2>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden mb-4">
        <div class="border-b border-slate-100 px-5 py-4">
            <h3 class="font-bold text-slate-800">What are Events?</h3>
            <p class="text-sm text-slate-600 mt-1 leading-relaxed">
                Events are <strong>full standalone pages</strong> for current or upcoming activities — like the Kindling Legacy camp. They have their own dedicated web address (e.g. <code class="bg-slate-100 px-1 rounded text-xs">/events/kindling-legacy</code>) and automatically appear in the <strong>website's main navigation bar</strong>.
            </p>
        </div>
        <div class="px-5 py-4 bg-green-50/50">
            <p class="text-xs font-semibold text-green-800 mb-1">The navigation updates automatically</p>
            <p class="text-xs text-green-700 leading-relaxed">When you publish an event here, it appears in the navigation for all visitors immediately — no extra steps needed. If there is only one event, it shows as a direct link. If there are two or more, a dropdown menu appears automatically.</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 p-5 mb-4">
        <h3 class="font-bold text-slate-800 mb-4">How to create a new event — step by step</h3>
        <ol class="space-y-4">
            @foreach ([
                'Click <strong>Events</strong> in the left sidebar, then click <strong>+ New Event</strong>.',
                'Enter the <strong>Title</strong> (e.g. "Kindling Legacy Scout Camp 2026") and an optional <strong>Subtitle</strong> (a short tagline).',
                'Paste your event\'s HTML content into the <strong>Body</strong> field. This is the full page content — the hero section, schedule, downloads, everything. Use the Media Library to find the URLs of any images or PDFs you need.',
                'Set the <strong>Start Date</strong> and <strong>End Date</strong> in the right panel.',
                'Type the <strong>Location</strong> (e.g. "S. Thomas\' College, Mount Lavinia").',
                'Optionally upload a <strong>Banner Image</strong>.',
                'The <strong>URL Slug</strong> is generated automatically from the title.',
                'Tick <strong>Published</strong> to make the event live and add it to the navigation.',
                'Click <strong>Create event</strong>. The event page is now live at <code class="bg-slate-100 px-1 rounded text-xs">/events/your-slug</code>.',
            ] as $i => $step)
                <li class="flex gap-3.5">
                    <span class="w-6 h-6 rounded-full bg-primary text-white text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">{{ $i + 1 }}</span>
                    <div class="text-sm text-slate-600 leading-relaxed">{!! $step !!}</div>
                </li>
            @endforeach
        </ol>
    </div>
</div>

{{-- ══════════════════════════════════════════════════════════════
     SECTION 4 — MEDIA LIBRARY
═══════════════════════════════════════════════════════════════ --}}
<div id="media" class="scroll-mt-8 mb-10">
    <div class="flex items-center gap-3 mb-5">
        <span class="w-7 h-7 rounded-lg bg-accent/10 text-accent flex items-center justify-center text-xs font-extrabold shrink-0">4</span>
        <h2 class="text-lg font-extrabold text-slate-900">Using the Media Library</h2>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden mb-4">
        <div class="px-5 py-4 border-b border-slate-100">
            <h3 class="font-bold text-slate-800">What is the Media Library?</h3>
            <p class="text-sm text-slate-600 mt-1 leading-relaxed">
                The Media Library is where you store all the files used on the website — photos, PDFs, documents. Once a file is uploaded, you can copy its web address (URL) and paste it into any page's body content to display the image or link to the document.
            </p>
        </div>
        <div class="px-5 py-4">
            <h3 class="font-bold text-slate-800 mb-3">Supported file types</h3>
            <div class="grid grid-cols-2 gap-2 text-sm">
                <div class="flex items-center gap-2 text-slate-600">
                    <span class="material-symbols-outlined text-[16px] text-blue-500">image</span>
                    Images (JPG, PNG, GIF, WebP, SVG)
                </div>
                <div class="flex items-center gap-2 text-slate-600">
                    <span class="material-symbols-outlined text-[16px] text-red-500" style="font-variation-settings:'FILL' 1;">picture_as_pdf</span>
                    PDF documents
                </div>
                <div class="flex items-center gap-2 text-slate-600">
                    <span class="material-symbols-outlined text-[16px] text-blue-700" style="font-variation-settings:'FILL' 1;">description</span>
                    Word documents (DOC, DOCX)
                </div>
                <div class="flex items-center gap-2 text-slate-500 text-xs">
                    <span class="material-symbols-outlined text-[16px]">info</span>
                    Up to 16 MB per file
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 p-5 mb-4">
        <h3 class="font-bold text-slate-800 mb-4">How to upload and use a file</h3>
        <ol class="space-y-4">
            @foreach ([
                'Click <strong>Media Library</strong> in the left sidebar.',
                '(Optional but recommended) <strong>Create a folder</strong> to keep things organised. Click "New folder" and give it a clear name like <code class="bg-slate-100 px-1 rounded text-xs">events</code> or <code class="bg-slate-100 px-1 rounded text-xs">kindling-legacy</code>. Folder names can only use letters, numbers, and hyphens.',
                'Open the folder you want to upload into. Click <strong>Upload here</strong>, choose your file, and click Upload.',
                'Once uploaded, the file appears in the grid. Click <strong>Copy URL</strong> on the file card.',
                'Go to the Report or Event you want to add the file to, open the Body field, and paste the URL into your HTML.',
            ] as $i => $step)
                <li class="flex gap-3.5">
                    <span class="w-6 h-6 rounded-full bg-primary text-white text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">{{ $i + 1 }}</span>
                    <div class="text-sm text-slate-600 leading-relaxed">{!! $step !!}</div>
                </li>
            @endforeach
        </ol>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 p-5 mb-4">
        <h3 class="font-bold text-slate-800 mb-3">How to use a file in page content</h3>
        <p class="text-sm text-slate-600 mb-4 leading-relaxed">Once you have the URL from "Copy URL", paste it into the body field using one of these HTML patterns:</p>

        <div class="space-y-3">
            <div>
                <p class="text-xs font-bold text-slate-500 uppercase tracking-wide mb-1.5">Displaying an image</p>
                <div class="bg-slate-900 rounded-xl p-4 font-mono text-xs leading-relaxed">
                    <span class="text-blue-300">&lt;img</span>
                    <span class="text-green-300"> src</span><span class="text-white">=</span><span class="text-amber-300">"/uploads/events/campsite-map-a1b2c3d4.jpg"</span>
                    <span class="text-green-300"> alt</span><span class="text-white">=</span><span class="text-amber-300">"Campsite map"</span>
                    <span class="text-green-300"> style</span><span class="text-white">=</span><span class="text-amber-300">"width:100%;"</span>
                    <span class="text-blue-300">&gt;</span>
                </div>
            </div>

            <div>
                <p class="text-xs font-bold text-slate-500 uppercase tracking-wide mb-1.5">Linking to a PDF for download</p>
                <div class="bg-slate-900 rounded-xl p-4 font-mono text-xs leading-relaxed">
                    <span class="text-blue-300">&lt;a</span>
                    <span class="text-green-300"> href</span><span class="text-white">=</span><span class="text-amber-300">"/uploads/docs/invitation-a1b2c3d4.pdf"</span>
                    <span class="text-green-300"> download</span>
                    <span class="text-blue-300">&gt;</span>
                    <span class="text-white">Download Invitation PDF</span>
                    <span class="text-blue-300">&lt;/a&gt;</span>
                </div>
            </div>

            <div class="bg-blue-50 border border-blue-100 rounded-xl p-3.5">
                <p class="text-xs font-semibold text-blue-800 mb-1">Tip: use the inline image uploader for speed</p>
                <p class="text-xs text-blue-700 leading-relaxed">When editing a Report or Event, there is an "Upload image" button just above the body field. Click it, choose a photo, and it is automatically uploaded and inserted at the cursor position — no need to visit the Media Library at all.</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 p-5">
        <h3 class="font-bold text-slate-800 mb-3">Suggested folder structure</h3>
        <p class="text-sm text-slate-600 mb-4 leading-relaxed">There is no required structure, but keeping files in organised folders makes it much easier to find things later. A good starting point:</p>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
            @foreach ([
                ['events',  'Photos and docs for specific events'],
                ['reports', 'Images used in year reports'],
                ['docs',    'PDFs, invitation letters, forms'],
                ['photos',  'General troop photography'],
                ['banners', 'Banner images for pages'],
            ] as [$name, $desc])
                <div class="bg-slate-50 rounded-xl border border-slate-200 p-3">
                    <div class="flex items-center gap-1.5 mb-1">
                        <span class="material-symbols-outlined text-[16px] text-amber-500" style="font-variation-settings:'FILL' 1;">folder</span>
                        <span class="text-xs font-bold text-slate-700 font-mono">{{ $name }}/</span>
                    </div>
                    <p class="text-[11px] text-slate-500">{{ $desc }}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>

{{-- ══════════════════════════════════════════════════════════════
     SECTION 5 — TIPS
═══════════════════════════════════════════════════════════════ --}}
<div id="tips" class="scroll-mt-8 mb-6">
    <div class="flex items-center gap-3 mb-5">
        <span class="w-7 h-7 rounded-lg bg-accent/10 text-accent flex items-center justify-center text-xs font-extrabold shrink-0">5</span>
        <h2 class="text-lg font-extrabold text-slate-900">Tips & Common Questions</h2>
    </div>

    <div class="space-y-3">
        @foreach ([
            [
                'How do I change the order of items on the timeline?',
                'Open the report you want to move and change its <strong>Sort Order</strong> number. Reports with lower numbers appear first within the same year. For example, if you have two 2024 reports and want one to appear above the other, set its sort order to 1 and the other\'s to 2.',
            ],
            [
                'I published something but it\'s not showing on the site.',
                'Make sure the <strong>Published</strong> checkbox is ticked and you have saved. Also check that the year is set correctly — a report with the wrong year may not appear where you expect it on the timeline.',
            ],
            [
                'Can I delete a file from the Media Library if it\'s still used on a page?',
                'Yes, but the image or PDF will disappear from the page it was used on, showing a broken link instead. Always check that a file is no longer needed before deleting it.',
            ],
            [
                'What happens if I delete an event?',
                'The event page and its banner image are permanently deleted. The event will also disappear from the navigation immediately. This cannot be undone — if in doubt, set it to Draft instead.',
            ],
            [
                'The slug says "changing this breaks old links" — should I worry?',
                'Only if the page has already been shared or linked to from outside the website (email, WhatsApp, another site). If the page is new and hasn\'t been shared yet, it\'s fine to change the slug to something cleaner.',
            ],
            [
                'How do I preview a page without making it public?',
                'Save the report or event as a Draft (uncheck Published). Then open the edit form and click the <strong>Preview ↗</strong> button — this opens the page directly even though it\'s hidden from visitors.',
            ],
        ] as [$q, $a])
            <div class="bg-white rounded-2xl border border-slate-200 p-5">
                <p class="text-sm font-bold text-slate-800 mb-2">{{ $q }}</p>
                <p class="text-sm text-slate-600 leading-relaxed">{!! $a !!}</p>
            </div>
        @endforeach
    </div>
</div>

{{-- Footer --}}
<div class="text-center py-6 border-t border-slate-200 mt-8">
    <p class="text-xs text-slate-400">STCSCOUTS Admin · If something is broken or unclear, ask your site developer.</p>
</div>

@endsection
