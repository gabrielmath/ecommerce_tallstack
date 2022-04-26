<div
  x-data="{
    active: false
  }"
  class="flex items-center justify-between w-full"
  @click="active = !active"
>
  {{ $slot }} <span x-text="active ? 'on' : 'off'"></span>

  <div
    class="relative w-11 h-6 border-2 rounded-full cursor-pointer"
    :class="active
      ? 'bg-primary-500 border-primary-500'
      : 'bg-gray-300 border-gray-300'
    "
  >
    <div
      class="bg-white rounded-full w-5 h-5 transform-gpu transition-transform"
      :class="{'translate-x-5': active}"
    ></div>
  </div>
</div>
