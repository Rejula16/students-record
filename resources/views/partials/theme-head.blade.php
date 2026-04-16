<script>
    (function () {
        const storageKey = 'theme-preference';
        const storedTheme = localStorage.getItem(storageKey);
        const systemPrefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
        const useDark = storedTheme ? storedTheme === 'dark' : systemPrefersDark;

        document.documentElement.classList.toggle('dark', useDark);
    })();
</script>
