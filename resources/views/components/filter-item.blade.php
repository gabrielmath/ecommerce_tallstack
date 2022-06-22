@props(['isActive'])

<div
  {{ $attributes }}
  class="font-bold transition-all duration-75 {{ ($isActive ? 'text-gray-700 border-b-2 border-current' : 'text-gray-400 cursor-pointer hover:text-gray-500') }}"
>
  {{ $slot }}
</div>
