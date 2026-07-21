@props(['active' => false, 'mob' => false])


@if (!$mob)
    <a {{$attributes}} aria-current="page"
        class="{{ $active ? 'bg-gray-950/50 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white'}} rounded-md px-3 py-2 text-sm font-medium"
        aria-current={{ $active ? 'page' : 'false'}}>{{$slot}}</a>
@else
    <a {{$attributes}} aria-current="page"
        class="{{ $active ? 'block rounded-md bg-gray-950/50 px-3 py-2 text-base font-medium text-white' : ' block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white'}} rounded-md px-3 py-2 text-sm font-medium"
        aria-current={{ $active ? 'page' : 'false'}}>{{$slot}}</a>

@endif