<!-- TopNavBar -->
<nav class="bg-surface/85 backdrop-blur-md border-b border-outline-variant/30 w-full h-16 sticky top-0 z-50 shadow-sm shadow-primary/5">
  <div class="flex justify-between items-center max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop h-full">
    <!-- Brand / Logo -->
    <a href="{{ url('/') }}" class="flex items-center gap-3 hover:scale-[1.01] transition-transform duration-300 shrink-0 whitespace-nowrap">
      <img alt="STC Scouts Logo" class="h-10 w-10 object-contain rounded-full border border-primary shrink-0" src="{{ asset('images/stcscouts_logo.jpg') }}"/>
      <div class="flex flex-col whitespace-nowrap">
        <span class="text-title-lg font-bold text-primary tracking-tight leading-none whitespace-nowrap">16th Colombo</span>
        <span class="text-xs font-semibold text-secondary tracking-wider uppercase whitespace-nowrap">S. Thomas' College</span>
      </div>
    </a>

    <!-- Desktop Navigation Links -->
    <div class="hidden lg:flex items-center gap-0.5 xl:gap-1.5 h-full">
      <!-- Home -->
      <a class="text-secondary hover:text-primary font-semibold text-xs xl:text-sm px-2 xl:px-3 py-1.5 rounded-lg hover:bg-primary/5 transition-all duration-300 whitespace-nowrap" href="{{ url('/') }}">Home</a>

      <!-- Kindling Legacy -->
      <a class="text-secondary hover:text-primary font-semibold text-xs xl:text-sm px-2 xl:px-3 py-1.5 rounded-lg hover:bg-primary/5 transition-all duration-300 whitespace-nowrap" href="{{ url('/kindling-legacy') }}">Kindling Legacy</a>

      <!-- The Troop -->
      <div class="relative group nav-group h-full flex items-center">
        <button class="flex items-center gap-1 text-secondary hover:text-primary font-semibold text-xs xl:text-sm px-2 xl:px-3 py-1.5 rounded-lg hover:bg-primary/5 transition-all duration-300 focus:outline-none whitespace-nowrap">
          The Troop
          <span class="material-symbols-outlined text-sm font-bold transition-transform duration-300 group-hover:rotate-180 rotate-on-hover inline-block">keyboard_arrow_down</span>
        </button>
        <div class="absolute left-[-120px] top-full w-[720px] bg-surface border border-outline-variant/60 rounded-2xl shadow-xl shadow-primary/10 hidden group-hover:block nav-dropdown z-50 p-6">
          <div class="grid grid-cols-3 gap-6">
            <!-- Column 1: Present Troop -->
            <div>
              <h5 class="text-xs font-bold text-primary uppercase tracking-wider mb-3 pb-1.5 border-b border-outline-variant/30">The Troop</h5>
              <div class="flex flex-col gap-1">
                <a class="block text-sm text-secondary hover:text-primary hover:bg-primary/5 px-2.5 py-1.5 rounded-lg transition-all" href="{{ url('troop') }}">The Troop Overview</a>
                <a class="block text-sm text-secondary hover:text-primary hover:bg-primary/5 px-2.5 py-1.5 rounded-lg transition-all" href="{{ url('troop-profile') }}">Present Troop Profile</a>
                <a class="block text-sm text-secondary hover:text-primary hover:bg-primary/5 px-2.5 py-1.5 rounded-lg transition-all" href="{{ url('the-group-committee') }}">The Group Committee</a>
                <a class="block text-sm text-secondary hover:text-primary hover:bg-primary/5 px-2.5 py-1.5 rounded-lg transition-all" href="{{ url('the-scout-dunk') }}">Request the Scout Dunk</a>
              </div>
            </div>

            <!-- Column 2: The Evolution -->
            <div>
              <h5 class="text-xs font-bold text-primary uppercase tracking-wider mb-3 pb-1.5 border-b border-outline-variant/30">The Evolution</h5>
              <div class="flex flex-col gap-1">
                <a class="block text-sm text-secondary hover:text-primary hover:bg-primary/5 px-2.5 py-1.5 rounded-lg transition-all" href="{{ url('history-of-scouting-at-college') }}">The Beginnings: 1912-1948</a>
                <a class="block text-sm text-secondary hover:text-primary hover:bg-primary/5 px-2.5 py-1.5 rounded-lg transition-all" href="{{ url('history-of-scouting-at-college-2') }}">Post-war Scouting: 1948-1968</a>
                <a class="block text-sm text-secondary hover:text-primary hover:bg-primary/5 px-2.5 py-1.5 rounded-lg transition-all" href="{{ url('history-of-scouting-at-college-3') }}">The Recent Times: 1968-Present</a>
                <div class="h-[1px] bg-outline-variant/30 my-1 mx-2.5"></div>
                <a class="block text-sm text-secondary hover:text-primary hover:bg-primary/5 px-2.5 py-1.5 rounded-lg transition-all" href="{{ url('mr-w-i-muttiah') }}">Mr. W.I. Muttiah</a>
                <a class="block text-sm text-secondary hover:text-primary hover:bg-primary/5 px-2.5 py-1.5 rounded-lg transition-all" href="{{ url('mr-rex-jayasinha') }}">Mr. Rex Jayasingha</a>
                <div class="h-[1px] bg-outline-variant/30 my-1 mx-2.5"></div>
                <a class="block text-sm text-secondary hover:text-primary hover:bg-primary/5 px-2.5 py-1.5 rounded-lg transition-all" href="{{ url('/Past-Troop-Leaders') }}">Past Troop Leaders</a>
                <a class="block text-sm text-secondary hover:text-primary hover:bg-primary/5 px-2.5 py-1.5 rounded-lg transition-all" href="{{ url('/King\'s-and-Queen\'s-Scouts') }}">King's & Queen's Scouts</a>
                <a class="block text-sm text-secondary hover:text-primary hover:bg-primary/5 px-2.5 py-1.5 rounded-lg transition-all" href="{{ url('/President\'s-Award-Winners') }}">President's Award Winners</a>
              </div>
            </div>

            <!-- Column 3: Year Reports (all ranges) -->
            <div>
              <h5 class="text-xs font-bold text-primary uppercase tracking-wider mb-3 pb-1.5 border-b border-outline-variant/30">Year Reports</h5>
              <div class="flex flex-col gap-1">
                <a class="block text-sm text-secondary hover:text-primary hover:bg-primary/5 px-2.5 py-1.5 rounded-lg transition-all" href="{{ url('/recent-year-reports?range=1995-1999') }}">1995 – 1999 Reports</a>
                <a class="block text-sm text-secondary hover:text-primary hover:bg-primary/5 px-2.5 py-1.5 rounded-lg transition-all" href="{{ url('/recent-year-reports?range=2000-2004') }}">2000 – 2004 Reports</a>
                <a class="block text-sm text-secondary hover:text-primary hover:bg-primary/5 px-2.5 py-1.5 rounded-lg transition-all" href="{{ url('/recent-year-reports?range=2005-2009') }}">2005 – 2009 Reports</a>
                <a class="block text-sm text-secondary hover:text-primary hover:bg-primary/5 px-2.5 py-1.5 rounded-lg transition-all" href="{{ url('/recent-year-reports?range=2010-2014') }}">2010 – 2014 Reports</a>
                <a class="block text-sm text-secondary hover:text-primary hover:bg-primary/5 px-2.5 py-1.5 rounded-lg transition-all" href="{{ url('/recent-year-reports?range=2015-2019') }}">2015 – 2019 Reports</a>
                <a class="block text-sm text-secondary hover:text-primary hover:bg-primary/5 px-2.5 py-1.5 rounded-lg transition-all" href="{{ url('/recent-year-reports?range=2020-2024') }}">2020 – 2024 Reports</a>
                <div class="h-[1px] bg-outline-variant/30 my-1 mx-2.5"></div>
                <a class="block text-sm font-semibold text-primary hover:bg-primary/5 px-2.5 py-1.5 rounded-lg transition-all flex items-center gap-1" href="{{ url('/recent-year-reports') }}">
                  <span class="material-symbols-outlined text-sm">open_in_new</span>View All Reports
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- The Cub Pack -->
      <div class="relative group nav-group h-full flex items-center">
        <button class="flex items-center gap-1 text-secondary hover:text-primary font-semibold text-xs xl:text-sm px-2 xl:px-3 py-1.5 rounded-lg hover:bg-primary/5 transition-all duration-300 focus:outline-none whitespace-nowrap">
          The Cub Pack
          <span class="material-symbols-outlined text-sm font-bold transition-transform duration-300 group-hover:rotate-180 rotate-on-hover inline-block">keyboard_arrow_down</span>
        </button>
        <div class="absolute left-0 top-full w-56 bg-surface border border-outline-variant/60 rounded-xl shadow-xl shadow-primary/5 hidden group-hover:block nav-dropdown z-50 py-1.5">
          <a class="block px-3.5 py-2 text-sm text-secondary hover:text-primary hover:bg-primary/5 rounded-lg transition-all mx-1.5" href="{{ url('history-of-the-16th-colombo-cub-pack') }}">History of Cub Pack</a>
          <a class="block px-3.5 py-2 text-sm text-secondary hover:text-primary hover:bg-primary/5 rounded-lg transition-all mx-1.5" href="{{ url('cub-pack-leaders') }}">Cub Pack Leaders</a>
        </div>
      </div>

      <!-- Gallery -->
      <div class="relative group nav-group h-full flex items-center">
        <button class="flex items-center gap-1 text-secondary hover:text-primary font-semibold text-xs xl:text-sm px-2 xl:px-3 py-1.5 rounded-lg hover:bg-primary/5 transition-all duration-300 focus:outline-none whitespace-nowrap">
          Gallery
          <span class="material-symbols-outlined text-sm font-bold transition-transform duration-300 group-hover:rotate-180 rotate-on-hover inline-block">keyboard_arrow_down</span>
        </button>
        <div class="absolute left-0 top-full w-48 bg-surface border border-outline-variant/60 rounded-xl shadow-xl shadow-primary/5 hidden group-hover:block nav-dropdown z-50 py-1.5">
          <a class="block px-3.5 py-2 text-sm text-secondary hover:text-primary hover:bg-primary/5 rounded-lg transition-all mx-1.5" href="{{ url('photo-gallery') }}">Photo Gallery</a>
          <a class="block px-3.5 py-2 text-sm text-secondary hover:text-primary hover:bg-primary/5 rounded-lg transition-all mx-1.5" href="https://www.youtube.com/stcscouts" target="_blank">Video Gallery</a>
        </div>
      </div>



      <!-- Badge Work -->
      <div class="relative group nav-group h-full flex items-center">
        <button class="flex items-center gap-1 text-secondary hover:text-primary font-semibold text-xs xl:text-sm px-2 xl:px-3 py-1.5 rounded-lg hover:bg-primary/5 transition-all duration-300 focus:outline-none whitespace-nowrap">
          Badge Work
          <span class="material-symbols-outlined text-sm font-bold transition-transform duration-300 group-hover:rotate-180 rotate-on-hover inline-block">keyboard_arrow_down</span>
        </button>
        <div class="absolute left-0 top-full w-56 bg-surface border border-outline-variant/60 rounded-xl shadow-xl shadow-primary/5 hidden group-hover:block nav-dropdown z-50 py-1.5">
          <a class="block px-3.5 py-2 text-sm text-secondary hover:text-primary hover:bg-primary/5 rounded-lg transition-all mx-1.5" href="{{ url('badgework-new-syllabus') }}">Badgework - New Syllabus</a>
          <a class="block px-3.5 py-2 text-sm text-secondary hover:text-primary hover:bg-primary/5 rounded-lg transition-all mx-1.5" href="{{ url('badgework-old-syllabus') }}">Badgework - Old Syllabus</a>
        </div>
      </div>

      <!-- Contact Us -->
      <a class="text-secondary hover:text-primary font-semibold text-xs xl:text-sm px-2 xl:px-3 py-1.5 rounded-lg hover:bg-primary/5 transition-all duration-300 whitespace-nowrap" href="{{ url('/contact') }}">Contact Us</a>
    </div>

    <!-- Header Right / Mobile Toggle -->
    <div class="flex items-center gap-3 shrink-0">
      <a href="https://www.facebook.com/stcscouts" target="_blank" class="hidden sm:flex w-8 h-8 rounded-full bg-primary/5 text-secondary hover:bg-primary hover:text-white items-center justify-center transition-all duration-300 hover:scale-105" title="Facebook">
        <i class="fab fa-facebook-f text-xs"></i>
      </a>
      <a href="https://www.instagram.com/stcscouts/" target="_blank" class="hidden sm:flex w-8 h-8 rounded-full bg-primary/5 text-secondary hover:bg-primary hover:text-white items-center justify-center transition-all duration-300 hover:scale-105" title="Instagram">
        <i class="fab fa-instagram text-xs"></i>
      </a>
      <a href="https://www.youtube.com/stcscouts" target="_blank" class="hidden sm:flex w-8 h-8 rounded-full bg-primary/5 text-secondary hover:bg-primary hover:text-white items-center justify-center transition-all duration-300 hover:scale-105" title="YouTube">
        <i class="fab fa-youtube text-xs"></i>
      </a>
      <!-- Hamburger Icon -->
      <button class="lg:hidden text-primary hover:text-secondary focus:outline-none p-1.5 rounded-lg hover:bg-primary/5 transition-all duration-200" onclick="document.getElementById('mobile-drawer').classList.toggle('hidden')">
        <span class="material-symbols-outlined text-2xl font-bold">menu</span>
      </button>
    </div>
  </div>

  <!-- Mobile Drawer Menu Overlay -->
  <div id="mobile-drawer" class="hidden fixed inset-0 z-[100] flex">
    <!-- Overlay backdrop -->
    <div class="fixed inset-0 bg-primary/40 backdrop-blur-sm" onclick="document.getElementById('mobile-drawer').classList.add('hidden')"></div>
    
    <!-- Drawer content -->
    <div class="relative w-4/5 max-w-sm bg-surface h-full shadow-2xl flex flex-col z-50 overflow-y-auto py-6 px-margin-mobile">
      <!-- Close drawer button -->
      <div class="flex justify-between items-center mb-6 border-b border-outline-variant pb-4">
        <span class="text-title-lg font-bold text-primary">Menu</span>
        <button class="text-secondary hover:text-primary focus:outline-none" onclick="document.getElementById('mobile-drawer').classList.add('hidden')">
          <span class="material-symbols-outlined text-2xl font-bold">close</span>
        </button>
      </div>

      <!-- Links container -->
      <div class="flex flex-col gap-4">
        <a class="text-secondary hover:text-primary font-semibold text-base transition-colors" href="{{ url('/') }}" onclick="document.getElementById('mobile-drawer').classList.add('hidden')">Home</a>
        <a class="text-secondary hover:text-primary font-semibold text-base transition-colors" href="{{ url('/kindling-legacy') }}" onclick="document.getElementById('mobile-drawer').classList.add('hidden')">Kindling Legacy</a>

        <!-- Collapsible The Troop -->
        <div>
          <button onclick="document.getElementById('mob-troop').classList.toggle('hidden')" class="w-full text-left font-semibold text-base text-secondary hover:text-primary flex justify-between items-center focus:outline-none">
            The Troop
            <span class="material-symbols-outlined text-base">keyboard_arrow_down</span>
          </button>
          <div id="mob-troop" class="hidden pl-4 mt-2 flex flex-col gap-2 border-l border-outline-variant">
            <a class="text-sm text-secondary hover:text-primary py-1 block" href="{{ url('troop') }}" onclick="document.getElementById('mobile-drawer').classList.add('hidden')">The Troop Overview</a>
            <a class="text-sm text-secondary hover:text-primary py-1 block" href="{{ url('troop-profile') }}" onclick="document.getElementById('mobile-drawer').classList.add('hidden')">Present Troop Profile</a>
            <a class="text-sm text-secondary hover:text-primary py-1 block" href="{{ url('the-group-committee') }}" onclick="document.getElementById('mobile-drawer').classList.add('hidden')">The Group Committee</a>
            
            <!-- Collapsible The Evolution -->
            <div>
              <button onclick="document.getElementById('mob-evol').classList.toggle('hidden')" class="w-full text-left text-sm text-secondary hover:text-primary py-1 flex justify-between items-center focus:outline-none">
                The Evolution
                <span class="material-symbols-outlined text-xs">keyboard_arrow_down</span>
              </button>
              <div id="mob-evol" class="hidden pl-4 mt-1 flex flex-col gap-1 border-l border-outline-variant">
                <a class="text-xs text-secondary hover:text-primary py-1 block" href="{{ url('history-of-scouting-at-college') }}" onclick="document.getElementById('mobile-drawer').classList.add('hidden')">Beginnings: 1912-1948</a>
                <a class="text-xs text-secondary hover:text-primary py-1 block" href="{{ url('history-of-scouting-at-college-2') }}" onclick="document.getElementById('mobile-drawer').classList.add('hidden')">Post-war: 1948-1968</a>
                <a class="text-xs text-secondary hover:text-primary py-1 block" href="{{ url('history-of-scouting-at-college-3') }}" onclick="document.getElementById('mobile-drawer').classList.add('hidden')">Recent: 1968-Present</a>
                <a class="text-xs text-secondary hover:text-primary py-1 block" href="{{ url('mr-w-i-muttiah') }}" onclick="document.getElementById('mobile-drawer').classList.add('hidden')">Mr. W.I. Muttiah</a>
                <a class="text-xs text-secondary hover:text-primary py-1 block" href="{{ url('mr-rex-jayasinha') }}" onclick="document.getElementById('mobile-drawer').classList.add('hidden')">Mr. Rex Jayasingha</a>
                <a class="text-xs text-secondary hover:text-primary py-1 block" href="{{ url('/Past-Troop-Leaders') }}" onclick="document.getElementById('mobile-drawer').classList.add('hidden')">Past Leaders</a>
                <a class="text-xs text-secondary hover:text-primary py-1 block" href="{{ url('/King\'s-and-Queen\'s-Scouts') }}" onclick="document.getElementById('mobile-drawer').classList.add('hidden')">King's & Queen's Scouts</a>
                <a class="text-xs text-secondary hover:text-primary py-1 block" href="{{ url('/President\'s-Award-Winners') }}" onclick="document.getElementById('mobile-drawer').classList.add('hidden')">President's Award Winners</a>
              </div>
            </div>

            <!-- Collapsible Year Reports -->
            <div>
              <button onclick="document.getElementById('mob-reports').classList.toggle('hidden')" class="w-full text-left text-sm text-secondary hover:text-primary py-1 flex justify-between items-center focus:outline-none">
                Year Reports
                <span class="material-symbols-outlined text-xs">keyboard_arrow_down</span>
              </button>
              <div id="mob-reports" class="hidden pl-4 mt-1 flex flex-col gap-1 border-l border-outline-variant">
                <a class="text-xs text-secondary hover:text-primary py-1 block" href="{{ url('/recent-year-reports?range=1995-1999') }}" onclick="document.getElementById('mobile-drawer').classList.add('hidden')">1995 – 1999 Reports</a>
                <a class="text-xs text-secondary hover:text-primary py-1 block" href="{{ url('/recent-year-reports?range=2000-2004') }}" onclick="document.getElementById('mobile-drawer').classList.add('hidden')">2000 – 2004 Reports</a>
                <a class="text-xs text-secondary hover:text-primary py-1 block" href="{{ url('/recent-year-reports?range=2005-2009') }}" onclick="document.getElementById('mobile-drawer').classList.add('hidden')">2005 – 2009 Reports</a>
                <a class="text-xs text-secondary hover:text-primary py-1 block" href="{{ url('/recent-year-reports?range=2010-2014') }}" onclick="document.getElementById('mobile-drawer').classList.add('hidden')">2010 – 2014 Reports</a>
                <a class="text-xs text-secondary hover:text-primary py-1 block" href="{{ url('/recent-year-reports?range=2015-2019') }}" onclick="document.getElementById('mobile-drawer').classList.add('hidden')">2015 – 2019 Reports</a>
                <a class="text-xs text-secondary hover:text-primary py-1 block" href="{{ url('/recent-year-reports?range=2020-2024') }}" onclick="document.getElementById('mobile-drawer').classList.add('hidden')">2020 – 2024 Reports</a>
                <a class="text-xs font-semibold text-primary py-1 block" href="{{ url('/recent-year-reports') }}" onclick="document.getElementById('mobile-drawer').classList.add('hidden')">View All Reports →</a>
              </div>
            </div>
            
            <a class="text-sm text-secondary hover:text-primary py-1 block" href="{{ url('the-scout-dunk') }}" onclick="document.getElementById('mobile-drawer').classList.add('hidden')">Request Scout Dunk</a>
          </div>
        </div>

        <!-- Collapsible The Cub Pack -->
        <div>
          <button onclick="document.getElementById('mob-cub').classList.toggle('hidden')" class="w-full text-left font-semibold text-base text-secondary hover:text-primary flex justify-between items-center focus:outline-none">
            The Cub Pack
            <span class="material-symbols-outlined text-base">keyboard_arrow_down</span>
          </button>
          <div id="mob-cub" class="hidden pl-4 mt-2 flex flex-col gap-2 border-l border-outline-variant">
            <a class="text-sm text-secondary hover:text-primary py-1 block" href="{{ url('history-of-the-16th-colombo-cub-pack') }}" onclick="document.getElementById('mobile-drawer').classList.add('hidden')">History of Cub Pack</a>
            <a class="text-sm text-secondary hover:text-primary py-1 block" href="{{ url('cub-pack-leaders') }}" onclick="document.getElementById('mobile-drawer').classList.add('hidden')">Cub Pack Leaders</a>
          </div>
        </div>

        <!-- Collapsible Gallery -->
        <div>
          <button onclick="document.getElementById('mob-gall').classList.toggle('hidden')" class="w-full text-left font-semibold text-base text-secondary hover:text-primary flex justify-between items-center focus:outline-none">
            Gallery
            <span class="material-symbols-outlined text-base">keyboard_arrow_down</span>
          </button>
          <div id="mob-gall" class="hidden pl-4 mt-2 flex flex-col gap-2 border-l border-outline-variant">
            <a class="text-sm text-secondary hover:text-primary py-1 block" href="{{ url('photo-gallery') }}" onclick="document.getElementById('mobile-drawer').classList.add('hidden')">Photo Gallery</a>
            <a class="text-sm text-secondary hover:text-primary py-1 block" href="https://www.youtube.com/stcscouts" target="_blank" onclick="document.getElementById('mobile-drawer').classList.add('hidden')">Video Gallery</a>
          </div>
        </div>



        <!-- Collapsible Badge Work -->
        <div>
          <button onclick="document.getElementById('mob-badge').classList.toggle('hidden')" class="w-full text-left font-semibold text-base text-secondary hover:text-primary flex justify-between items-center focus:outline-none">
            Badge Work
            <span class="material-symbols-outlined text-base">keyboard_arrow_down</span>
          </button>
          <div id="mob-badge" class="hidden pl-4 mt-2 flex flex-col gap-2 border-l border-outline-variant">
            <a class="text-sm text-secondary hover:text-primary py-1 block" href="{{ url('badgework-new-syllabus') }}" onclick="document.getElementById('mobile-drawer').classList.add('hidden')">Badgework - New Syllabus</a>
            <a class="text-sm text-secondary hover:text-primary py-1 block" href="{{ url('badgework-old-syllabus') }}" onclick="document.getElementById('mobile-drawer').classList.add('hidden')">Badgework - Old Syllabus</a>
          </div>
        </div>

        <a class="text-secondary hover:text-primary font-semibold text-base transition-colors" href="{{ url('/contact') }}" onclick="document.getElementById('mobile-drawer').classList.add('hidden')">Contact Us</a>
      </div>
    </div>
  </div>
</nav>
