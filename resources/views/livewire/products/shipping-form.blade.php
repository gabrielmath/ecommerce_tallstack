<div class="grid grid-cols-4 bg-white" shipping-id="{{ $shipping['id'] }}">
  <div class="col-span-2 flex items-center py-5 px-6">
    <input
      wire:model="shipping.name"
      type="text"
      class="bg-transparent outline-none focus:outline-none p-0 border-0 focus:ring-0"
      placeholder="Name"
    />
  </div>

  <div class="flex items-center pr-6">
    <x-input.base-price
      wire:model="shipping.standalone_price"
      class="bg-transparent outline-none focus:outline-none p-0 border-0 focus:ring-0"
      placeholder="$ Price"
    />
  </div>

  <div class="grid grid-cols-2 gap-3 items-center">
    <x-input.base-price
      wire:model="shipping.withothers_price"
      class=" w-full bg-transparent outline-none focus:outline-none p-0 border-0 focus:ring-0"
      placeholder="$ Price"
    />

    <div class="pl-2 pr-4 flex items-center justify-end space-x-2">
      <x-icon.trash
        wire:click="$emitUp('removeShipping', '{{ $shipping['id'] }}')"
        class="w-6 h-6 text-red-300 hover:text-red-500 transition duration-200 cursor-pointer"
      />
      <x-icon.drag-move
        class="w-6 h-6 text-gray-400 hover:text-gray-500 transition duration-200 cursor-move"
      />
    </div>
  </div>
</div>


