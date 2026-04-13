<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Register</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-[radial-gradient(circle_at_top_left,_rgba(255,255,255,0.35),_transparent_24%),linear-gradient(135deg,_#19b8ed_0%,_#53d8ff_48%,_#15b3ea_100%)] dark:bg-none dark:bg-slate-900 dark:text-slate-100 text-slate-800">
        <div class="mx-auto flex min-h-screen max-w-xl items-center justify-center px-4 py-10">
            <!-- <div class="grid w-full overflow-hidden rounded-[32px] border border-white/50 bg-white/40 shadow-[0_32px_80px_rgba(8,65,105,0.22)] backdrop-blur-xl lg:grid-cols-[0.95fr_1.05fr]"> -->
            <div class="grid w-full overflow-hidden rounded-[32px] border border-white/50 bg-white/40 dark:border-transparent dark:bg-slate-800 shadow-[0_32px_80px_rgba(8,65,105,0.22)] backdrop-blur-xl">   
            <section class="bg-white/92 dark:bg-transparent p-6 md:p-10">
                    <div class="mx-auto max-w-md">
                        <div class="mb-8">
                            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-sky-500">Get Started</p>
                            <h2 class="mt-3 text-3xl font-semibold text-slate-800 dark:text-slate-100">Create your account</h2>
                            <p class="mt-2 text-sm text-slate-400 dark:text-slate-300">Register to access the admin dashboard and manage student records.</p>
                        </div>

                        <form action="{{ url('/register') }}" method="POST" class="space-y-5">
                            @csrf

                            <div>
                                <label for="name" class="mb-2 block text-sm font-medium text-slate-700 dark:text-slate-200">Name</label>
                                <input
                                    id="name"
                                    name="name"
                                    type="text"
                                    value="{{ old('name') }}"
                                    class="w-full rounded-2xl border border-sky-100 bg-white dark:bg-slate-700 px-4 py-3 text-slate-700 dark:text-slate-100 outline-none transition focus:border-sky-300 focus:ring-2 focus:ring-sky-100"
                                    placeholder="Enter your name"
                                    required
                                >
                            </div>

                            <div>
                                <label for="email" class="mb-2 block text-sm font-medium text-slate-700 dark:text-slate-200">Email</label>
                                <input
                                    id="email"
                                    name="email"
                                    type="email"
                                    value="{{ old('email') }}"
                                    class="w-full rounded-2xl border border-sky-100 bg-white dark:bg-slate-700 px-4 py-3 text-slate-700 dark:text-slate-100 outline-none transition focus:border-sky-300 focus:ring-2 focus:ring-sky-100"
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
                                    class="w-full rounded-2xl border border-sky-100 bg-white dark:bg-slate-700 px-4 py-3 text-slate-700 dark:text-slate-100 outline-none transition focus:border-sky-300 focus:ring-2 focus:ring-sky-100"
                                    placeholder="Create a password"
                                    required
                                >
                            </div>

                            <button type="submit" class="w-full rounded-2xl bg-gradient-to-r from-cyan-400 to-blue-500 px-5 py-3 text-sm font-semibold text-white shadow-lg transition hover:opacity-95">
                                Register
                            </button>
                        </form>

                        <div class="mt-4">
                            @include('partials.theme-toggle')
                        </div>

                        <p class="mt-6 text-center text-sm text-slate-500">
                            Already have an account?
                            <a href="{{ route('login') }}" class="font-semibold text-sky-600 hover:text-sky-700">Login</a>
                        </p>
                    </div>
                </section>

                <!-- <section class="hidden bg-[linear-gradient(180deg,rgba(255,255,255,0.20),rgba(255,255,255,0.04))] p-10 text-white lg:flex lg:flex-col lg:justify-between">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-[0.25em] text-white/80">Admin Access</p>
                        <h1 class="mt-6 max-w-md text-4xl font-semibold leading-tight">Set up your workspace and start managing student records faster.</h1>
                        <p class="mt-4 max-w-md text-base text-white/80">
                            A focused registration screen that matches the same blue-glass visual style as the dashboard.
                        </p>
                    </div>

                    <div class="rounded-[28px] border border-white/20 bg-white/10 p-6">
                        <div class="space-y-4">
                            <div class="rounded-2xl bg-white/15 p-4">
                                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-white/80">Secure Access</p>
                                <p class="mt-2 text-sm text-white/75">Create credentials for your student management portal.</p>
                            </div>
                            <div class="rounded-2xl bg-white/15 p-4">
                                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-white/80">Unified Theme</p>
                                <p class="mt-2 text-sm text-white/75">The auth screens now match the admin dashboard design language.</p>
                            </div>
                        </div>
                    </div>
                </section> -->
            </div>
        </div>
    </body>
</html>
