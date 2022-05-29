<div class="bg-white rounded-lg p-8">
  <div class="flex justify-between mb-8">
    <h3 class="text-gray-700 font-bold text-xl">{{ $title }}</h3>

    <x-dynamic-component :component="'icon.' . $icon" class="w-8 h-8 text-gray-900"/>
  </div>

  <div class="space-y-4">
    {{ $slot }}
  </div>
</div>
