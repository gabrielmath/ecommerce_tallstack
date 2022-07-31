<div>
  <div class="flex items-center justify-between">
    <div>
      <h1 class="font-bold text-3xl text-gray-700">Products ({{ $this->products->total() }})</h1>

      <div class=" flex items-center space-x-4">
        <div class="ml-auto flex items-center space-x-6">
          <x-filter-item wire:click="$set('filter', null)" :is-active="!$filter">
            All
          </x-filter-item>

          <x-filter-item wire:click="$set('filter','draft')" :is-active="$filter === 'draft'">
            Draft
          </x-filter-item>

          <x-filter-item wire:click="$set('filter','published')" :is-active="$filter === 'published'">
            Published
          </x-filter-item>
        </div>
        <x-input.search
          placeholder="Search..."
          wire:model.debounce.500ms="search"
          :is-active="!!$search"
          class="max-w-xs ml-7"
        />
      </div>
    </div>
    <x-button>New Product</x-button>
  </div>

  <div class="grid grid-cols-3 gap-5 mt-6">
    @forelse($this->products as $product)
      <x-product.card :product="$product"/>
    @empty
    @endforelse
  </div>

  <div class="my-10">
    {{ $this->products->links() }}
  </div>
</div>
