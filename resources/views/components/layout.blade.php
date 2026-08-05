<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-950">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobs</title>
    @vite(['resources/css/app.css'])
</head>

<body class="min-h-full text-slate-100">
    <div class="min-h-full">
        <nav class="border-b border-white/10 bg-slate-950/70 backdrop-blur-lg">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="shrink-0">
                            <div class="inline-flex  px-5 py-3 text-sm font-semibold transition">
                                JBP
                            </div>
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                                <x-nav-link href="/jobs" :active="request()->is('jobs')">Jobs</x-nav-link>
                                <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">
                            @guest
                                <x-button href="/login" class="ml-2">Login</x-button>
                                <x-button href="/register" class="ml-2">Register</x-button>
                            @endguest
                            @auth
                                <form method="POST" action="/logout">
                                    @csrf
                                    <x-button type="submit" variant="ghost">Logout</x-button>
                                </form>
                            @endauth
                            <div class="relative ml-3">
                                <div class="">
                                    @auth
                                        <x-button href="/profile"
                                            class="ml-2">{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</x-button>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="-mr-2 flex md:hidden">
                        @guest
                            <x-button href="/login" class="ml-2">Login</x-button>
                            <x-button href="/register" class="ml-2">Register</x-button>
                        @endguest
                        @auth
                            <form method="POST" action="/logout">
                                @csrf
                                <x-button type="submit" variant="ghost" class="mr-2 ">Logout</x-button>
                            </form>
                        @endauth
                    </div>
                </div>
            </div>

            <el-disclosure id="mobile-menu" hidden class="block md:hidden">

                <div class="space-y-1 items-center justify-center px-5 pt-2 pb-3 sm:px-3">
                    <x-nav-link :mob="true" href="/" :active="request()->is('/')">Home</x-nav-link>
                    <x-nav-link :mob="true" href="/jobs" :active="request()->is('jobs')">Jobs</x-nav-link>
                    <x-nav-link :mob="true" href="/contact" :active="request()->is('contact')">Contact</x-nav-link>

                </div>
            </el-disclosure>

        </nav>

        <header class="border-b border-white/10">

            <div
                class="mx-auto flex max-w-7xl flex-col gap-4 px-4 py-8 sm:flex-row sm:items-center sm:justify-between sm:px-6 lg:px-8">
                <div>

                    <p class="text-sm font-semibold uppercase tracking-[0.3em] text-indigo-300">Job portal</p>
                    <h1 class="mt-2 text-3xl font-bold tracking-tight text-white">{{ $heading }}</h1>
                </div>
                @auth
                    @can('create', App\Models\Job::class)
                        <x-button href="/jobs/create">Create Job</x-button>
                    @endcan
                @endauth
            </div>
        </header>

        <main>
            <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>
    </div>
</body>

</html>