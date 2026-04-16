@php
    $student = $student ?? null;
    $submitLabel = $submitLabel ?? 'Save Student';
@endphp

<div class="grid gap-5 md:grid-cols-2">
    <div>
        <label for="name" class="mb-2 block text-sm font-medium text-slate-700 dark:text-slate-200">Name</label>
        <input
            id="name"
            name="name"
            type="text"
            value="{{ old('name', $student?->name) }}"
            class="w-full rounded-2xl border border-sky-100 bg-white px-4 py-3 text-slate-700 outline-none transition focus:border-sky-300 focus:ring-2 focus:ring-sky-100 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-100 dark:focus:border-sky-500 dark:focus:ring-sky-500/20"
            placeholder="Enter student name"
        >
        @error('name')
            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="email" class="mb-2 block text-sm font-medium text-slate-700 dark:text-slate-200">Email</label>
        <input
            id="email"
            name="email"
            type="email"
            value="{{ old('email', $student?->email) }}"
            class="w-full rounded-2xl border border-sky-100 bg-white px-4 py-3 text-slate-700 outline-none transition focus:border-sky-300 focus:ring-2 focus:ring-sky-100 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-100 dark:focus:border-sky-500 dark:focus:ring-sky-500/20"
            placeholder="Enter email address"
        >
        @error('email')
            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="phone" class="mb-2 block text-sm font-medium text-slate-700 dark:text-slate-200">Phone</label>
        <input
            id="phone"
            name="phone"
            type="text"
            value="{{ old('phone', $student?->phone) }}"
            class="w-full rounded-2xl border border-sky-100 bg-white px-4 py-3 text-slate-700 outline-none transition focus:border-sky-300 focus:ring-2 focus:ring-sky-100 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-100 dark:focus:border-sky-500 dark:focus:ring-sky-500/20"
            placeholder="Enter phone number"
        >
        @error('phone')
            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="course" class="mb-2 block text-sm font-medium text-slate-700 dark:text-slate-200">Course</label>
        <input
            id="course"
            name="course"
            type="text"
            value="{{ old('course', $student?->course) }}"
            class="w-full rounded-2xl border border-sky-100 bg-white px-4 py-3 text-slate-700 outline-none transition focus:border-sky-300 focus:ring-2 focus:ring-sky-100 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-100 dark:focus:border-sky-500 dark:focus:ring-sky-500/20"
            placeholder="Enter course name"
        >
        @error('course')
            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div class="md:col-span-2">
        <label for="image" class="mb-2 block text-sm font-medium text-slate-700 dark:text-slate-200">Profile Image</label>
        <input
            id="image"
            name="image"
            type="file"
            accept=".jpg,.jpeg,.png"
            class="block w-full rounded-2xl border border-dashed border-sky-200 bg-sky-50/60 px-4 py-3 text-sm text-slate-500 file:mr-4 file:rounded-xl file:border-0 file:bg-sky-500 file:px-4 file:py-2 file:font-medium file:text-white hover:file:bg-sky-600 dark:border-slate-700 dark:bg-slate-900/80 dark:text-slate-300"
        >
        @error('image')
            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
        @enderror

        @if($student?->image)
            <div class="mt-4 flex items-center gap-4 rounded-2xl bg-sky-50/70 p-4 dark:bg-slate-900/70">
                <img
                    src="{{ asset('storage/' . $student->image) }}"
                    alt="{{ $student->name }}"
                    class="h-16 w-16 rounded-2xl object-cover"
                >
                <div>
                    <p class="text-sm font-medium text-slate-700 dark:text-slate-200">Current image</p>
                    <p class="text-sm text-slate-400 dark:text-slate-400">Upload a new file only if you want to replace it.</p>
                </div>
            </div>
        @endif
    </div>
</div>

<div class="mt-8 flex flex-wrap items-center gap-3">
    <button type="submit" class="rounded-2xl bg-gradient-to-r from-cyan-400 to-blue-500 px-5 py-3 text-sm font-semibold text-white shadow-lg transition hover:opacity-95">
        {{ $submitLabel }}
    </button>
    <a href="{{ route('students.index') }}" class="rounded-2xl bg-slate-100 px-5 py-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-200 dark:bg-slate-800 dark:text-slate-200 dark:hover:bg-slate-700">
        Cancel
    </a>
</div>
