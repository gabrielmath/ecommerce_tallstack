<div {{ $attributes->merge(['class' => 'relative text-gray-500']) }}>
  <input
    type="text"
    class="w-full bg-transparent border-0 rounded-lg py-1 p-0 pl-8 cursor-pointer focus:cursor-text focus:outline-none focus:ring-0 focus:bg-white focus:shadow-md transition duration-100"
    {{ $attributes->except('class') }}
  />
  <x-icon.search class="w-4 h-4 absolute top-2 left-2"/>
</div>
