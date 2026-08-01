<x-layout>
    <x-slot:heading>Jobs</x-slot:heading>

    <div class="space-y-4">
        @foreach ($jobs as $job)
            <a href="/jobs/{{ $job->id }}"
                class="block rounded-[1.75rem] border border-white/10 bg-slate-950/80 p-6 shadow-[0_0_60px_rgba(15,23,42,0.3)] transition hover:border-indigo-500/40 hover:bg-slate-900/90">
                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-[0.3em] text-slate-400">
                            {{ $job->employer->name ?? 'Company' }}</p>
                        <h3 class="mt-2 text-xl font-semibold text-white">{{ $job->title }}</h3>
                        <p class="mt-2 text-sm text-slate-300">Pays {{ $job->salary }} per year</p>
                    </div>
                    <span
                        class="inline-flex items-center justify-center rounded-full border border-indigo-500/30 bg-indigo-500/10 px-3 py-1 text-sm font-semibold text-indigo-300">
                        View details
                    </span>
                </div>
            </a>
        @endforeach
    </div>

    <div class="mt-8">
        {{ $jobs->links() }}
    </div>
</x-layout>