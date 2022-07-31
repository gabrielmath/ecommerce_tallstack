@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'w-full py-4 px-6 placeholder-gray-400 border-gray-200 focus:outline-none focus:border-primary-500 focus:ring focus:ring-primary-400 focus:ring-opacity-50 rounded-md shadow-sm'
    ]) !!}
/>
