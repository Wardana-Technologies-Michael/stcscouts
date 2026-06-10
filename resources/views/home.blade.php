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
    <div class="relative z-10 max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop text-center text-on-primary">
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
        <!-- Activity 1 -->
        <article class="bg-surface rounded-xl border border-outline-variant/60 overflow-hidden flex flex-col group shadow-sm hover:shadow-md transition-all duration-300">
          <div class="h-52 overflow-hidden relative">
            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" 
                 alt="Mount Baldy Summit Hike" 
                 src="https://lh3.googleusercontent.com/aida-public/AB6AXuANSxw24CvT31aOJLUMhWHmo90QbwGPxVT5-yf-MvxkhbDSDsaLeCklN5uZv-HsDoejgyK9Lf211yDRT8RLeBFhnc0y7lf9wKJ6TTEgA6Lt2DrkZBQFjBu9i5_7mxR2ZPYWfKRzDF12e275DMduHeDpqUcvtTui4S5YQsdcXpWPKSa20HI8GAWA1L_jLw15cpdPRzyXQHgk8lE36JVrOWS5lsMXLkmLTxmfnAQlnOXXfhyHF8Kjs2mMx8W1Dr2aDxKbiFlQOaSYFfp9"/>
            <div class="absolute top-4 left-4 bg-primary text-on-primary text-xs font-semibold px-3 py-1 rounded">Expedition</div>
          </div>
          <div class="p-6 flex-1 flex flex-col">
            <div class="text-xs text-secondary mb-3 flex items-center gap-2">
              <span class="material-symbols-outlined text-sm">calendar_today</span>
              Oct 12, 2025
            </div>
            <h3 class="text-title-lg font-bold text-primary mb-3">Mount Baldy Summit Hike</h3>
            <p class="text-body-md text-secondary mb-6 flex-1 leading-relaxed">
              A challenging 10-mile hike to the summit, testing scouts' physical endurance, group navigation, and outdoor survival teamwork.
            </p>
            <a class="text-primary hover:text-tertiary font-bold text-xs tracking-wider uppercase inline-flex items-center gap-1 w-fit transition-colors" href="{{ url('photo-gallery') }}">
              View Details <span class="material-symbols-outlined text-sm">chevron_right</span>
            </a>
          </div>
        </article>

        <!-- Activity 2 -->
        <article class="bg-surface rounded-xl border border-outline-variant/60 overflow-hidden flex flex-col group shadow-sm hover:shadow-md transition-all duration-300">
          <div class="h-52 overflow-hidden relative">
            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" 
                 alt="Pioneering Skills Bridge Building" 
                 src="https://lh3.googleusercontent.com/aida-public/AB6AXuAuyR3alUjs_cF3UjNsp8RWpnxbrmNhYzdYknLZ9UK3GeYYkX-WfylVq_F5d5WJx9GxgATQjz_F5M_IT9gtabM_chT1OwqsKhZwoX9d6eAhYrEEOMBT2ZBpj3-XEis_1tT4IlUAR5HdDtUZFc69X8WH2sNfLlliplFbrHjUE4VKiV8Fl1E9HgJ78MPQi5jmOFbnBPVgozmz35L_kgo5mOrFr5qlRGWVrdD6pQbJRPneI8ujCVemBC4fnixBldVNedbbSBQ7ZQur12YK"/>
            <div class="absolute top-4 left-4 bg-primary text-on-primary text-xs font-semibold px-3 py-1 rounded">Skills</div>
          </div>
          <div class="p-6 flex-1 flex flex-col">
            <div class="text-xs text-secondary mb-3 flex items-center gap-2">
              <span class="material-symbols-outlined text-sm">calendar_today</span>
              Sep 28, 2025
            </div>
            <h3 class="text-title-lg font-bold text-primary mb-3">Pioneering Skills Weekend</h3>
            <p class="text-body-md text-secondary mb-6 flex-1 leading-relaxed">
              Applying advanced knots and lashings to design and erect a stable, functional rope bridge across the local creek.
            </p>
            <a class="text-primary hover:text-tertiary font-bold text-xs tracking-wider uppercase inline-flex items-center gap-1 w-fit transition-colors" href="{{ url('badgework-new-syllabus') }}">
              View Syllabus <span class="material-symbols-outlined text-sm">chevron_right</span>
            </a>
          </div>
        </article>

        <!-- Activity 3 -->
        <article class="bg-surface rounded-xl border border-outline-variant/60 overflow-hidden flex flex-col group shadow-sm hover:shadow-md transition-all duration-300">
          <div class="h-52 overflow-hidden relative">
            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" 
                 alt="Local Park Restoration Project" 
                 src="https://lh3.googleusercontent.com/aida-public/AB6AXuClkJa-eXrSRCQDwTifF-k3r-z7XmCEAWizhz49ciwfuvQ6U0tSg81FvuZqJO0sZdihX1ojtv-5JzvKopW2Xd6tcIvoEL4Fyyy0Uf7cnQkqQtooMH4gDBWwstsTVaKG8A_7wTvlPnOpFP-dtjufGT_ebL0yRoe6beeF-f5cNsfdnnNFKWK1iyZgpkg9ybF822g7Ddv8wT3ksUws7KkKN6EqpDEDXGLWTmG41SnDoBotD8TAVmLs74611Sjkt-G_VRYLAritpRNIFDz0"/>
            <div class="absolute top-4 left-4 bg-primary text-on-primary text-xs font-semibold px-3 py-1 rounded">Service</div>
          </div>
          <div class="p-6 flex-1 flex flex-col">
            <div class="text-xs text-secondary mb-3 flex items-center gap-2">
              <span class="material-symbols-outlined text-sm">calendar_today</span>
              Sep 15, 2025
            </div>
            <h3 class="text-title-lg font-bold text-primary mb-3">Local Park Restoration</h3>
            <p class="text-body-md text-secondary mb-6 flex-1 leading-relaxed">
              Scouts cleared invasive growth and planted over 50 native trees, contributing to environmental conservation and park beauty.
            </p>
            <a class="text-primary hover:text-tertiary font-bold text-xs tracking-wider uppercase inline-flex items-center gap-1 w-fit transition-colors" href="{{ url('/contact') }}">
              Get Involved <span class="material-symbols-outlined text-sm">chevron_right</span>
            </a>
          </div>
        </article>
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
