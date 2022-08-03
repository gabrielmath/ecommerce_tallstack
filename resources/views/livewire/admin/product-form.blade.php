<div>
  <x-page-title>New Product</x-page-title>

  <div class="flex space-x-3 mt-5">
    <div class="w-1/3">
      <div class="grid grid-cols-4 gap-2 mt-2">
        @foreach($temporaryImages as $temporaryImage)
          <div
            wire:key="{{ $temporaryImage->temporaryUrl() }}"
            class="relative group {{ $loop->first ? 'col-span-4' : 'flex max-h-16' }}"
          >
            <img
              class="rounded-lg object-cover"
              src="{{ $temporaryImage->temporaryUrl() }}"
              alt=""
            />
            <div
              wire:click="removeTemporaryImage({{ $loop->index }})"
              class="absolute opacity-0 group-hover:opacity-100 h-5 w-5 flex items-center justify-center top-0.5 right-0.5 bg-black bg-opacity-50 rounded-full cursor-pointer hover:bg-red-500 transition-all duration-200"
            >
              <x-icon.x class="w-4 h-4 text-white"/>
            </div>
          </div>
        @endforeach


        <div class="flex max-h-16" x-data>
          <input
            wire:model="temporaryImages"
            type="file"
            multiple
            x-ref="inputFile"
            accept="image/*"
            class="hidden"
          />
          <button
            @click="$refs.inputFile.click()"
            class="w-full focus:outline-none flex items-center justify-center bg-white rounded-lg text-gray-500 opacity-50 hover:opacity-100 cursor-pointer transition duration-100"
          >
            <x-icon.plus class="w-12 h-12"/>
          </button>
        </div>

      </div>
    </div>

    <form wire:submit.prevent="save" class="w-2/3">
      <div class="space-y-3">
        <div class="">
          <x-input
            wire:model.defer="product.name"
            class="w-full"
            type="text"
            placeholder="Product Name"
          />
          <x-input-error for="product.name"/>
        </div>

        <div class="">
          <x-input
            wire:model.defer="product.description"
            class="w-full"
            type="text"
            placeholder="Description"
          />
          <x-input-error for="product.description"/>
        </div>

        <div class="">
          <x-input
            class="w-full"
            type="text"
            placeholder="Categories"
          />
        </div>

        <div class="">
          <x-input.price
            wire:model="product.price"
            class="w-full"
            type="text"
            placeholder="$ Price"
          />
          <x-input-error for="product.price"/>
        </div>

      </div>

      {{-- Variations --}}
      <div class="grid grid-cols-4 mt-6">
        <h3 class="col-span-2 font-bold text-xl text-gray-700">Variations</h3>
        <h4 class="text-gray-700">Price</h4>
        <h4 class="text-gray-700">Quantity</h4>
      </div>

      <div class="rounded-lg overflow-hidden mt-3">
        {{-- Row --}}
        <div
          x-data
          x-init="Sortablejs.create($el, {
            animation:150,
            handle: '.cursor-move',
            onSort({to}) {
              const variationIds = Array.from(to.children).map(el => el.getAttribute('variation-id'));
              @this.updateVariationsPositions(variationIds);
            }
          })"
        >
          @foreach($variations as $variation)
            <livewire:products.variation-form
              :variation="$variation"
              variation-id="{{ $variation['id'] }}"
              key="variation-form-{{ $variation['id'] }}"
            />
          @endforeach
        </div>

        <button
          wire:click="addVariation"
          type="button"
          class="w-full focus:ring-0 outline-none focus:outline-none flex items-center justify-center h-16 bg-gray-400 bg-opacity-50 hover:bg-opacity-75 text-gray-700 hover:text-gray-900 transition duration-100"
        >
          <x-icon.plus class="w-6 h-6"/>
          <span>Add Variation</span>
        </button>
      </div>

      {{-- Shipping --}}
      <div class="grid grid-cols-4 mt-6">
        <h3 class="col-span-2 font-bold text-xl text-gray-700">Shipping</h3>
        <h4 class="text-gray-700">Standalone</h4>
        <h4 class="text-gray-700">With Others</h4>
      </div>
      <div class="rounded-lg overflow-hidden mt-3">
        {{-- Row --}}
        <div class="grid grid-cols-4 bg-white">
          <div class="col-span-2 flex items-center py-5 px-6">
            <input
              type="text"
              class="bg-transparent outline-none focus:outline-none p-0 border-0 focus:ring-0"
              placeholder="Name. e.g. Fedex"
            />
          </div>

          <div class="flex items-center pr-6">
            <input
              type="text"
              class="bg-transparent outline-none focus:outline-none p-0 border-0 focus:ring-0"
              placeholder="$ Price"
            />
          </div>

          <div class="grid grid-cols-2 gap-3 items-center">
            <input
              type="text"
              class=" w-full bg-transparent outline-none focus:outline-none p-0 border-0 focus:ring-0"
              placeholder="$ Price"
            />
            <div class="pl-2 pr-4 flex items-center justify-end space-x-2">
              <x-icon.trash class="w-6 h-6 text-red-300 hover:text-red-500 cursor-pointer"/>
              <x-icon.drag-move class="w-6 h-6 text-gray-400 hover:text-gray-500 cursor-move"/>
            </div>
          </div>
        </div>

        <button
          class="w-full flex items-center justify-center h-16 bg-gray-400 bg-opacity-50 hover:bg-opacity-75 text-gray-700 hover:text-gray-900 transition duration-100"
        >
          <x-icon.plus class="w-6 h-6"/>
          <span>Add Shipping</span>
        </button>
      </div>

      <div class="flex items-center mt-6 space-x-3">
        <x-button.green class="w-full flex items-center justify-center">Publish</x-button.green>
        <x-button class="w-full flex items-center justify-center">Save</x-button>
      </div>

    </form>
  </div>

</div>
