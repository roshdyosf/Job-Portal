<x-layout>
    <x-slot:heading>Create your account</x-slot:heading>

    <x-form-card>
        <form method="POST" action="/register" class="mt-8 space-y-8">
            @csrf

            <div class="grid gap-6 sm:grid-cols-2">
                <x-form-label name="first_name" label="First name" placeholder="Jane" required autocomplete="name" />
                <x-form-label name="last_name" label="Last name" placeholder="Doe" required autocomplete="name" />
                <x-form-label name="email" label="Email address" type="email" placeholder="you@example.com" required
                    autocomplete="email" />
                <x-select name="role" label="Account Type" :options="[
        'employee' => 'Employee (Looking for a job)',
        'employer' => 'Employer (Hiring)'
    ]" :value="old('role')" />
            </div>

            <div class="grid gap-6 sm:grid-cols-2">
                <x-form-label name="password" label="Password" type="password" placeholder="Enter a strong password"
                    required autocomplete="new-password" />
                <x-form-label name="password_confirmation" label="Confirm password" type="password"
                    placeholder="Repeat your password" required autocomplete="new-password" />

            </div>

            <x-form-error context="account" />

            <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <x-button href="/login" variant="ghost">Already have an account?</x-button>
                <x-button type="submit" variant="primary">Create account</x-button>
            </div>
        </form>
    </x-form-card>
</x-layout>