<x-layout>
    <x-slot:heading>Jobs</x-slot:heading>
    <div class="space-y-4">
        @foreach ($jobs as $job)
            <br>
            <li>
                <a class="block px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-100" href="/jobs/{{$job['id']}}">
                    <div class="font-bold text-blue-500">{{$job->employer->name}}</div>
                    <div>
                        <strong>{{$job['title']}}</strong> : pays {{$job['salary ']}} per year
                    </div>
                </a>
            </li>
        @endforeach
    </div>

    <div>
        {{$jobs->links()}}
    </div>
</x-layout>