<div>
  <x-page-title>New Product</x-page-title>

  <div class="flex space-x-3 mt-5">
    <div class="w-1/3">
      <div class="">
        <img
          class="rounded-lg"
          src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1399&q=80"
          alt=""
        />
      </div>

      <div class="grid grid-cols-4 gap-2 mt-2">
        <div class="flex max-h-16">
          <img
            class="rounded-lg object-cover"
            src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1399&q=80"
            alt=""
          />
        </div>

        <div class="flex max-h-16">
          <img
            class="rounded-lg object-cover"
            src="https://images.unsplash.com/photo-1659204675703-50a26dccfd90?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=736&q=80"
            alt=""
          />
        </div>

        <div class="flex max-h-16">
          <img
            class="rounded-lg object-cover"
            src="https://images.unsplash.com/photo-1659204675703-50a26dccfd90?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=736&q=80"
            alt=""
          />
        </div>

        <div class="flex max-h-16">
          <div
            class="w-full flex items-center justify-center bg-white rounded-lg text-gray-500 opacity-50 hover:opacity-100 cursor-pointer transition duration-100"
          >
            <x-icon.plus class="w-12 h-12"/>
          </div>
        </div>

      </div>
    </div>

    <div class="w-2/3">
      <div class="space-y-3">
        <x-input class="w-full" type="text" placeholder="Product Name"/>
        <x-input class="w-full" type="text" placeholder="Description"/>
        <x-input class="w-full" type="text" placeholder="Categories"/>
        <x-input class="w-full" type="number" placeholder="Price"/>
      </div>

      {{-- Variations --}}
      <div class="grid grid-cols-4 mt-6">
        <h3 class="col-span-2 font-bold text-xl text-gray-700">Variations</h3>
        <h4 class="text-gray-700">Price</h4>
        <h4 class="text-gray-700">Quantity</h4>
      </div>
      <div class="rounded-lg overflow-hidden mt-3">
        {{-- Row --}}
        <div class="grid grid-cols-4 bg-white">
          <div class="col-span-2 space-x-5 flex items-center p-2">
            <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center">
              <x-icon.camera class="w-6 h-6 text-gray-400"/>
            </div>
            <input
              type="text"
              class="bg-transparent outline-none focus:outline-none p-0 border-0 focus:ring-0"
              placeholder="Name"
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
              type="number"
              class=" w-full bg-transparent outline-none focus:outline-none p-0 border-0 focus:ring-0"
              placeholder="Quantity"
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

    </div>
  </div>

</div>
