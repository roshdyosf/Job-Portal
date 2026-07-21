<x-layout>
    <x-slot:heading>About</x-slot:heading>
    @foreach ($jobs as $job)
        <br>
        <li><strong>{{$job['title']}}</strong> : pays {{$job['salary']}}</li>
    @endforeach
</x-layout>
