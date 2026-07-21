<x-layout>
    <x-slot:heading>Jobs</x-slot:heading>
    <ul>
        @foreach ($jobs as $job)
            <br>
            <li>
                <a class=" text-gray-500 hover:underline" href="/jobs/{{$job['id']}}">
                    <strong>{{$job['title']}}</strong> : pays {{$job['salary']}}
                </a>
            </li>
        @endforeach
    </ul>
</x-layout>