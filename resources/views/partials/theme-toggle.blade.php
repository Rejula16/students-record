<div class="flex items-center">
    <button
        type="button"
        data-theme-toggle
        aria-label="Toggle theme"
        class="inline-flex items-center gap-2 rounded-2xl border border-white/50 bg-white/70 px-4 py-2 text-sm font-medium text-slate-700 shadow-sm backdrop-blur transition hover:bg-white dark:border-slate-700/70 dark:bg-slate-900/70 dark:text-slate-100 dark:hover:bg-slate-900"
    >
        <span data-theme-icon class="text-base">🌙</span>
        <span data-theme-label>Dark</span>
    </button>

    <script>
        (function () {
            const storageKey = 'theme-preference';
            const button = document.querySelector('[data-theme-toggle]');
            const label = button?.querySelector('[data-theme-label]');
            const icon = button?.querySelector('[data-theme-icon]');

            if (!button || !label || !icon) return;

            const applyTheme = (theme) => {
                const isDark = theme === 'dark';
                document.documentElement.classList.toggle('dark', isDark);
                label.textContent = isDark ? 'Light' : 'Dark';
                icon.textContent = isDark ? '☀️' : '🌙';
            };

            const storedTheme = localStorage.getItem(storageKey);
            const systemPrefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
            applyTheme(storedTheme ?? (systemPrefersDark ? 'dark' : 'light'));

            button.addEventListener('click', () => {
                const nextTheme = document.documentElement.classList.contains('dark') ? 'light' : 'dark';
                localStorage.setItem(storageKey, nextTheme);
                applyTheme(nextTheme);
            });
        })();
    </script>
</div>
