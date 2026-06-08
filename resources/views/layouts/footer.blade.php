<!-- Footer -->
<footer class="bg-primary text-on-primary w-full pt-12 pb-6 border-t-4 border-secondary">
  <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-gutter mb-12">
    <!-- Column 1: Brand Info -->
    <div class="flex flex-col gap-4">
      <div class="text-headline-md font-bold text-on-primary">16th Colombo</div>
      <p class="text-body-md text-on-primary/80 leading-relaxed">
        Official Web Portal of the 16th Colombo Scout Group of S. Thomas' College, Mount Lavinia. Combines knowledge with adventure to shape the leaders of tomorrow.
      </p>
    </div>

    <!-- Column 2: Quick Links -->
    <div class="flex flex-col gap-4">
      <h4 class="text-title-lg font-bold text-on-primary">Quick Links</h4>
      <ul class="flex flex-col gap-2">
        <li><a class="text-on-primary/80 hover:text-tertiary-fixed-dim transition-colors text-sm" href="{{ url('/contact') }}">Contact Us</a></li>
        <li><a class="text-on-primary/80 hover:text-tertiary-fixed-dim transition-colors text-sm" href="{{ url('/about-the-site') }}">About the Site</a></li>
        <li><a class="text-on-primary/80 hover:text-tertiary-fixed-dim transition-colors text-sm" href="{{ url('/kindling-legacy') }}">Kindling Legacy 2026</a></li>
        <li><a class="text-on-primary/80 hover:text-tertiary-fixed-dim transition-colors text-sm" href="{{ url('/photo-gallery') }}">Photo Gallery</a></li>
      </ul>
    </div>

    <!-- Column 3: Meetings -->
    <div class="flex flex-col gap-4">
      <h4 class="text-title-lg font-bold text-on-primary">Meetings</h4>
      <div class="text-sm text-on-primary/80 leading-relaxed">
        <p class="font-semibold text-on-primary mb-1">Troop & Cub Pack:</p>
        <p class="mb-3">Saturdays / Weekdays after school</p>
        <p class="font-semibold text-on-primary mb-1">Location:</p>
        <p>The Scout Room,<br/>S. Thomas' College,<br/>Mount Lavinia, Sri Lanka</p>
      </div>
    </div>

    <!-- Column 4: Connect -->
    <div class="flex flex-col gap-4">
      <h4 class="text-title-lg font-bold text-on-primary">Connect</h4>
      <p class="text-sm text-on-primary/80 mb-2">Follow our adventures and stay updated via social channels.</p>
      <div class="flex gap-3">
        <a class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-on-primary hover:bg-white/20 transition-colors" href="https://www.facebook.com/stcscouts" target="_blank" title="Facebook">
          <i class="fab fa-facebook-f text-sm"></i>
        </a>
        <a class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-on-primary hover:bg-white/20 transition-colors" href="https://www.instagram.com/stcscouts/" target="_blank" title="Instagram">
          <i class="fab fa-instagram text-sm"></i>
        </a>
        <a class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-on-primary hover:bg-white/20 transition-colors" href="https://www.youtube.com/stcscouts" target="_blank" title="YouTube">
          <i class="fab fa-youtube text-sm"></i>
        </a>
      </div>
    </div>
  </div>

  <!-- Bottom Bar -->
  <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop border-t border-white/10 pt-6 flex flex-col md:flex-row justify-between items-center gap-4 text-center md:text-left">
    <p class="text-sm text-on-primary/70">
      &copy; 2004 - {{ date('Y') }} <strong>16th Colombo Scout Group</strong> - S. Thomas' College. All rights reserved.
    </p>
    <p class="text-sm text-on-primary/70 italic">
      "Prepared. For Life." ~ The Tribe of the Evening Star
    </p>
  </div>
</footer>
