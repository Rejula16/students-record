<x-layouts.app :title="'Students Dashboard'">
    <x-slot:sidebar>
        @include('partials.sidebar')
    </x-slot:sidebar>

    @php
        $studentCount = $students->count();
        $gmailCount = $students->filter(fn ($student) => str_contains(strtolower($student->email), '@gmail.'))->count();
        $corporateCount = max(0, $studentCount - $gmailCount);
    @endphp

    <div class="space-y-5">

        @if(session('success'))
            <div class="rounded-[24px] border border-emerald-100 bg-emerald-50 px-5 py-4 text-sm font-medium text-emerald-700 shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <section class="rounded-[28px] border border-white/60 bg-white/92 p-5 shadow-[0_18px_40px_rgba(115,150,196,0.12)] md:p-6">
            <div class="mb-6 flex flex-col gap-4 md:flex-row md:items-start md:justify-between">
                <div>
                    <p class="text-lg font-semibold text-slate-800">Student Statistics</p>
                    <p class="mt-1 text-sm text-slate-400">Clean dashboard view with reusable Laravel layout and sidebar partials.</p>
                </div>
                <span class="inline-flex rounded-full bg-sky-50 px-4 py-2 text-xs font-semibold uppercase tracking-[0.2em] text-sky-500">Overview</span>
            </div>

            <div class="grid gap-4 xl:grid-cols-[minmax(0,1.6fr)_minmax(280px,0.8fr)]">
                <div class="relative overflow-hidden rounded-[24px] border border-sky-100 bg-gradient-to-b from-white to-cyan-50 px-4 pb-8 pt-6">
                    <div class="pointer-events-none absolute inset-0 bg-[linear-gradient(to_right,rgba(102,146,191,0.12)_1px,transparent_1px),linear-gradient(to_top,rgba(102,146,191,0.10)_1px,transparent_1px)] bg-[size:12.5%_100%,100%_25%]"></div>
                    <div class="pointer-events-none absolute inset-x-0 bottom-0 h-24 bg-gradient-to-t from-cyan-100/70 to-transparent"></div>

                    <div class="relative h-64">
                        <div class="absolute left-[36%] top-2 rounded-xl bg-slate-700 px-3 py-2 text-[11px] leading-tight text-white shadow-lg">
                            {{ $studentCount }} students
                            <br>
                            dashboard trend
                        </div>

                        <svg viewBox="0 0 800 260" class="h-full w-full">
                            <path fill="rgba(40, 199, 245, 0.08)" d="M30,200 C70,220 90,130 130,160 C170,190 190,70 230,115 C270,160 300,40 335,105 C370,170 405,75 445,125 C485,175 525,35 565,110 C605,185 645,55 690,150 C730,205 760,115 790,60 L790,260 L30,260 Z"></path>
                            <path d="M30,200 C70,220 90,130 130,160 C170,190 190,70 230,115 C270,160 300,40 335,105 C370,170 405,75 445,125 C485,175 525,35 565,110 C605,185 645,55 690,150 C730,205 760,115 790,60" fill="none" stroke="#1ab7ee" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>

                        <div class="absolute inset-x-0 -bottom-1 flex justify-between px-1 text-xs text-slate-400">
                            <span>Jan</span>
                            <span>Feb</span>
                            <span>Mar</span>
                            <span>Apr</span>
                            <span>May</span>
                            <span>Jun</span>
                            <span>Jul</span>
                            <span>Aug</span>
                            <span>Sep</span>
                        </div>
                    </div>
                </div>

                <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-1">
                    <div class="rounded-[24px] border border-white/60 bg-white/85 p-5 shadow-[0_16px_32px_rgba(121,154,198,0.10)]">
                        <p class="text-sm font-semibold text-slate-700">Total Students</p>
                        <p class="mt-3 text-4xl font-semibold text-slate-800">{{ $studentCount }}</p>
                        <p class="mt-2 text-sm text-slate-400">Current records in the system</p>
                    </div>

                    <div class="rounded-[24px] border border-white/60 bg-white/85 p-5 shadow-[0_16px_32px_rgba(121,154,198,0.10)]">
                        <div class="mb-4 flex items-center justify-between">
                            <p class="text-sm font-semibold text-slate-700">Email Split</p>
                            <span class="text-xs text-slate-400">Snapshot</span>
                        </div>

                        <div class="space-y-4">
                            <div>
                                <div class="mb-2 flex items-center justify-between text-xs text-slate-400">
                                    <span>Gmail</span>
                                    <span>{{ $gmailCount }}</span>
                                </div>
                                <div class="h-2 rounded-full bg-slate-100">
                                    <div class="h-2 rounded-full bg-gradient-to-r from-cyan-400 to-blue-500" style="width: {{ $studentCount > 0 ? round(($gmailCount / $studentCount) * 100) : 0 }}%"></div>
                                </div>
                            </div>

                            <div>
                                <div class="mb-2 flex items-center justify-between text-xs text-slate-400">
                                    <span>Other domains</span>
                                    <span>{{ $corporateCount }}</span>
                                </div>
                                <div class="h-2 rounded-full bg-slate-100">
                                    <div class="h-2 rounded-full bg-gradient-to-r from-sky-300 to-indigo-500" style="width: {{ $studentCount > 0 ? round(($corporateCount / $studentCount) * 100) : 0 }}%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>       
    </div>
</x-layouts.app>
