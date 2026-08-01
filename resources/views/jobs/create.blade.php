<x-layout>
    <x-slot:heading>Create Job</x-slot:heading>

    <div class="rounded-[2rem] border border-white/10 bg-slate-950/95 p-8 shadow-[0_0_80px_rgba(15,23,42,0.45)] backdrop-blur-lg">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-sm text-slate-400">Create a clean, modern job listing with essential fields only.</p>
            </div>
            <span class="inline-flex items-center rounded-full bg-indigo-500/10 px-3 py-1 text-sm font-medium text-indigo-300">Dark mode ready</span>
        </div>

        <form method="POST" action="/jobs" class="mt-8 space-y-8">
            @csrf

            <div class="grid gap-6 sm:grid-cols-2">
                <label class="block">
                    <span class="text-sm font-semibold text-slate-200">Job title</span>
                    <input name="title" type="text" required placeholder="Senior Backend Engineer"
                        class="mt-2 w-full rounded-3xl border border-slate-700 bg-slate-900/90 px-4 py-3 text-slate-100 placeholder:text-slate-500 shadow-inner shadow-black/20 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/25" />
                </label>

                <label class="block">
                    <span class="text-sm font-semibold text-slate-200">Company / Employer</span>
                    <input name="company" type="text" required placeholder="Acme Labs"
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
                    <span class="text-sm font-semibold text-slate-200">Salary range</span>
                    <input name="salary" type="text" placeholder="$80k–$120k"
                        class="mt-2 w-full rounded-3xl border border-slate-700 bg-slate-900/90 px-4 py-3 text-slate-100 placeholder:text-slate-500 shadow-inner shadow-black/20 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/25" />
                </label>
            </div>

            <div class="space-y-3">
                <div class="flex items-center justify-between gap-4">
                    <span class="text-sm font-semibold text-slate-200">Job description</span>
                    <span class="text-xs text-slate-500">Required</span>
                </div>
                <textarea name="description" rows="6" required placeholder="Describe the role, responsibilities, and qualifications."
                    class="w-full rounded-[1.75rem] border border-slate-700 bg-slate-900/90 px-4 py-4 text-slate-100 placeholder:text-slate-500 shadow-inner shadow-black/20 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/25"></textarea>
            </div>

            <div class="grid gap-6 sm:grid-cols-2">
                <label class="block">
                    <span class="text-sm font-semibold text-slate-200">Apply via</span>
                    <input name="apply_link" type="text" placeholder="https://example.com/apply or email@example.com"
                        class="mt-2 w-full rounded-3xl border border-slate-700 bg-slate-900/90 px-4 py-3 text-slate-100 placeholder:text-slate-500 shadow-inner shadow-black/20 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/25" />
                </label>

                <label class="block">
                    <span class="text-sm font-semibold text-slate-200">Deadline</span>
                    <input name="deadline" type="date"
                        class="mt-2 w-full rounded-3xl border border-slate-700 bg-slate-900/90 px-4 py-3 text-slate-100 shadow-inner shadow-black/20 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/25" />
                </label>
            </div>

            <div class="rounded-3xl border border-white/10 bg-slate-900/70 p-5 text-sm text-slate-400">
                Keep the job post clear and concise. Strong listings highlight the title, company, location, type, salary range, and how applicants should apply.
            </div>

            <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <button type="reset"
                    class="rounded-3xl border border-slate-700 bg-slate-900/85 px-6 py-3 text-sm font-semibold text-slate-200 transition hover:bg-slate-800/95">Reset</button>
                <button type="submit"
                    class="inline-flex items-center justify-center rounded-3xl bg-indigo-500 px-6 py-3 text-sm font-semibold text-white transition hover:bg-indigo-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/50">Publish Job</button>
            </div>
        </form>
    </div>
</x-layout>