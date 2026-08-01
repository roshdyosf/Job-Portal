<x-layout>
    <x-slot:heading>Edit Job</x-slot:heading>

    <div
        class="rounded-[2rem] border border-white/10 bg-slate-950/95 p-8 shadow-[0_0_80px_rgba(15,23,42,0.45)] backdrop-blur-lg">


        <form method="Post" action="/jobs/{{ $job->id }}" class="mt-8 space-y-8">
            @csrf
            @method('PATCH')
            <div class="grid gap-6 sm:grid-cols-2">
                <label class="block">
                    <span class="text-sm font-semibold text-slate-200">Job title</span>
                    <input name="title" type="text" required placeholder={{$job->title ?? 'Senior Backend Engineer'}}
                        value="{{ $job->title ?? '' }}"
                        class="mt-2 w-full rounded-3xl border border-slate-700 bg-slate-900/90 px-4 py-3 text-slate-100 placeholder:text-slate-500 shadow-inner shadow-black/20 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/25" />
                </label>

                <label class="block">
                    <span class="text-sm font-semibold text-slate-200">Company / Employer</span>
                    <input name="company" type="text" placeholder={{$job->employer->name ?? 'Acme Labs'}}
                        value="{{ $job->employer->name ?? '' }}"
                        class="mt-2 w-full rounded-3xl border border-slate-700 bg-slate-900/90 px-4 py-3 text-slate-100 placeholder:text-slate-500 shadow-inner shadow-black/20 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/25" />
                </label>
            </div>

            <div class="grid gap-6 sm:grid-cols-3">
                <label class="block">
                    <span class="text-sm font-semibold text-slate-200">Location</span>
                    <input name="location" type="text" placeholder="Remote / New York, NY"
                        class="mt-2 w-full rounded-3xl border border-slate-700 bg-slate-900/90 px-4 py-3 text-slate-100 placeholder:text-slate-500 shadow-inner shadow-black/20 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/25" />
                </label>

                <label class="block">
                    <span class="text-sm font-semibold text-slate-200">Job type</span>
                    <select name="type"
                        class="mt-2 w-full rounded-3xl border border-slate-700 bg-slate-900/90 px-4 py-3 text-slate-100 shadow-inner shadow-black/20 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/25">
                        <option>Full-time</option>
                        <option>Part-time</option>
                        <option>Contract</option>
                        <option>Internship</option>
                    </select>
                </label>

                <label class="block">
                    <span class="text-sm font-semibold text-slate-200">Salary-range</span>
                    <input name="salary" type="text" required placeholder={{$job->salary ?? '$80k - $120k'}}
                        value="{{ $job->salary ?? '' }}"
                        class="mt-2 w-full rounded-3xl border border-slate-700 bg-slate-900/90 px-4 py-3 text-slate-100 placeholder:text-slate-500 shadow-inner shadow-black/20 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/25" />
                </label>
            </div>

            <div class="space-y-3">
                <div class="flex items-center justify-between gap-4">
                    <span class="text-sm font-semibold text-slate-200">Job description</span>

                </div>
                <textarea name="description" rows="6"
                    placeholder="Describe the role, responsibilities, and qualifications."
                    class="w-full rounded-[1.75rem] border border-slate-700 bg-slate-900/90 px-4 py-4 text-slate-100 placeholder:text-slate-500 shadow-inner shadow-black/20 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/25"></textarea>


                <div class="rounded-3xl border border-white/10 bg-slate-900/70 p-5 text-sm text-slate-400">
                    @if ($errors->any())
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li class="text-red-500">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-sm font-semibold text-slate-200">please ensure to enter a valid job information.</p>
                    @endif
                </div>

                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <button type="reset"
                        class="rounded-3xl border border-slate-700 bg-slate-900/85 px-6 py-3 text-sm font-semibold text-slate-200 transition hover:bg-slate-800/95">Reset</button>
                    <x-button href="/jobs/{{ $job->id }}">Cancel</x-button>
                    <button type="submit"
                        class="inline-flex items-center justify-center rounded-3xl bg-indigo-500 px-6 py-3 text-sm font-semibold text-white transition hover:bg-indigo-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/50">Update</button>

                    <button form="delete-form"
                        class="inline-flex items-center justify-center rounded-3xl bg-red-500 px-6 py-3 text-sm font-semibold text-white transition hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/50">Delete</button>

                </div>

        </form>

        <form method="POST" action="/jobs/{{ $job->id }}" id="delete-form" class="hidden"
            onsubmit="return confirm('Are you sure you want to delete this job?');">
            @csrf
            @method('DELETE')
        </form>
    </div>
</x-layout>