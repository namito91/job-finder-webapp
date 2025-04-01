<x-layout>


@include('partials._hero')    
@include('partials._search')


<!-- se usa la sintaxis de blade  -->

<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">


@php
    /* 
$test = 1
{{$test}} */
@endphp

<div style="text-align: center;">
    
    @if (count($listings) == 0)
        
    <p> no listings found </p>
    
    @else
        
    @foreach($listings as $listing)
        
    <x-listing-card :listing="$listing" />

    @endforeach

    @endif

</div>

</div>
</x-layout>