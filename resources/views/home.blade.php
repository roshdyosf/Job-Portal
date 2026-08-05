<x-layout>
    <x-slot:heading>Home</x-slot:heading>

    <div class="space-y-8">
        <div class="rounded-[2rem] border border-white/10 bg-slate-950/95 p-8">
            <p class="text-sm font-semibold text-indigo-300">Welcome</p>
            <h2 class="mt-2 text-2xl font-bold text-white">Find your next job</h2>
            <p class="mt-4 text-slate-300">This is a demo homepage with sample content. Use the Jobs page to view
                listings.</p>
            <div class="mt-4">
                <x-button href="/jobs">Browse Jobs</x-button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach ($jobs as $job)
                <div class="rounded-xl border border-white/5 bg-slate-900/60 p-4">
                    <div class="text-sm text-indigo-300">{{ $job->employer->name }}</div>
                    <div class="mt-1 text-lg font-bold text-white">{{ $job->title }}</div>
                    <div class="mt-2 text-sm text-slate-300">Remote - Full-time</div>
                </div>
            @endforeach
        </div>
    </div>

</x-layout>