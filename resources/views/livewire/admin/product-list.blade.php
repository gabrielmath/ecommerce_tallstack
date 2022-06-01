<div class="flex items-end">
  <h1 class="font-bold text-3xl text-gray-700">Products</h1>

  <x-input.search placeholder="Search..." class="max-w-xs ml-7"/>

  <div class="ml-auto flex items-center space-x-6">
    <div class="font-bold text-gray-700 border-b-2 border-current">All</div>
    <div class="font-bold text-gray-400">Draft</div>
    <div class="font-bold text-gray-400">Published</div>
  </div>
</div>

<div class="grid grid-cols-3 gap-5 mt-6">
  <x-product.card/>
  <x-product.card/>
  <x-product.card/>
  <x-product.card/>
  <x-product.card/>
</div>

