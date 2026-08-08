<x-layout>
    <x-slot:heading>{{ $job?->title ?? 'Job details' }}</x-slot:heading>

    @if ($job)
        <div
            class="rounded-[2rem] border border-white/10 bg-slate-950/95 p-8 shadow-[0_0_80px_rgba(15,23,42,0.45)] backdrop-blur-lg">
            <div class="flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">
                <div class="space-y-4">
                    <span
                        class="inline-flex items-center rounded-full border border-indigo-500/30 bg-indigo-500/10 px-3 py-1 text-sm font-semibold text-indigo-300">
                        Featured opportunity
                    </span>
                    <div>
                        <h2 class="text-3xl font-semibold text-white">{{ $job->title }}</h2>
                        <p class="mt-2 text-lg text-slate-300">A polished view of the role details, tailored to match the
                            create-job experience.</p>
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
                    <p class="mt-3 text-xl font-semibold text-white">
                        {{ optional($job->employer)->name ?? 'Company to be announced' }}
                    </p>
                </div>

                <div class="rounded-[1.75rem] border border-slate-700 bg-slate-900/90 p-6">
                    <p class="text-sm font-semibold uppercase tracking-[0.3em] text-slate-400">Salary</p>
                    <p class="mt-3 text-xl font-semibold text-white">{{ $job->salary }}</p>
                </div>
            </div>

            <div class="mt-6 rounded-[1.75rem] border border-slate-700 bg-slate-900/70 p-6">
                <div class="flex flex-wrap items-center justify-between gap-3">
                    <h3 class="text-xl font-semibold text-white">Job overview</h3>
                    <span
                        class="rounded-full border border-emerald-500/20 bg-emerald-500/10 px-3 py-1 text-sm font-semibold text-emerald-300">
                        Open role
                    </span>
                </div>

                <div class="mt-6 grid gap-6 lg:grid-cols-[1.2fr_0.8fr]">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-[0.3em] text-slate-400">What this role includes
                        </p>
                        <p class="mt-3 text-slate-300">
                            This listing is focused on the role of {{ $job->title }} and highlights a strong opportunity for
                            the right candidate.
                            The salary package is clearly shown below, and the rest of the page keeps the core job details
                            easy to scan.
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
                                <span
                                    class="font-semibold text-slate-200">{{ optional($job->employer)->name ?? 'TBD' }}</span>
                            </li>
                            <li class="flex items-center justify-between">
                                <span>Pay</span>
                                <span class="font-semibold text-slate-200">{{ $job->salary }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @can('apply', $job)
                <div class="mt-8 rounded-[1.75rem] border border-slate-700 bg-slate-900/90 p-6">
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm font-semibold uppercase tracking-[0.3em] text-slate-400">Apply for this job</p>
                            <h3 class="text-xl font-semibold text-white">Upload your CV to send to the employer</h3>
                        </div>
                        <span
                            class="rounded-full border border-indigo-500/30 bg-indigo-500/10 px-3 py-1 text-sm font-semibold text-indigo-300">
                            PDF only
                        </span>
                    </div>

                    @if (session('success'))
                        <div class="mt-6 rounded-3xl border border-emerald-500/30 bg-emerald-500/10 p-4 text-sm text-emerald-200">
                            {{ session('success') }}
                        </div>
                    @endif

                    @auth
                        <x-form-card>
                            <form method="POST" action="{{ route('jobs.apply', $job) }}" enctype="multipart/form-data"
                                class="space-y-6">
                                @csrf

                                <x-form-label name="cv" label="Upload CV" type="file" required
                                    help="Attach your CV as a PDF file, up to 5MB." />

                                <x-form-error context="CV" />

                                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                                    <x-button type="submit" variant="primary">Apply Now</x-button>
                                    <p class="text-sm text-slate-400">Your CV will be sent directly to the employer.</p>
                                </div>

                            </form>
                        </x-form-card>
                    @else
                        <div class="mt-6 rounded-[1.5rem] border border-slate-800 bg-slate-950/60 p-6 text-slate-300">
                            <p class="text-base leading-7 text-slate-300">You need to be signed in to apply for this position.</p>
                            <div class="mt-4 flex flex-wrap gap-3">
                                <x-button href="{{ route('login') }}">Login</x-button>
                                <x-button href="{{ route('register') }}" variant="ghost">Register</x-button>
                            </div>
                        </div>
                    @endauth
                </div>
            @endcan
            <br>
            @can('edit', $job)
                <x-button href="/jobs/{{ $job->id }}/edit">Edit Job</x-button>
            @endcan
        </div>
    @else
        <div
            class="rounded-[2rem] border border-white/10 bg-slate-950/95 p-8 text-center shadow-[0_0_80px_rgba(15,23,42,0.45)] backdrop-blur-lg">
            <h2 class="text-2xl font-semibold text-white">Job not found</h2>
            <p class="mt-3 text-slate-300">The requested listing could not be found.</p>


        </div>

    @endif
</x-layout>