<!-- TopNavBar -->
<nav class="bg-surface border-b border-outline-variant w-full h-16 sticky top-0 z-50">
  <div class="flex justify-between items-center max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop h-full">
    <!-- Brand / Logo -->
    <a href="{{ url('/') }}" class="flex items-center gap-3 hover:opacity-95 transition-opacity">
      <img alt="STC Scouts Logo" class="h-10 w-10 object-contain rounded-full border border-primary" src="{{ asset('images/stcscouts_logo.jpg') }}"/>
      <div class="flex flex-col">
        <span class="text-title-lg font-bold text-primary tracking-tight leading-none">16th Colombo</span>
        <span class="text-xs font-semibold text-secondary tracking-wider uppercase">S. Thomas' College</span>
      </div>
    </a>

    <!-- Desktop Navigation Links -->
    <div class="hidden lg:flex items-center gap-6 h-full">
      <!-- Home -->
      <a class="text-secondary hover:text-primary font-semibold text-sm transition-colors py-2" href="{{ url('/') }}">Home</a>

      <!-- Kindling Legacy -->
      <a class="text-secondary hover:text-primary font-semibold text-sm transition-colors py-2" href="{{ url('/kindling-legacy') }}">Kindling Legacy</a>

      <!-- The Troop -->
      <div class="relative group h-full flex items-center">
        <button class="flex items-center gap-1 text-secondary hover:text-primary font-semibold text-sm transition-colors py-2 focus:outline-none">
          The Troop
          <span class="material-symbols-outlined text-sm font-bold">keyboard_arrow_down</span>
        </button>
        <div class="absolute left-0 top-[90%] w-60 bg-surface border border-outline-variant rounded shadow-lg hidden group-hover:block z-50 py-1">
          <a class="block px-4 py-2 text-sm text-secondary hover:text-primary hover:bg-surface-container-low transition-colors" href="{{ url('troop-profile') }}">Present Troop Profile</a>
          <a class="block px-4 py-2 text-sm text-secondary hover:text-primary hover:bg-surface-container-low transition-colors" href="{{ url('instructors') }}">Instructors</a>
          <a class="block px-4 py-2 text-sm text-secondary hover:text-primary hover:bg-surface-container-low transition-colors" href="{{ url('the-group-committee') }}">The Group Committee</a>
          
          <!-- The Evolution Submenu -->
          <div class="relative group/sub">
            <button class="w-full text-left px-4 py-2 text-sm text-secondary hover:text-primary hover:bg-surface-container-low transition-colors flex justify-between items-center focus:outline-none">
              The Evolution
              <span class="material-symbols-outlined text-sm font-bold">keyboard_arrow_right</span>
            </button>
            <div class="absolute left-full top-0 w-60 bg-surface border border-outline-variant rounded shadow-lg hidden group-hover/sub:block z-50 py-1">
              <!-- Descriptive History Submenu -->
              <div class="relative group/subsub">
                <button class="w-full text-left px-4 py-2 text-sm text-secondary hover:text-primary hover:bg-surface-container-low transition-colors flex justify-between items-center focus:outline-none">
                  Descriptive History
                  <span class="material-symbols-outlined text-sm font-bold">keyboard_arrow_right</span>
                </button>
                <div class="absolute left-full top-0 w-60 bg-surface border border-outline-variant rounded shadow-lg hidden group-hover/subsub:block z-50 py-1">
                  <a class="block px-4 py-2 text-sm text-secondary hover:text-primary hover:bg-surface-container-low transition-colors" href="{{ url('history-of-scouting-at-college') }}">The Beginnings: 1912-1948</a>
                  <a class="block px-4 py-2 text-sm text-secondary hover:text-primary hover:bg-surface-container-low transition-colors" href="{{ url('history-of-scouting-at-college-2') }}">Post-war Scouting: 1948-1968</a>
                  <a class="block px-4 py-2 text-sm text-secondary hover:text-primary hover:bg-surface-container-low transition-colors" href="{{ url('history-of-scouting-at-college-3') }}">The Recent Times: 1968-Present</a>
                  
                  <!-- Men of Honour -->
                  <div class="relative group/subsubsub">
                    <button class="w-full text-left px-4 py-2 text-sm text-secondary hover:text-primary hover:bg-surface-container-low transition-colors flex justify-between items-center focus:outline-none">
                      Men of Honour
                      <span class="material-symbols-outlined text-sm font-bold">keyboard_arrow_right</span>
                    </button>
                    <div class="absolute left-full top-0 w-60 bg-surface border border-outline-variant rounded shadow-lg hidden group-hover/subsubsub:block z-50 py-1">
                      <a class="block px-4 py-2 text-sm text-secondary hover:text-primary hover:bg-surface-container-low transition-colors" href="{{ url('mr-w-i-muttiah') }}">Mr. W.I. Muttiah</a>
                      <a class="block px-4 py-2 text-sm text-secondary hover:text-primary hover:bg-surface-container-low transition-colors" href="{{ url('mr-rex-jayasinha') }}">Mr. Rex Jayasingha</a>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Recent Year Reports Submenu -->
              <div class="relative group/subyear">
                <button class="w-full text-left px-4 py-2 text-sm text-secondary hover:text-primary hover:bg-surface-container-low transition-colors flex justify-between items-center focus:outline-none">
                  Recent Year Reports
                  <span class="material-symbols-outlined text-sm font-bold">keyboard_arrow_right</span>
                </button>
                <div class="absolute left-full top-0 w-60 bg-surface border border-outline-variant rounded shadow-lg hidden group-hover/subyear:block z-50 py-1 max-h-80 overflow-y-auto">
                  <!-- 1995-1999 -->
                  <div class="relative group/subyear1">
                    <button class="w-full text-left px-4 py-2 text-sm text-secondary hover:text-primary hover:bg-surface-container-low transition-colors flex justify-between items-center focus:outline-none">
                      1995-1999
                      <span class="material-symbols-outlined text-sm font-bold">keyboard_arrow_right</span>
                    </button>
                    <div class="absolute left-full top-0 w-64 bg-surface border border-outline-variant rounded shadow-lg hidden group-hover/subyear1:block z-50 py-1">
                      <a class="block px-4 py-1 text-xs text-primary font-bold bg-surface-container-low">1995</a>
                      <a class="block px-6 py-1 text-xs text-secondary hover:text-primary hover:bg-surface-container-low" href="{{ url('/2nd-asia-pacific-6th-new-zealand-venture-scout-camp-1995') }}">Asia Pacific Scout Camp '95</a>
                      <a class="block px-6 py-1 text-xs text-secondary hover:text-primary hover:bg-surface-container-low" href="{{ url('/year-report-1995') }}">Year Report – 1995</a>
                      <a class="block px-4 py-1 text-xs text-primary font-bold bg-surface-container-low mt-1">1996</a>
                      <a class="block px-6 py-1 text-xs text-secondary hover:text-primary hover:bg-surface-container-low" href="{{ url('/17th-Asia-Pacific-Scout-Jamboree-1996') }}">17th AP Scout Jamboree</a>
                      <a class="block px-6 py-1 text-xs text-secondary hover:text-primary hover:bg-surface-container-low" href="{{ url('/Tidal-Wave-1996') }}">Tidal Wave – 1996</a>
                      <a class="block px-6 py-1 text-xs text-secondary hover:text-primary hover:bg-surface-container-low" href="{{ url('/year-report-1996') }}">Year Report – 1996</a>
                      <a class="block px-4 py-1 text-xs text-primary font-bold bg-surface-container-low mt-1">1997</a>
                      <a class="block px-6 py-1 text-xs text-secondary hover:text-primary hover:bg-surface-container-low" href="{{ url('/18th-Asia-Pacific-Scout-Jamboree-1997') }}">18th AP Scout Jamboree</a>
                      <a class="block px-6 py-1 text-xs text-secondary hover:text-primary hover:bg-surface-container-low" href="{{ url('/Coastal-Winds–1997') }}">Coastal Winds – 1997</a>
                      <a class="block px-6 py-1 text-xs text-secondary hover:text-primary hover:bg-surface-container-low" href="{{ url('/year-report-1997') }}">Year Report – 1997</a>
                      <a class="block px-4 py-1 text-xs text-primary font-bold bg-surface-container-low mt-1">1998</a>
                      <a class="block px-6 py-1 text-xs text-secondary hover:text-primary hover:bg-surface-container-low" href="{{ url('/Sand-Storm–1998') }}">Sand Storm – 1998</a>
                      <a class="block px-6 py-1 text-xs text-secondary hover:text-primary hover:bg-surface-container-low" href="{{ url('/year-report-1998') }}">Year Report – 1998</a>
                      <a class="block px-4 py-1 text-xs text-primary font-bold bg-surface-container-low mt-1">1999</a>
                      <a class="block px-6 py-1 text-xs text-secondary hover:text-primary hover:bg-surface-container-low" href="{{ url('/Sweden-National-Jamboree-’99') }}">Sweden Jamboree '99</a>
                      <a class="block px-6 py-1 text-xs text-secondary hover:text-primary hover:bg-surface-container-low" href="{{ url('/De-Ja-‘Vu–1999') }}">De Ja 'Vu – 1999</a>
                      <a class="block px-6 py-1 text-xs text-secondary hover:text-primary hover:bg-surface-container-low" href="{{ url('/Thai-National-Jamboree-’99') }}">Thai Jamboree '99</a>
                      <a class="block px-6 py-1 text-xs text-secondary hover:text-primary hover:bg-surface-container-low" href="{{ url('/year-report-1999') }}">Year Report – 1999</a>
                    </div>
                  </div>

                  <!-- 2000-2004 -->
                  <div class="relative group/subyear2">
                    <button class="w-full text-left px-4 py-2 text-sm text-secondary hover:text-primary hover:bg-surface-container-low transition-colors flex justify-between items-center focus:outline-none">
                      2000-2004
                      <span class="material-symbols-outlined text-sm font-bold">keyboard_arrow_right</span>
                    </button>
                    <div class="absolute left-full top-0 w-60 bg-surface border border-outline-variant rounded shadow-lg hidden group-hover/subyear2:block z-50 py-1">
                      <a class="block px-4 py-1 text-xs text-primary font-bold bg-surface-container-low">2000</a>
                      <a class="block px-6 py-1 text-xs text-secondary hover:text-primary hover:bg-surface-container-low" href="{{ url('/Cyclone-2000') }}">Cyclone 2000</a>
                      <a class="block px-6 py-1 text-xs text-secondary hover:text-primary hover:bg-surface-container-low" href="{{ url('/year-report-2000') }}">Year Report – 2000</a>
                      <a class="block px-4 py-1 text-xs text-primary font-bold bg-surface-container-low mt-1">2001</a>
                      <a class="block px-6 py-1 text-xs text-secondary hover:text-primary hover:bg-surface-container-low" href="{{ url('/year-report-2001') }}">Year Report – 2001</a>
                      <a class="block px-4 py-1 text-xs text-primary font-bold bg-surface-container-low mt-1">2002</a>
                      <a class="block px-6 py-1 text-xs text-secondary hover:text-primary hover:bg-surface-container-low" href="{{ url('/Tribe-Out-2002') }}">Tribe Out 2002</a>
                      <a class="block px-6 py-1 text-xs text-secondary hover:text-primary hover:bg-surface-container-low" href="{{ url('/year-report-2002') }}">Year Report – 2002</a>
                      <a class="block px-4 py-1 text-xs text-primary font-bold bg-surface-container-low mt-1">2003</a>
                      <a class="block px-6 py-1 text-xs text-secondary hover:text-primary hover:bg-surface-container-low" href="{{ url('/year-report-2003') }}">Year Report – 2003</a>
                      <a class="block px-4 py-1 text-xs text-primary font-bold bg-surface-container-low mt-1">2004</a>
                      <a class="block px-6 py-1 text-xs text-secondary hover:text-primary hover:bg-surface-container-low" href="{{ url('/tribal-craft-2004') }}">Tribal Craft 2004</a>
                      <a class="block px-6 py-1 text-xs text-secondary hover:text-primary hover:bg-surface-container-low" href="{{ url('/year-report-2004') }}">Year Report – 2004</a>
                    </div>
                  </div>

                  <!-- 2005-2009 -->
                  <div class="relative group/subyear3">
                    <button class="w-full text-left px-4 py-2 text-sm text-secondary hover:text-primary hover:bg-surface-container-low transition-colors flex justify-between items-center focus:outline-none">
                      2005-2009
                      <span class="material-symbols-outlined text-sm font-bold">keyboard_arrow_right</span>
                    </button>
                    <div class="absolute left-full top-0 w-60 bg-surface border border-outline-variant rounded shadow-lg hidden group-hover/subyear3:block z-50 py-1">
                      <a class="block px-4 py-2 text-sm text-secondary hover:text-primary hover:bg-surface-container-low transition-colors" href="{{ url('/year-report-2005') }}">Year Report – 2005</a>
                      <a class="block px-4 py-2 text-sm text-secondary hover:text-primary hover:bg-surface-container-low transition-colors" href="{{ url('/year-report-2006') }}">Year Report – 2006</a>
                      <a class="block px-4 py-2 text-sm text-secondary hover:text-primary hover:bg-surface-container-low transition-colors" href="{{ url('/year-report-2007') }}">Year Report – 2007</a>
                      <a class="block px-4 py-2 text-sm text-secondary hover:text-primary hover:bg-surface-container-low transition-colors" href="{{ url('/year-report-2008') }}">Year Report – 2008</a>
                      <a class="block px-4 py-2 text-sm text-secondary hover:text-primary hover:bg-surface-container-low transition-colors" href="{{ url('/year-report-2009') }}">Year Report – 2009</a>
                    </div>
                  </div>

                  <!-- 2010-2014 -->
                  <div class="relative group/subyear4">
                    <button class="w-full text-left px-4 py-2 text-sm text-secondary hover:text-primary hover:bg-surface-container-low transition-colors flex justify-between items-center focus:outline-none">
                      2010-2014
                      <span class="material-symbols-outlined text-sm font-bold">keyboard_arrow_right</span>
                    </button>
                    <div class="absolute left-full top-0 w-60 bg-surface border border-outline-variant rounded shadow-lg hidden group-hover/subyear4:block z-50 py-1">
                      <a class="block px-4 py-2 text-sm text-secondary hover:text-primary hover:bg-surface-container-low transition-colors" href="{{ url('/year-report-2010') }}">Year Report – 2010</a>
                      <a class="block px-4 py-2 text-sm text-secondary hover:text-primary hover:bg-surface-container-low transition-colors" href="{{ url('/year-report-2011') }}">Year Report – 2011</a>
                      <a class="block px-4 py-1 text-xs text-primary font-bold bg-surface-container-low mt-1">2012</a>
                      <a class="block px-6 py-1 text-xs text-secondary hover:text-primary hover:bg-surface-container-low" href="{{ url('/Centennial-Flames-2012') }}">Centennial Flames</a>
                      <a class="block px-6 py-1 text-xs text-secondary hover:text-primary hover:bg-surface-container-low" href="{{ url('/International-Achievement') }}">Intl. Achievement</a>
                      <a class="block px-6 py-1 text-xs text-secondary hover:text-primary hover:bg-surface-container-low" href="{{ url('/year-report-2012') }}">Year Report – 2012</a>
                      <a class="block px-4 py-2 text-sm text-secondary hover:text-primary hover:bg-surface-container-low mt-1" href="{{ url('/year-report-2013') }}">Year Report – 2013</a>
                      <a class="block px-4 py-2 text-sm text-secondary hover:text-primary hover:bg-surface-container-low" href="{{ url('/year-report-2014') }}">Year Report – 2014</a>
                    </div>
                  </div>

                  <!-- 2015-2019 -->
                  <div class="relative group/subyear5">
                    <button class="w-full text-left px-4 py-2 text-sm text-secondary hover:text-primary hover:bg-surface-container-low transition-colors flex justify-between items-center focus:outline-none">
                      2015-2019
                      <span class="material-symbols-outlined text-sm font-bold">keyboard_arrow_right</span>
                    </button>
                    <div class="absolute left-full top-0 w-60 bg-surface border border-outline-variant rounded shadow-lg hidden group-hover/subyear5:block z-50 py-1">
                      <a class="block px-4 py-2 text-sm text-secondary hover:text-primary hover:bg-surface-container-low transition-colors" href="{{ url('/year-report-2015') }}">Year Report – 2015</a>
                      <a class="block px-4 py-2 text-sm text-secondary hover:text-primary hover:bg-surface-container-low" href="{{ url('/year-report-2016') }}">Year Report – 2016</a>
                      <a class="block px-4 py-2 text-sm text-secondary hover:text-primary hover:bg-surface-container-low" href="{{ url('/year-report-2017') }}">Year Report – 2017</a>
                      <a class="block px-4 py-2 text-sm text-secondary hover:text-primary hover:bg-surface-container-low" href="{{ url('/year-report-2018') }}">Year Report – 2018</a>
                      <a class="block px-4 py-1 text-xs text-primary font-bold bg-surface-container-low mt-1">2019</a>
                      <a class="block px-6 py-1 text-xs text-secondary hover:text-primary hover:bg-surface-container-low" href="{{ url('/Escapade-2019') }}">Escapade 2019</a>
                      <a class="block px-6 py-1 text-xs text-secondary hover:text-primary hover:bg-surface-container-low" href="{{ url('/year-report-2019') }}">Year Report – 2019</a>
                    </div>
                  </div>

                  <!-- 2020-2024 -->
                  <div class="relative group/subyear6">
                    <button class="w-full text-left px-4 py-2 text-sm text-secondary hover:text-primary hover:bg-surface-container-low transition-colors flex justify-between items-center focus:outline-none">
                      2020-2024
                      <span class="material-symbols-outlined text-sm font-bold">keyboard_arrow_right</span>
                    </button>
                    <div class="absolute left-full top-0 w-60 bg-surface border border-outline-variant rounded shadow-lg hidden group-hover/subyear6:block z-50 py-1">
                      <a class="block px-4 py-1 text-xs text-primary font-bold bg-surface-container-low">2020</a>
                      <a class="block px-6 py-1 text-xs text-secondary hover:text-primary hover:bg-surface-container-low" href="{{ url('/ESCAPADE=At-Home-“Kids”') }}">ESCAPADE At Home "Kids"</a>
                      <a class="block px-6 py-1 text-xs text-secondary hover:text-primary hover:bg-surface-container-low" href="{{ url('/ONLINE-CAMP-FIRE') }}">ONLINE CAMP FIRE</a>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Extra Evolution Pages -->
              <a class="block px-4 py-2 text-sm text-secondary hover:text-primary hover:bg-surface-container-low transition-colors" href="{{ url('/Past-Troop-Leaders') }}">Past Troop Leaders</a>
              <a class="block px-4 py-2 text-sm text-secondary hover:text-primary hover:bg-surface-container-low transition-colors" href="{{ url('/King’s-and-Queen’s-Scouts') }}">King's & Queen's Scouts</a>
              <a class="block px-4 py-2 text-sm text-secondary hover:text-primary hover:bg-surface-container-low transition-colors" href="{{ url('/President’s-Award-Winners') }}">President's Award Winners</a>
            </div>
          </div>
          <a class="block px-4 py-2 text-sm text-secondary hover:text-primary hover:bg-surface-container-low transition-colors" href="{{ url('the-scout-dunk') }}">Request the Scout Dunk</a>
        </div>
      </div>

      <!-- The Cub Pack -->
      <div class="relative group h-full flex items-center">
        <button class="flex items-center gap-1 text-secondary hover:text-primary font-semibold text-sm transition-colors py-2 focus:outline-none">
          The Cub Pack
          <span class="material-symbols-outlined text-sm font-bold">keyboard_arrow_down</span>
        </button>
        <div class="absolute left-0 top-[90%] w-56 bg-surface border border-outline-variant rounded shadow-lg hidden group-hover:block z-50 py-1">
          <a class="block px-4 py-2 text-sm text-secondary hover:text-primary hover:bg-surface-container-low transition-colors" href="{{ url('history-of-the-16th-colombo-cub-pack') }}">History of Cub Pack</a>
          <a class="block px-4 py-2 text-sm text-secondary hover:text-primary hover:bg-surface-container-low transition-colors" href="{{ url('cub-pack-leaders') }}">Cub Pack Leaders</a>
        </div>
      </div>

      <!-- Gallery -->
      <div class="relative group h-full flex items-center">
        <button class="flex items-center gap-1 text-secondary hover:text-primary font-semibold text-sm transition-colors py-2 focus:outline-none">
          Gallery
          <span class="material-symbols-outlined text-sm font-bold">keyboard_arrow_down</span>
        </button>
        <div class="absolute left-0 top-[90%] w-48 bg-surface border border-outline-variant rounded shadow-lg hidden group-hover:block z-50 py-1">
          <a class="block px-4 py-2 text-sm text-secondary hover:text-primary hover:bg-surface-container-low transition-colors" href="{{ url('photo-gallery') }}">Photo Gallery</a>
          <a class="block px-4 py-2 text-sm text-secondary hover:text-primary hover:bg-surface-container-low transition-colors" href="https://www.youtube.com/stcscouts" target="_blank">Video Gallery</a>
        </div>
      </div>

      <!-- About the Site -->
      <a class="text-secondary hover:text-primary font-semibold text-sm transition-colors py-2" href="{{ url('/about-the-site') }}">About the Site</a>

      <!-- Badge Work -->
      <div class="relative group h-full flex items-center">
        <button class="flex items-center gap-1 text-secondary hover:text-primary font-semibold text-sm transition-colors py-2 focus:outline-none">
          Badge Work
          <span class="material-symbols-outlined text-sm font-bold">keyboard_arrow_down</span>
        </button>
        <div class="absolute left-0 top-[90%] w-56 bg-surface border border-outline-variant rounded shadow-lg hidden group-hover:block z-50 py-1">
          <a class="block px-4 py-2 text-sm text-secondary hover:text-primary hover:bg-surface-container-low transition-colors" href="{{ url('badgework-new-syllabus') }}">Badgework - New Syllabus</a>
          <a class="block px-4 py-2 text-sm text-secondary hover:text-primary hover:bg-surface-container-low transition-colors" href="{{ url('badgework-old-syllabus') }}">Badgework - Old Syllabus</a>
        </div>
      </div>

      <!-- Contact Us -->
      <a class="text-secondary hover:text-primary font-semibold text-sm transition-colors py-2" href="{{ url('/contact') }}">Contact Us</a>
    </div>

    <!-- Header Right / Mobile Toggle -->
    <div class="flex items-center gap-4">
      <a href="https://www.facebook.com/stcscouts" target="_blank" class="hidden sm:inline-block text-secondary hover:text-primary transition-colors">
        <i class="fab fa-facebook-f text-base"></i>
      </a>
      <a href="https://www.instagram.com/stcscouts/" target="_blank" class="hidden sm:inline-block text-secondary hover:text-primary transition-colors">
        <i class="fab fa-instagram text-base"></i>
      </a>
      <a href="https://www.youtube.com/stcscouts" target="_blank" class="hidden sm:inline-block text-secondary hover:text-primary transition-colors">
        <i class="fab fa-youtube text-base"></i>
      </a>
      <!-- Hamburger Icon -->
      <button class="lg:hidden text-primary hover:text-secondary focus:outline-none p-1" onclick="document.getElementById('mobile-drawer').classList.toggle('hidden')">
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
            <a class="text-sm text-secondary hover:text-primary py-1 block" href="{{ url('troop-profile') }}" onclick="document.getElementById('mobile-drawer').classList.add('hidden')">Present Troop Profile</a>
            <a class="text-sm text-secondary hover:text-primary py-1 block" href="{{ url('instructors') }}" onclick="document.getElementById('mobile-drawer').classList.add('hidden')">Instructors</a>
            <a class="text-sm text-secondary hover:text-primary py-1 block" href="{{ url('the-group-committee') }}" onclick="document.getElementById('mobile-drawer').classList.add('hidden')">The Group Committee</a>
            
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
                <a class="text-xs text-secondary hover:text-primary py-1 block" href="{{ url('/King’s-and-Queen’s-Scouts') }}" onclick="document.getElementById('mobile-drawer').classList.add('hidden')">King's & Queen's Scouts</a>
                <a class="text-xs text-secondary hover:text-primary py-1 block" href="{{ url('/President’s-Award-Winners') }}" onclick="document.getElementById('mobile-drawer').classList.add('hidden')">President's Award Winners</a>
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

        <a class="text-secondary hover:text-primary font-semibold text-base transition-colors" href="{{ url('/about-the-site') }}" onclick="document.getElementById('mobile-drawer').classList.add('hidden')">About the Site</a>

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
