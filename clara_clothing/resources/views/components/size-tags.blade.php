@props(['tagsCsv'])


@php
    $tags = explode(',', $tagsCsv);
@endphp
{{-- Php directive - inside php directive  we can write any php code--}}

<ul class="flex">
    @foreach($tags as $tag)
    <li
        class="badge text-bg-dark"
    >
        <a href="/?tag={{$tag}}" class="text-white text-decoration-none">{{$tag}}</a>
    </li>
    @endforeach
</ul>