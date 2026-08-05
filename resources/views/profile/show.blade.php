<x-layout>
    <x-slot:heading>My Profile</x-slot:heading>

    <x-form-card>
        @if (session('status'))
            <div class="rounded-3xl border border-white/10 bg-slate-900/70 p-5 text-sm text-slate-200">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}" class="mt-8 space-y-8">
            @csrf
            @method('PATCH')

            <div class="grid gap-6 sm:grid-cols-2">
                <x-form-label name="first_name" label="First name" :value="old('first_name', $user->first_name)"
                    placeholder="Jane" required autocomplete="name" />

                <x-form-label name="last_name" label="Last name" :value="old('last_name', $user->last_name)"
                    placeholder="Doe" required autocomplete="name" />

                <x-form-label name="email" label="Email address" type="email" :value="old('email', $user->email)"
                    placeholder="you@example.com" required autocomplete="email" />

                <x-form-label name="account_type" label="Account type" :value="old('account_type', $user->account_type)"
                    disabled />
            </div>

            <x-form-error context="profile" />

            <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <x-button href="/" variant="ghost">Back to home</x-button>
                <div class="flex flex-col gap-3 sm:flex-row">
                    <x-button type="submit" variant="primary">Update profile</x-button>
                </div>
            </div>
        </form>

        <div class="mt-10 border-t border-white/10 pt-8">
            <p class="text-sm text-slate-400">Delete your account permanently. This action cannot be undone.</p>

            <form method="POST" action="{{ route('profile.destroy') }}" class="mt-8 space-y-8">
                @csrf
                @method('DELETE')

                <x-form-input name="password" label="Confirm password" type="password"
                    placeholder="Enter your current password" required autocomplete="current-password" />

                <div class="flex justify-end">
                    <x-button type="submit" variant="danger">Delete profile</x-button>
                </div>
            </form>
        </div>
    </x-form-card>
</x-layout>
