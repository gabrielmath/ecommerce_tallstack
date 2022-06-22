<div class="rounded-2xl space-y-4 bg-white shadow-md p-5">
  <div class="flex justify-between">
    <h3 class="font-bold text-gray-700">{{ $product->name }}</h3>
    <span class="text-gray-400 whitespace-nowrap">$ {{ $product->price / 100 }}</span>
  </div>
  <img
    class="rounded-lg"
    src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1399&q=80"
    alt=""
  />
  <p class="text-sm text-gray-500">
    {{ $product->description }}
  </p>
</div>