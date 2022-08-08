<?php

use App\Http\Livewire\Admin\ProductForm;
use App\Models\Product;
use App\Models\User;
use Tests\TestCase;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Livewire\livewire;

it('should be admin to save', function () {
    /** @var TestCase $this */
    $this
        ->get(route('admin.products.create'))
        ->assertRedirect(route('login'));

    $user = User::factory()->create();
    actingAs($user)
        ->get(route('admin.products.create'))
        ->assertNotFound();
});

it('requires name field', function () {
    livewire(ProductForm::class)
        ->set('product.name', null)
        ->call('save')
        ->assertHasErrors('product.name')
        ->assertSee(trans('validation.required', ['attribute' => 'name']));
});

test('field name has max of 255', function () {
    livewire(ProductForm::class)
        // Forcing error
        ->set('product.name', \Str::random(256))
        ->call('save')
        ->assertHasErrors('product.name')
        ->assertSee(trans('validation.max.string', ['attribute' => 'name', 'max' => 255]))
        // Without error
        ->set('product.name', \Str::random(255))
        ->call('save')
        ->assertDontSee(trans('validation.max.string', ['attribute' => 'name', 'max' => 255]));
});

it('requires description field', function () {
    livewire(ProductForm::class)
        ->set('product.description', null)
        ->call('save')
        ->assertHasErrors('product.description')
        ->assertSee(trans('validation.required', ['attribute' => 'description']));
});

test('field description has max of 4096', function () {
    $max = 4096;
    livewire(ProductForm::class)
        // Forcing error
        ->set('product.description', \Str::random(4097))
        ->call('save')
        ->assertHasErrors('product.description')
        ->assertSee(trans('validation.max.string', ['attribute' => 'description', 'max' => $max]))
        // Without error
        ->set('product.description', \Str::random($max))
        ->call('save')
        ->assertDontSee(trans('validation.max.string', ['attribute' => 'description', 'max' => $max]));
});

it('requires price field', function () {
    livewire(ProductForm::class)
        ->set('product.price', null)
        ->call('save')
        ->assertHasErrors('product.price')
        ->assertSee(trans('validation.required', ['attribute' => 'price']));
});

test('price field has min of 1 dollar', function () {
    livewire(ProductForm::class)
        ->set('product.price', 99)
        ->call('save')
        ->assertHasErrors('product.price')
        ->assertSee('The price must be at least $ 1.00');
});

test('price field has max of 1 million dollars', function () {
    livewire(ProductForm::class)
        ->set('product.price', 1000000001)
        ->call('save')
        ->assertHasErrors('product.price')
        ->assertSee('The price may not be greater than $ 1,000,000.00');
});

test('categories are optional')->skip('waiting implementation');

it('stores in database as draft', function () {
    $product = Product::factory()->makeOne();

    livewire(ProductForm::class)
        ->set('product.name', $product->name)
        ->set('product.description', $product->description)
        ->set('product.price', $product->price)
        ->call('save')
        ->assertRedirect(/*route('admin.products.edit')*/);

    assertDatabaseHas($product->getTable(), $product->only(['name', 'description', 'price']));
});

it('updates in database if already exists', function () {
    $product = Product::factory()->createOne();
    $productUpdates = Product::factory()->makeOne();

    livewire(ProductForm::class, ['product' => $product])
        ->set('product.name', $productUpdates->name)
        ->set('product.description', $productUpdates->description)
        ->set('product.price', $productUpdates->price)
        ->call('save');

    assertDatabaseHas($product->getTable(), [
        'id'          => $product->id,
        'name'        => $productUpdates->name,
        'description' => $productUpdates->description,
        'price'       => $productUpdates->price,
    ]);

    assertDatabaseCount($product->getTable(), 1);
});
