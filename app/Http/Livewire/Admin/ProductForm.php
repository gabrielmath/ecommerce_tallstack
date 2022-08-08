<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class ProductForm extends Component
{
    use WithFileUploads;

    public ?Product $product;

    /** @var TemporaryUploadedFile[] */
    public $temporaryImages = [];

    /** @var TemporaryUploadedFile[] */
    public $previousImages = [];

    public $variations = [];

    public $shippings = [];

    protected $listeners = ['removeVariation', 'removeShipping'];

    protected $rules = [
        'product.name'        => 'required',
        'product.description' => ['required', 'email', 'min:5'],
        'product.price'       => 'required'
    ];

    public function mount()
    {
        $this->product = new Product();

        $this->variations = collect()->times(3)->map(fn($index) => [
            'id'       => \Str::random(),
            'image'    => null,
            'name'     => 'Name ' . $index,
            'price'    => null,
            'quantity' => null,
            'position' => $index - 1
        ]);

        $this->shippings = collect()->times(3)->map(fn($index) => [
            'id'               => \Str::random(),
            'name'             => 'Name ' . $index,
            'standalone_price' => 1000,
            'withothers_price' => 700,
            'position'         => $index - 1
        ]);
    }

    public function removeVariation($id)
    {
        $this->variations = collect($this->variations)->filter(fn($variation) => $variation['id'] !== $id)->toArray();
    }

    public function removeShipping($id)
    {
        $this->shippings = collect($this->shippings)->filter(fn($shipping) => $shipping['id'] !== $id)->toArray();
    }

    public function updatingTemporaryImages()
    {
        $this->previousImages = $this->temporaryImages;
    }

    public function updatedTemporaryImages($images)
    {
        $this->temporaryImages = collect([
            ...$this->previousImages,
            ...$this->temporaryImages
        ])->unique(
            fn(TemporaryUploadedFile $file) => $file->getClientOriginalName()
        )->toArray();
    }

    public function removeTemporaryImage($index)
    {
        array_splice($this->temporaryImages, $index, 1);
    }

    public function updateVariationsPositions($variationIds)
    {
        $newVariations = [];

        foreach ($variationIds as $index => $id) {
            $variation = collect($this->variations)->where('id', $id)->first();

            $variation['position'] = $index;
            $newVariations[] = $variation;
        }

        $this->variations = $newVariations;
    }

    public function updateShippingsPositions($shippingIds)
    {
        $newShippings = [];

        foreach ($shippingIds as $index => $id) {
            $shipping = collect($this->shippings)->where('id', $id)->first();

            $shipping['position'] = $index;
            $newShippings[] = $shipping;
        }

        $this->shippings = $newShippings;
    }

    public function addVariation()
    {
        $this->variations[] = [
            'id'       => \Str::random(),
            'image'    => null,
            'name'     => null,
            'price'    => null,
            'quantity' => null,
            'position' => 0
        ];
    }

    public function addShipping()
    {
        $this->shippings[] = [
            'id'               => \Str::random(),
            'name'             => 'Correios',
            'standalone_price' => 1000,
            'withothers_price' => 800
        ];
    }

    public function save()
    {
        $this->validate();
//        dd('save');
    }

    public function render()
    {
        return view('livewire.admin.product-form')->layout('layouts.admin');
    }
}
