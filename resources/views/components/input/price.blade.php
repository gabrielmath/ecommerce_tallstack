<div
  x-data="{
    focused: false
  }"
  @focused="focused = true"
  @blurred="focused = false"
  class="bg-white rounded-lg border"
  x-bind:class="focused ? 'ring border-primary-500 ring-primary-500 ring-opacity-50' : ''"
>
  <x-input.base-price padding="py-4 px-6" {{ $attributes }} />
</div>
