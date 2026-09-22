@extends('layouts.master')

@section('content')
<main class="bg-background text-on-background min-h-screen">
  <!-- Hero Section -->
  <section class="relative h-[70vh] min-h-[500px] w-full flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
      <img class="w-full h-full object-cover object-center" 
           alt="STC Scouts Campfire Dusk" 
           src="{{ asset('images/front_slide.jpg') }}"/>
      <div class="absolute inset-0 bg-primary/65 backdrop-blur-[2px]"></div>
    </div>
    <div class="relative z-10 w-full max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop flex items-center justify-between gap-6">
      <!-- Left Logo -->
      <div class="hidden lg:block w-28 xl:w-36 shrink-0 select-none pointer-events-none animate-[tpFadeUp_0.6s_ease_both]">
        <img class="w-full h-auto drop-shadow-[0_10px_20px_rgba(0,0,0,0.4)]" 
             alt="S. Thomas' College Crest" 
             src="{{ asset('images/stc_crest_clean.png') }}"/>
      </div>

      <!-- Center Content -->
      <div class="flex-1 text-center text-on-primary">
        <h1 class="text-display font-display font-bold text-on-primary mb-stack-md max-w-4xl mx-auto tracking-tight drop-shadow-md leading-tight">
          Prepared. For Life.
        </h1>
        <div class="relative max-w-3xl mx-auto mb-stack-lg px-8 py-6">
          <!-- Soft Feathered Dark Vignette (No Sharp Edges) -->
          <div class="absolute inset-x-4 inset-y-2 z-0 bg-primary/95 rounded-full filter blur-2xl pointer-events-none"></div>
          <!-- Text Layer -->
          <p class="relative z-10 text-body-lg font-normal text-white leading-relaxed mb-0" style="text-shadow: 0 1px 4px rgba(0,0,0,0.8), 0 0 6px rgba(0,0,0,0.4);">
            The Official Web Portal of the 16th Colombo Scout Group of S. Thomas' College, Mount Lavinia. Combines knowledge with fun to build character and foster citizenship.
          </p>
        </div>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
          <a href="{{ url('/contact') }}" 
             class="inline-flex justify-center items-center bg-surface text-primary font-bold text-sm tracking-wider uppercase px-8 py-4 rounded border border-transparent hover:bg-surface-container transition-all shadow-sm w-full sm:w-auto">
            Join Our Troop
          </a>
          <a href="{{ url('/troop') }}" 
             class="inline-flex justify-center items-center border border-surface text-surface hover:bg-black hover:border-black font-bold text-sm tracking-wider uppercase px-8 py-4 rounded transition-all w-full sm:w-auto">
            About Us
          </a>
        </div>
      </div>

      <!-- Right Logo -->
      <div class="hidden lg:block w-28 xl:w-36 shrink-0 select-none pointer-events-none animate-[tpFadeUp_0.6s_ease_both]">
        <img class="w-full h-auto drop-shadow-[0_10px_20px_rgba(0,0,0,0.4)]" 
             alt="World Scout Emblem" 
             src="{{ asset('images/world_scout_clean.png') }}"/>
      </div>
    </div>
  </section>

  <!-- Word Rotator / Core Philosophy -->
  <section class="py-20 bg-surface-container-lowest border-b border-outline-variant/35">
    <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop text-center">
      <div class="mb-8">
        <span class="text-3xl md:text-5xl font-bold text-primary">Are you a </span>
        <span class="inline-block bg-primary text-on-primary px-4 py-1.5 rounded-lg text-3xl md:text-5xl font-bold transition-all duration-350 ease-in-out min-w-[200px]" id="rotator-text">Smart</span>
        <span class="text-3xl md:text-5xl font-bold text-primary"> Citizen?</span>
      </div>
      <p class="text-body-lg text-on-background max-w-3xl mx-auto leading-relaxed">
        Scouting is a worldwide youth movement aimed at producing community-minded, independent, and capable young leaders who look beyond self-interest. 
        As the <strong>"Model Scout Group"</strong> of Sri Lanka for over a century, the 16th Colombo Scout Group combines tradition with outdoor learning.
      </p>
    </div>
  </section>

  <!-- Our Values Bento Grid -->
  <section class="py-24 bg-surface">
    <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
      <div class="mb-16 text-center">
        <h2 class="text-headline-lg font-bold text-primary mb-4">Our Values</h2>
        <p class="text-body-lg text-secondary max-w-2xl mx-auto">
          The core principles that guide our scouts and shape their growth.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Value 1: Adventure -->
        <div class="bg-surface-container rounded-xl p-8 border border-outline-variant/30 hover:border-primary/20 transition-all duration-300 md:col-span-2 flex flex-col justify-between">
          <div>
            <span class="material-symbols-outlined text-4xl text-primary mb-4">explore</span>
            <h3 class="text-title-lg font-bold text-primary mb-3">Adventure &amp; Outdoors</h3>
            <p class="text-body-md text-secondary leading-relaxed">
              We believe in the transformative power of nature. Through regular camping, rugged hiking expeditions, and survival training, scouts learn resilience, self-reliance, and deep respect for the environment.
            </p>
          </div>
        </div>

        <!-- Value 2: Service -->
        <div class="bg-surface-container rounded-xl p-8 border border-outline-variant/30 hover:border-primary/20 transition-all duration-300 flex flex-col justify-between">
          <div>
            <span class="material-symbols-outlined text-4xl text-primary mb-4">handshake</span>
            <h3 class="text-title-lg font-bold text-primary mb-3">Community Service</h3>
            <p class="text-body-md text-secondary leading-relaxed">
              Giving back is at our core. We engage in community development and park restoration projects, driving social responsibility in our youth.
            </p>
          </div>
        </div>

        <!-- Value 3: Leadership -->
        <div class="bg-surface-container rounded-xl p-8 border border-outline-variant/30 hover:border-primary/20 transition-all duration-300 flex flex-col justify-between">
          <div>
            <span class="material-symbols-outlined text-4xl text-primary mb-4">verified_user</span>
            <h3 class="text-title-lg font-bold text-primary mb-3">Character &amp; Leadership</h3>
            <p class="text-body-md text-secondary leading-relaxed">
              Fostering integrity, discipline, and ethical decision-making. We empower scouts to take command of patrols and lead with honor.
            </p>
          </div>
        </div>

        <!-- Value 4: Skill Development -->
        <div class="bg-surface-container rounded-xl p-8 border border-outline-variant/30 hover:border-primary/20 transition-all duration-300 md:col-span-2 relative overflow-hidden group">
          <div class="absolute inset-0 bg-primary/5 group-hover:bg-primary/10 transition-colors duration-300 z-0"></div>
          <div class="relative z-10 flex flex-col justify-between h-full">
            <div>
              <span class="material-symbols-outlined text-4xl text-primary mb-4">school</span>
              <h3 class="text-title-lg font-bold text-primary mb-3">Skill Development</h3>
              <p class="text-body-md text-secondary leading-relaxed">
                From emergency first aid to pioneering and map work, our structured syllabus and merit badge programs offer diverse, hands-on learning that prepares youth for real-world challenges.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Historical Spotlight / About the Troop Card -->
  <section class="py-20 bg-surface-container-low border-t border-b border-outline-variant/30">
    <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
      <div class="bg-surface rounded-xl border border-outline-variant/40 overflow-hidden shadow-sm flex flex-col lg:flex-row items-center">
        <div class="w-full lg:w-1/2 h-80 lg:h-[450px] overflow-hidden">
          <img class="w-full h-full object-cover" 
               alt="16th Colombo Scout Group Historical Portrait" 
               src="{{ asset('images/16th-Colombo-Scout-Troop2.jpg') }}"/>
        </div>
        <div class="w-full lg:w-1/2 p-8 md:p-12 flex flex-col gap-6">
          <span class="text-xs font-bold text-tertiary tracking-widest uppercase">Over A Centenary of Excellence</span>
          <h2 class="text-headline-lg font-bold text-primary leading-tight">The Heritage of S. Thomas' College Scouts</h2>
          <p class="text-body-md text-secondary leading-relaxed">
            The 16th Colombo Scout Group was founded with a vision to build character and foster growth. Combining traditional scouting skills with modern leadership training, our troop has established a legendary standard on the island, producing outstanding citizens, President's Scouts, and leaders in all sectors of society.
          </p>
          <div class="flex flex-wrap gap-4 mt-2">
            <a href="{{ url('history-of-scouting-at-college') }}" 
               class="inline-flex items-center gap-2 bg-primary text-on-primary font-bold text-xs tracking-wider uppercase px-6 py-3.5 rounded hover:bg-primary-container transition-all">
              Descriptive History
              <span class="material-symbols-outlined text-sm">arrow_forward</span>
            </a>
            <a href="{{ url('troop-profile') }}" 
               class="inline-flex items-center gap-2 border border-secondary text-secondary hover:bg-secondary-container/20 font-bold text-xs tracking-wider uppercase px-6 py-3.5 rounded transition-all">
              Present Troop Profile
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Recent Activities -->
  <section class="py-24 bg-surface">
    <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
      <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-16 gap-4">
        <div>
          <h2 class="text-headline-lg font-bold text-primary mb-2">Recent Activities</h2>
          <p class="text-body-lg text-secondary">See what the 16th Colombo Scout Group has been up to lately.</p>
        </div>
        <a href="{{ url('photo-gallery') }}" 
           class="inline-flex items-center gap-2 text-primary hover:text-tertiary font-bold text-sm tracking-wider uppercase transition-colors">
          View Photo Gallery
          <span class="material-symbols-outlined text-base">arrow_forward</span>
        </a>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse (($recentReports ?? collect()) as $report)
        <article class="bg-surface rounded-xl border border-outline-variant/60 overflow-hidden flex flex-col group shadow-sm hover:shadow-md transition-all duration-300">
          <div class="h-52 overflow-hidden relative bg-primary flex items-center justify-center">
            @if ($report->banner_url)
              <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                   alt="{{ $report->chip_label_text }}" src="{{ $report->banner_url }}"/>
            @else
              <span class="material-symbols-outlined text-on-primary opacity-90 transition-transform duration-500 group-hover:scale-110" style="font-size:72px;">{{ $report->icon }}</span>
            @endif
            <div class="absolute top-4 left-4 bg-on-primary/95 text-primary text-xs font-semibold px-3 py-1 rounded capitalize">{{ $report->category }}</div>
          </div>
          <div class="p-6 flex-1 flex flex-col">
            <div class="text-xs text-secondary mb-3 flex items-center gap-2">
              <span class="material-symbols-outlined text-sm">calendar_today</span>
              {{ $report->year }}
            </div>
            <h3 class="text-title-lg font-bold text-primary mb-3">{{ $report->chip_label_text }}</h3>
            <p class="text-body-md text-secondary mb-6 flex-1 leading-relaxed">
              {{ \Illuminate\Support\Str::limit(trim(strip_tags($report->body ?? '')), 140) ?: 'Read the full ' . $report->category . ' from the Year Reports archive.' }}
            </p>
            <a class="text-primary hover:text-tertiary font-bold text-xs tracking-wider uppercase inline-flex items-center gap-1 w-fit transition-colors" href="{{ url('/' . $report->slug) }}">
              View Details <span class="material-symbols-outlined text-sm">chevron_right</span>
            </a>
          </div>
        </article>
        @empty
        <p class="text-body-md text-secondary col-span-full">No reports have been published yet.</p>
        @endforelse
      </div>
    </div>
  </section>
</main>

<!-- Vanilla JavaScript Word Rotator -->
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const words = ["Smart", "Courteous", "Obedient", "Useful", "Trustworthy"];
    let index = 0;
    const el = document.getElementById('rotator-text');
    setInterval(() => {
      index = (index + 1) % words.length;
      el.classList.add('opacity-0', 'scale-95');
      setTimeout(() => {
        el.textContent = words[index];
        el.classList.remove('opacity-0', 'scale-95');
      }, 250);
    }, 2000);
  });
</script>
@endsection
