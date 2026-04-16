<x-layouts.app :title="'Create Student'">
    <x-slot:sidebar>
        @include('partials.sidebar')
    </x-slot:sidebar>

    <div class="space-y-5">
        <section class="rounded-[28px] border border-white/60 bg-white/85 p-5 shadow-[0_18px_40px_rgba(115,150,196,0.12)] md:p-6 dark:border-slate-700/60 dark:bg-slate-900/80 dark:shadow-[0_18px_40px_rgba(0,0,0,0.35)]">
            <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                <div>
                    <p class="text-lg font-semibold text-slate-800 dark:text-slate-100">Create Student</p>
                    <p class="mt-1 text-sm text-slate-400 dark:text-slate-400">Add a new student record to the dashboard.</p>
                </div>
                <a href="{{ route('students.index') }}" class="rounded-2xl bg-slate-100 px-4 py-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-200 dark:bg-slate-800 dark:text-slate-200 dark:hover:bg-slate-700">
                    Back to Students
                </a>
            </div>
        </section>

        <section class="rounded-[28px] border border-white/60 bg-white/92 p-5 shadow-[0_18px_40px_rgba(115,150,196,0.12)] md:p-6 dark:border-slate-700/60 dark:bg-slate-900/85 dark:shadow-[0_18px_40px_rgba(0,0,0,0.35)]">
            <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('students.partials.form', ['submitLabel' => 'Create Student'])
            </form>
        </section>
    </div>
</x-layouts.app>
