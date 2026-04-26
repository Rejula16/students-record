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
        <section class="rounded-[28px] border border-white/60 bg-white/85 p-4 shadow-[0_18px_40px_rgba(115,150,196,0.12)] md:p-5 dark:border-slate-700/60 dark:bg-slate-900/80 dark:shadow-[0_18px_40px_rgba(0,0,0,0.35)]">
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div class="flex min-w-0 items-center rounded-2xl bg-white px-4 py-3 shadow-inner md:w-2/3 dark:bg-slate-950 dark:text-slate-300">
                    <svg class="mr-3 h-5 w-5 text-slate-400 dark:text-slate-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <circle cx="11" cy="11" r="7"></circle>
                        <path d="m20 20-3.5-3.5" stroke-linecap="round"></path>
                    </svg>
                    <input type="text" name="search" placeholder="Search students" id="searchInput" class="truncate text-sm text-slate-400 dark:text-slate-500 border-none bg-transparent outline-none focus:ring-0 w-full" />
                </div>

                <div class="flex items-center gap-3">
                    <a href="{{ route('students.create') }}" class="rounded-2xl bg-gradient-to-r from-cyan-400 to-blue-500 px-5 py-3 text-sm font-semibold text-white shadow-lg transition hover:opacity-95">
                        New Student
                    </a>
                </div>
            </div>
        </section>

        @if(session('success'))
        <div class="rounded-[24px] border border-emerald-100 bg-emerald-50 px-5 py-4 text-sm font-medium text-emerald-700 shadow-sm dark:border-emerald-800/70 dark:bg-emerald-950/60 dark:text-emerald-300">
            {{ session('success') }}
        </div>
        @endif

        <div id="studentsTable" class="relative">
            <div id="loader" class="hidden absolute inset-0 flex items-center justify-center bg-white/60 dark:bg-slate-900/60 backdrop-blur-sm z-10">
                <img src="https://i.gifer.com/ZZ5H.gif" class="h-10 w-10" alt="Loading">
            </div>
            <section class="rounded-[28px] border border-white/60 bg-white/85 p-5 shadow-[0_18px_40px_rgba(115,150,196,0.12)] dark:border-slate-700/60 dark:bg-slate-900/80 dark:shadow-[0_18px_40px_rgba(0,0,0,0.35)]">
                <div class="mb-4 flex items-center justify-between">
                    <div>
                        <p class="text-sm font-semibold text-slate-700 dark:text-slate-200">Student Records</p>
                        <p class="mt-1 text-sm text-slate-400 dark:text-slate-400">Manage, edit, and remove student entries.</p>
                    </div>
                </div>

                <div class="overflow-x-auto rounded-[22px] bg-[linear-gradient(180deg,rgba(255,255,255,0.98),rgba(245,250,255,0.96))] dark:bg-[linear-gradient(180deg,rgba(15,23,42,0.98),rgba(15,23,42,0.94))]">
                    @if($students->isEmpty())
                    <div class="px-6 py-12 text-center">
                        <p class="text-lg font-medium text-slate-700 dark:text-slate-200">No students found</p>
                        <!-- <p class="mt-2 text-sm text-slate-400">Create the first student to populate this dashboard.</p> -->
                    </div>
                    @else
                    <table class="min-w-full text-left">
                        <thead>
                            <tr class="border-b border-sky-50 text-xs font-semibold uppercase tracking-[0.2em] text-slate-400 dark:border-slate-800 dark:text-slate-500">
                                <th class="px-6 py-4">ID</th>
                                <th class="px-6 py-4">Name</th>
                                <th class="px-6 py-4">Course</th>
                                <th class="px-6 py-4">Email</th>
                                <th class="px-6 py-4">Phone</th>
                                <th class="px-6 py-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm text-slate-600 dark:text-slate-300">
                            @foreach($students as $student)
                            <tr class="border-b border-sky-50 last:border-b-0 dark:border-slate-800">
                                <td class="px-6 py-4 font-semibold text-slate-800 dark:text-slate-100">#{{ $student->id }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <!-- <div class="mr-3 flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-br from-cyan-300 to-blue-400 text-sm font-semibold text-white"> -->
                                        <img
                                            src="{{ asset('storage/' . $student->image) }}"
                                            alt="{{ strtoupper(substr($student->name, 0, 1)) }}"
                                            class="mr-3 flex h-10 w-10 items-center justify-center object-cover rounded-full">
                                        <!-- {{ strtoupper(substr($student->name, 0, 1)) }} -->
                                        <!-- </div> -->
                                        <span class="font-medium text-slate-700 dark:text-slate-100">{{ $student->name }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <span class="font-medium text-slate-700 dark:text-slate-100">{{ $student->course }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <span class="font-medium text-slate-700 dark:text-slate-100">{{ $student->email }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <span class="font-medium text-slate-700 dark:text-slate-100">{{ $student->phone }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <a href="{{ route('students.edit', $student) }}" class="rounded-xl bg-blue-50 px-3 py-2 text-xs font-semibold text-blue-600 transition hover:bg-blue-100 dark:bg-sky-500/15 dark:text-sky-300 dark:hover:bg-sky-500/25">
                                            Edit
                                        </a>
                                        <form action="{{ route('students.destroy', $student) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="rounded-xl bg-red-50 px-3 py-2 text-xs font-semibold text-red-500 transition hover:bg-red-100 dark:bg-red-500/15 dark:text-red-300 dark:hover:bg-red-500/25" onclick="return confirm('Delete this student?')">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- PAGINATION -->
                    <div class="mt-4">
                        {{ $students->links() }}
                    </div>
                    @endif
                </div>
            </section>
        </div>
    </div>
    <!-- AJAX SCRIPT -->
    <script>
        let timeout = null;

        const searchInput = document.getElementById('searchInput');

        //  SEARCH
        searchInput.addEventListener('keyup', function() {
            clearTimeout(timeout);

            timeout = setTimeout(() => {
                let query = this.value;
                loadData(`?search=${query}`);
            }, 400);
        });

        //  PAGINATION CLICK
        document.addEventListener('click', function(e) {
            if (e.target.closest('.pagination a')) {
                e.preventDefault();
                let url = e.target.closest('a').getAttribute('href');
                loadData(url);
            }
        });

        //  LOAD FUNCTION
        function loadData(url) {

            const table = document.getElementById('studentsTable');
            const loader = document.getElementById('loader');

            // START LOADING
            if (loader) loader.classList.remove('hidden');
            table.style.opacity = "0.4";
            table.style.pointerEvents = "none";

            fetch(url)
                .then(response => response.text())
                .then(html => {

                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');

                    const newContent = doc.getElementById('studentsTable');

                    if (newContent) {
                        table.innerHTML = newContent.innerHTML;
                    }

                })
                .catch(error => {
                    console.error('Error loading data:', error);
                })
                .finally(() => {
                    // END LOADING
                    if (loader) loader.classList.add('hidden');
                    table.style.opacity = "1";
                    table.style.pointerEvents = "auto";
                });
        }
    </script>
</x-layouts.app>