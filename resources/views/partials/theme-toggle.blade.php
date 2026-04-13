<div class="flex items-center space-x-3">
  <button id="theme-toggle" aria-label="Toggle theme" class="px-3 py-1 rounded bg-gray-200 dark:bg-gray-700 text-sm">
    <span id="theme-toggle-text">Toggle</span>
  </button>

  <script>
    (function(){
      const btn = document.getElementById('theme-toggle');
      const txt = document.getElementById('theme-toggle-text');
      const storageKey = 'theme-preference';

      function setTheme(isDark){
        document.documentElement.classList.toggle('dark', isDark);
        txt.textContent = isDark ? 'Dark' : 'Light';
      }

      // init from localStorage or prefers-color-scheme
      const stored = localStorage.getItem(storageKey);
      if(stored !== null){
        setTheme(stored === 'dark');
      } else {
        const prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
        setTheme(prefersDark);
      }

      btn.addEventListener('click', () => {
        const isDark = !document.documentElement.classList.contains('dark');
        setTheme(isDark);
        localStorage.setItem(storageKey, isDark ? 'dark' : 'light');
      });
    })();
  </script>
</div>
