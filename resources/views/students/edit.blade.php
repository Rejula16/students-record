<x-layouts.app :title="'Edit Student'">
    <x-slot:sidebar>
        @include('partials.sidebar')
    </x-slot:sidebar>

    <div class="space-y-5">
        <section class="rounded-[28px] border border-white/60 bg-white/85 p-5 shadow-[0_18px_40px_rgba(115,150,196,0.12)] md:p-6">
            <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                <div>
                    <p class="text-lg font-semibold text-slate-800">Edit Student</p>
                    <p class="mt-1 text-sm text-slate-400">Update the selected student record.</p>
                </div>
                <a href="{{ route('students.index') }}" class="rounded-2xl bg-slate-100 px-4 py-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-200">
                    Back to Students
                </a>
            </div>
        </section>

        <section class="rounded-[28px] border border-white/60 bg-white/92 p-5 shadow-[0_18px_40px_rgba(115,150,196,0.12)] md:p-6">
            <form action="{{ route('students.update', $student) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('students.partials.form', ['student' => $student, 'submitLabel' => 'Update Student'])
            </form>
        </section>
    </div>
</x-layouts.app>
