<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        @include('partials.theme-head')
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-[radial-gradient(circle_at_top_left,_rgba(255,255,255,0.35),_transparent_24%),linear-gradient(135deg,_#19b8ed_0%,_#53d8ff_48%,_#15b3ea_100%)] text-slate-800 dark:bg-[radial-gradient(circle_at_top_left,_rgba(56,189,248,0.16),_transparent_18%),linear-gradient(135deg,_#071826_0%,_#0f2740_42%,_#08131f_100%)] dark:text-slate-100">
        <div class="mx-auto flex min-h-screen max-w-xl items-center justify-center px-4 py-10">
            <div class="grid w-full overflow-hidden rounded-[32px] border border-white/50 bg-white/40 shadow-[0_32px_80px_rgba(8,65,105,0.22)] backdrop-blur-xl dark:border-slate-700/60 dark:bg-slate-900/65 dark:shadow-[0_32px_80px_rgba(0,0,0,0.45)]">
                <div class="flex justify-end p-4 pb-0">
                    @include('partials.theme-toggle')
                </div>
                <!-- <section class="hidden bg-[linear-gradient(180deg,rgba(255,255,255,0.20),rgba(255,255,255,0.04))] p-10 text-white lg:flex lg:flex-col lg:justify-between">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-[0.25em] text-white/80">Student Admin</p>
                        <h1 class="mt-6 max-w-md text-4xl font-semibold leading-tight">Manage students with a clean Laravel dashboard workflow.</h1>
                        <p class="mt-4 max-w-md text-base text-white/80">
                            Sign in to view student records, create new entries, and keep your admin workspace organized.
                        </p>
                    </div>

                    <div class="rounded-[28px] border border-white/20 bg-white/10 p-6">
                        <div class="grid grid-cols-3 gap-4">
                            <div class="rounded-2xl bg-white/15 p-4">
                                <p class="text-3xl font-semibold">01</p>
                                <p class="mt-2 text-sm text-white/75">Centralized student data</p>
                            </div>
                            <div class="rounded-2xl bg-white/15 p-4">
                                <p class="text-3xl font-semibold">02</p>
                                <p class="mt-2 text-sm text-white/75">Reusable Blade layout</p>
                            </div>
                            <div class="rounded-2xl bg-white/15 p-4">
                                <p class="text-3xl font-semibold">03</p>
                                <p class="mt-2 text-sm text-white/75">Fast CRUD operations</p>
                            </div>
                        </div>
                    </div>
                </section> -->

                <section class="bg-white/92 p-6 md:p-10 dark:bg-slate-900/85">
                    <div class="mx-auto max-w-md">
                        <div class="mb-8">
                            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-sky-500 dark:text-sky-300">Welcome Back</p>
                            <h2 class="mt-3 text-3xl font-semibold text-slate-800 dark:text-slate-100">Login to your account</h2>
                            <p class="mt-2 text-sm text-slate-400 dark:text-slate-400">Use your credentials to access the student admin panel.</p>
                        </div>

                        @if(session('error'))
                            <div class="mb-5 rounded-2xl border border-red-100 bg-red-50 px-4 py-3 text-sm font-medium text-red-600">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ url('/login') }}" method="POST" class="space-y-5">
                            @csrf

                            <div>
                                <label for="email" class="mb-2 block text-sm font-medium text-slate-700 dark:text-slate-200">Email</label>
                                <input
                                    id="email"
                                    name="email"
                                    type="email"
                                    value="{{ old('email') }}"
                                    class="w-full rounded-2xl border border-sky-100 bg-white px-4 py-3 text-slate-700 outline-none transition focus:border-sky-300 focus:ring-2 focus:ring-sky-100 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-100 dark:focus:border-sky-500 dark:focus:ring-sky-500/20"
                                    placeholder="Enter your email"
                                    required
                                >
                            </div>

                            <div>
                                <label for="password" class="mb-2 block text-sm font-medium text-slate-700 dark:text-slate-200">Password</label>
                                <input
                                    id="password"
                                    name="password"
                                    type="password"
                                    class="w-full rounded-2xl border border-sky-100 bg-white px-4 py-3 text-slate-700 outline-none transition focus:border-sky-300 focus:ring-2 focus:ring-sky-100 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-100 dark:focus:border-sky-500 dark:focus:ring-sky-500/20"
                                    placeholder="Enter your password"
                                    required
                                >
                            </div>

                            <button type="submit" class="w-full rounded-2xl bg-gradient-to-r from-cyan-400 to-blue-500 px-5 py-3 text-sm font-semibold text-white shadow-lg transition hover:opacity-95">
                                Login
                            </button>
                        </form>

                        <p class="mt-6 text-center text-sm text-slate-500 dark:text-slate-400">
                            Don’t have an account?
                            <a href="{{ url('/register') }}" class="font-semibold text-sky-600 hover:text-sky-700 dark:text-sky-300 dark:hover:text-sky-200">Create one</a>
                        </p>
                    </div>
                </section>
            </div>
        </div>
    </body>
</html>
