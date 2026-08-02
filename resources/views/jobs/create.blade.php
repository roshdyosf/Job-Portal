<x-layout>
    <x-slot:heading>Create Job</x-slot:heading>

    <x-form-card>
        <form method="POST" action="/jobs" class="mt-8 space-y-8">
            @csrf

            <div class="grid gap-6 sm:grid-cols-2">
                <x-form-label name="title" label="Job title" placeholder="Senior Software Engineer" required />
                <x-form-label name="company" label="Company / Employer" placeholder="Acme Labs" />
            </div>

            <div class="grid gap-6 sm:grid-cols-3">
                <x-form-label name="location" label="Location" placeholder="San Francisco, CA" />

                <x-select name="type" label="Job Type" :options="['Full-time', 'Part-time', 'Contract', 'Internship']"
                    :value="old('type')" />

                <x-form-label name="salary" label="Salary range" placeholder="$80k - $120k" required />
            </div>

            <div class="space-y-3">
                <span class="text-sm font-semibold text-slate-200">Job description</span>
                <textarea name="description" rows="6"
                    placeholder="Describe the role, responsibilities, and qualifications."
                    class="w-full rounded-[1.75rem] border border-slate-700 bg-slate-900/90 px-4 py-4 text-slate-100 placeholder:text-slate-500 shadow-inner shadow-black/20 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/25"></textarea>

                <x-form-error context="job" />

                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <x-button type="reset" variant="ghost">Reset</x-button>
                    <x-button type="submit" variant="primary">Apply Job</x-button>
                </div>
            </div>
        </form>
    </x-form-card>
</x-layout>