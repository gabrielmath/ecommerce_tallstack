<?php

use App\Http\Livewire\Admin\ProductList;
use App\Models\Product;
use App\Models\User;
use Tests\TestCase;

use function Pest\Livewire\livewire;

it('is allow for admins only', function () {
    /** @var User $admin */
    $admin = User::factory()->create(['admin' => true]);
    $nonAdminUser = User::factory()->create();

    /** @var TestCase */
    $this->get(route('admin.products'))
        ->assertRedirect(route('login'));

    $this->actingAs($nonAdminUser)
        ->get(route('admin.products'))
        ->assertNotFound();

    $this->actingAs($admin)
        ->get(route('admin.products'))
        ->assertOk();
});

it('should list all products paginated per 9', function () {
    /** @var Product $lastProduct */
    $lastProduct = Product::factory(10)->create()->last();

    livewire(ProductList::class)
        ->assertDontSee($lastProduct->name);
});

it('should search products by name', function () {
    $productList = Product::factory(3)->create();

    /** @var Product $product */
    $product = Product::factory()->create();

    livewire(ProductList::class)
        ->set('search', $product->name)
        ->assertSee($product->name)
        ->assertDontSee($productList->random()->name);
});

it('should search products by price', function () {
    $productList = Product::factory(3)->create();

    /** @var Product $product */
    $product = Product::factory()->create();
    $formattedPrice = number_format($product->price / 100, 2);

    $component = livewire(ProductList::class)
        ->set('search', $product->price)
        ->assertSee($formattedPrice)
        ->set('search', $formattedPrice)
        ->assertSee($formattedPrice);

    $productList->each(
        fn($product) => $component->assertDontSee($productList->random()->price)
    );
});
it('should search products by description');
it('can be filtered by draft');
it('can be filtered by published');
it('should paginate by url');
it('should sync query string');
