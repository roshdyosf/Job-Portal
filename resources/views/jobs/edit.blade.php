<x-layout>
    <x-slot:heading>Edit Job</x-slot:heading>

    <x-form-card>
        <form method="POST" action="/jobs/{{ $job->id }}" class="mt-8 space-y-8">
            @csrf
            @method('PATCH')

            <div class="grid gap-6 sm:grid-cols-2">
                <x-form-label name="title" label="Job title" :value="$job->title" placeholder="Senior Backend Engineer"
                    required />
                <x-form-label name="company" label="Company / Employer" :value="$job->employer?->name"
                    placeholder="Acme Labs" />
            </div>

            <div class="grid gap-6 sm:grid-cols-3">
                <x-form-label name="location" label="Location" placeholder="Remote / New York, NY" />

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

                <x-form-label name="salary" label="Salary range" :value="$job->salary" placeholder="$80k - $120k"
                    required />
            </div>

            <div class="space-y-3">
                <span class="text-sm font-semibold text-slate-200">Job description</span>
                <textarea name="description" rows="6"
                    placeholder="Describe the role, responsibilities, and qualifications."
                    class="w-full rounded-[1.75rem] border border-slate-700 bg-slate-900/90 px-4 py-4 text-slate-100 placeholder:text-slate-500 shadow-inner shadow-black/20 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/25"></textarea>

                <x-form-error context="job" />

                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <x-button type="reset" variant="ghost">Reset</x-button>
                    <x-button href="/jobs/{{ $job->id }}" variant="ghost">Cancel</x-button>
                    <x-button type="submit" variant="primary">Update</x-button>
                    <x-button type="submit" form="delete-form" variant="danger">Delete</x-button>
                </div>
            </div>
        </form>

        <form method="POST" action="/jobs/{{ $job->id }}" id="delete-form" class="hidden"
            onsubmit="return confirm('Are you sure you want to delete this job?');">
            @csrf
            @method('DELETE')
        </form>
    </x-form-card>
</x-layout>