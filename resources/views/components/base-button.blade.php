<button {{ $attributes->merge(['class' => 'transform-gpu active:scale-95 transition-all duration-75']) }}>
  {{ $slot }}
</button>