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

it('should search products by description', function () {
    $productList = Product::factory(3)->create();

    /** @var Product $product */
    $product = Product::factory()->create();

    $component = livewire(ProductList::class)
        ->set('search', $product->description)
        ->assertSee($product->description)
        ->assertDontSee($productList->random()->description);

    $productList->each(
        fn($product) => $component->assertDontSee($productList->random()->description)
    );
});

it('can be filtered by draft', function () {
    $productList = Product::factory(3)->create(['published_at' => now()]);

    /** @var Product $draftProduct */
    $draftProduct = Product::factory()->create(['published_at' => null]);

    $component = livewire(ProductList::class)
        ->set('filter', 'draft')
        ->assertSee($draftProduct->name);

    $productList->each(fn($product) => $component->assertDontSee($product->name));
});

it('can be filtered by published', function () {
    $productList = Product::factory(3)->create(['published_at' => null]);

    /** @var Product $publishedProduct */
    $publishedProduct = Product::factory()->create(['published_at' => now()]);

    $component = livewire(ProductList::class)
        ->set('filter', 'published')
        ->assertSee($publishedProduct->name);

    $productList->each(fn($product) => $component->assertDontSee($product->name));
});
