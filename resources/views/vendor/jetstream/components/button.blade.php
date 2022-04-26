<button {{ $attributes->merge([
    'type' => 'submit',
    'class' => 'inline-flex items-center px-6 py-4 bg-gray-800 border border-transparent rounded-lg text-white hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition'
    ]) }}>
  {{ $slot }}
</button>
