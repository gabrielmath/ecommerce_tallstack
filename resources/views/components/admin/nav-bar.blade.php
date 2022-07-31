<nav class="h-20 border flex justify-center space-x-4 bg-white">
  <x-admin.nav-item href="#" icon="home" :is-active="false">
    Home
  </x-admin.nav-item>

  <x-admin.nav-item href="#" icon="orders" :is-active="false">
    Orders
  </x-admin.nav-item>

  <x-admin.nav-item href="{{ route('admin.products') }}" icon="tags" :is-active="Route::is('admin.products')">
    Products
  </x-admin.nav-item>

  <x-admin.nav-item href="#" icon="ticket" :is-active="false">
    Coupons
  </x-admin.nav-item>

  <x-admin.nav-item href="#" icon="user-circle" :is-active="false">
    Account
  </x-admin.nav-item>
</nav>
