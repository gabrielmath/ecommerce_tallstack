<x-base-button {{ $attributes->merge([
    'type' => 'submit',
    'class' => 'inline-flex items-center px-4 py-2 bg-primary-500 border border-transparent rounded-lg text-sm text-white hover:bg-primary-600 active:bg-primary-600 focus:outline-none focus:border-primary-700 focus:ring focus:ring-gray-300 disabled:opacity-25 transition'
    ]) }}>
  {{ $slot }}
</x-base-button>
