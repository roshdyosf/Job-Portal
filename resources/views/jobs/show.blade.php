<x-layout>
    <x-slot:heading>{{ $job?->title ?? 'Job details' }}</x-slot:heading>

    @if ($job)
        <div class="rounded-[2rem] border border-white/10 bg-slate-950/95 p-8 shadow-[0_0_80px_rgba(15,23,42,0.45)] backdrop-blur-lg">
            <div class="flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">
                <div class="space-y-4">
                    <span class="inline-flex items-center rounded-full border border-indigo-500/30 bg-indigo-500/10 px-3 py-1 text-sm font-semibold text-indigo-300">
                        Featured opportunity
                    </span>
                    <div>
                        <h2 class="text-3xl font-semibold text-white">{{ $job->title }}</h2>
                        <p class="mt-2 text-lg text-slate-300">A polished view of the role details, tailored to match the create-job experience.</p>
                    </div>
                </div>

                <a href="/jobs"
                    class="inline-flex items-center justify-center rounded-3xl border border-slate-700 bg-slate-900/85 px-5 py-3 text-sm font-semibold text-slate-200 transition hover:bg-slate-800/95">
                    Back to jobs
                </a>
            </div>

            <div class="mt-8 grid gap-6 md:grid-cols-2">
                <div class="rounded-[1.75rem] border border-slate-700 bg-slate-900/90 p-6">
                    <p class="text-sm font-semibold uppercase tracking-[0.3em] text-slate-400">Company</p>
                    <p class="mt-3 text-xl font-semibold text-white">{{ optional($job->employer)->name ?? 'Company to be announced' }}</p>
                </div>

                <div class="rounded-[1.75rem] border border-slate-700 bg-slate-900/90 p-6">
                    <p class="text-sm font-semibold uppercase tracking-[0.3em] text-slate-400">Salary</p>
                    <p class="mt-3 text-xl font-semibold text-white">{{ $job->salary }}</p>
                </div>
            </div>

            <div class="mt-6 rounded-[1.75rem] border border-slate-700 bg-slate-900/70 p-6">
                <div class="flex flex-wrap items-center justify-between gap-3">
                    <h3 class="text-xl font-semibold text-white">Job overview</h3>
                    <span class="rounded-full border border-emerald-500/20 bg-emerald-500/10 px-3 py-1 text-sm font-semibold text-emerald-300">
                        Open role
                    </span>
                </div>

                <div class="mt-6 grid gap-6 lg:grid-cols-[1.2fr_0.8fr]">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-[0.3em] text-slate-400">What this role includes</p>
                        <p class="mt-3 text-slate-300">
                            This listing is focused on the role of {{ $job->title }} and highlights a strong opportunity for the right candidate.
                            The salary package is clearly shown below, and the rest of the page keeps the core job details easy to scan.
                        </p>
                    </div>

                    <div class="rounded-[1.5rem] border border-white/10 bg-slate-950/60 p-5">
                        <p class="text-sm font-semibold text-slate-300">Quick facts</p>
                        <ul class="mt-4 space-y-3 text-sm text-slate-400">
                            <li class="flex items-center justify-between">
                                <span>Position</span>
                                <span class="font-semibold text-slate-200">{{ $job->title }}</span>
                            </li>
                            <li class="flex items-center justify-between">
                                <span>Company</span>
                                <span class="font-semibold text-slate-200">{{ optional($job->employer)->name ?? 'TBD' }}</span>
                            </li>
                            <li class="flex items-center justify-between">
                                <span>Pay</span>
                                <span class="font-semibold text-slate-200">{{ $job->salary }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="rounded-[2rem] border border-white/10 bg-slate-950/95 p-8 text-center shadow-[0_0_80px_rgba(15,23,42,0.45)] backdrop-blur-lg">
            <h2 class="text-2xl font-semibold text-white">Job not found</h2>
            <p class="mt-3 text-slate-300">The requested listing could not be found.</p>
        </div>
    @endif
</x-layout>
