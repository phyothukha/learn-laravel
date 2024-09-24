@props(['active'])


@php
    $classes = $active ?? false ? ' bg-primary  rounded-md p-3 ' : ' rounded-md p-3 hover:bg-gray-200  cursor-pointer ';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
