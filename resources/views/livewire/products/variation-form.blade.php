<div class="grid grid-cols-4 bg-white" variation-id="{{ $variation['id'] }}">
  <div class="col-span-2 space-x-5 flex items-center p-2">
    <div
      x-data
      @click="$refs.inputFile.click()"
      class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center bg-gray-100 hover:bg-gray-200 transition duration-200 cursor-pointer"
    >
      <input wire:model="variation.image" type="file" x-ref="inputFile" accept="image/*" hidden/>
      @if(isset($variation['image']))
        <img
          src="{{ $variation['image']->temporaryUrl() }}"
          class="object-cover h-full w-full overflow-hidden rounded-lg"
          alt=""
        />
      @else
        <x-icon.camera class="w-6 h-6 text-gray-400"/>
      @endif
    </div>
    <input
      type="text"
      class="bg-transparent outline-none focus:outline-none p-0 border-0 focus:ring-0"
      placeholder="Name"
      value="{{ $variation['name'] }}"
    />
  </div>

  <div class="flex items-center pr-6">
    <x-input.base-price
      type="text"
      class="bg-transparent outline-none focus:outline-none p-0 border-0 focus:ring-0"
      placeholder="$ Price"
    />
  </div>

  <div class="grid grid-cols-2 gap-3 items-center">
    <input
      type="number"
      class=" w-full bg-transparent outline-none focus:outline-none p-0 border-0 focus:ring-0"
      placeholder="Quantity"
    />
    <div class="pl-2 pr-4 flex items-center justify-end space-x-2">
      <x-icon.trash
        wire:click="$emitUp('removeVariation', '{{ $variation['id'] }}')"
        class="w-6 h-6 text-red-300 hover:text-red-500 transition duration-200 cursor-pointer"
      />
      <x-icon.drag-move
        class="w-6 h-6 text-gray-400 hover:text-gray-500 transition duration-200 cursor-move"
      />
    </div>
  </div>
</div>


