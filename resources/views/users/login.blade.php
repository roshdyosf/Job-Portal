<x-layout>
    <x-slot:heading>Welcome back</x-slot:heading>

    <x-form-card>
        <form method="POST" action="/login" class="mt-8 space-y-8">
            @csrf

            <div class="grid gap-6 sm:grid-cols-1">
                <x-form-label name="email" label="Email address" type="email" placeholder="you@example.com" required
                    autocomplete="email" />
                <x-form-label name="password" label="Password" type="password" placeholder="Enter your password"
                    required autocomplete="current-password" />
            </div>

            <x-form-error context="login" />

            <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <x-button href="/register" variant="ghost">Create an account</x-button>
                <x-button type="submit" variant="primary">Sign in</x-button>
            </div>
        </form>
    </x-form-card>
</x-layout>