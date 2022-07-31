@props(['active'])

@php
  $classes = ($active ?? false)
              ? 'inline-flex uppercase items-center px-1 pt-1 text-base font-normal leading-5 text-gray-900 focus:outline-none transition'
              : 'inline-flex uppercase items-center px-1 pt-1 text-base font-normal leading-5 text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
  {{ $slot }}
</a>
