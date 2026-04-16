<aside class="w-full border-b border-white/40 bg-white/35 px-5 py-6 lg:w-72 lg:border-b-0 lg:border-r lg:px-6 lg:py-8 dark:border-slate-700/60 dark:bg-slate-950/40">
    <div class="flex items-center gap-4 lg:block lg:text-center">
        <div class="flex h-16 w-16 items-center justify-center rounded-full bg-gradient-to-br from-sky-200 to-cyan-300 text-2xl font-semibold text-white shadow-md lg:mx-auto lg:mb-4 lg:h-20 lg:w-20 lg:text-3xl">
            A
        </div>
        <div>
            <h2 class="text-sm font-semibold tracking-[0.18em] text-slate-800 uppercase dark:text-slate-100">Admin Panel</h2>
            <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Student management hub</p>
        </div>
    </div>

    <nav class="mt-6 space-y-2 text-sm">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 rounded-2xl px-4 py-3 transition {{ request()->routeIs('dashboard') ? 'bg-gradient-to-r from-sky-50 to-cyan-50 font-medium text-sky-700 shadow-sm dark:from-sky-500/20 dark:to-cyan-500/15 dark:text-sky-300 dark:shadow-none' : 'text-slate-500 hover:bg-white/60 hover:text-slate-700 dark:text-slate-400 dark:hover:bg-slate-800/60 dark:hover:text-slate-100' }}">
            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                <path d="M4 19h16M7 16V9m5 7V5m5 11v-4" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Dashboard
        </a>

        <a href="{{ route('students.index') }}" class="flex items-center gap-3 rounded-2xl px-4 py-3 transition {{ request()->routeIs('students.index') ? 'bg-gradient-to-r from-sky-50 to-cyan-50 font-medium text-sky-700 shadow-sm dark:from-sky-500/20 dark:to-cyan-500/15 dark:text-sky-300 dark:shadow-none' : 'text-slate-500 hover:bg-white/60 hover:text-slate-700 dark:text-slate-400 dark:hover:bg-slate-800/60 dark:hover:text-slate-100' }}">
            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                <path d="M4 7h16M4 12h16M4 17h16" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Students
        </a>

        <a href="{{ route('students.create') }}" class="flex items-center gap-3 rounded-2xl px-4 py-3 transition {{ request()->routeIs('students.create', 'students.edit') ? 'bg-gradient-to-r from-sky-50 to-cyan-50 font-medium text-sky-700 shadow-sm dark:from-sky-500/20 dark:to-cyan-500/15 dark:text-sky-300 dark:shadow-none' : 'text-slate-500 hover:bg-white/60 hover:text-slate-700 dark:text-slate-400 dark:hover:bg-slate-800/60 dark:hover:text-slate-100' }}">
            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                <path d="M12 5v14M5 12h14" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Student Form
        </a>

        <div class="flex items-center gap-3 rounded-2xl px-4 py-3 text-slate-500 dark:text-slate-400">
            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                <path d="M12 15.5A3.5 3.5 0 1 0 12 8.5a3.5 3.5 0 0 0 0 7Z"/>
                <path d="M19.4 15a1.7 1.7 0 0 0 .34 1.87l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.7 1.7 0 0 0-1.87-.34 1.7 1.7 0 0 0-1.04 1.55V21a2 2 0 1 1-4 0v-.09A1.7 1.7 0 0 0 8.96 19.4a1.7 1.7 0 0 0-1.87.34l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06A1.7 1.7 0 0 0 4.6 15a1.7 1.7 0 0 0-1.55-1.04H3a2 2 0 1 1 0-4h.09A1.7 1.7 0 0 0 4.6 8.96a1.7 1.7 0 0 0-.34-1.87l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06A1.7 1.7 0 0 0 8.96 4.6a1.7 1.7 0 0 0 1.04-1.55V3a2 2 0 1 1 4 0v.09A1.7 1.7 0 0 0 15.04 4.6a1.7 1.7 0 0 0 1.87-.34l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06A1.7 1.7 0 0 0 19.4 8.96c.64.23 1.09.84 1.09 1.55V11a2 2 0 1 1 0 4h-.09c-.71 0-1.32.45-1.55 1.09Z" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Settings
        </div>
    </nav>
</aside>
