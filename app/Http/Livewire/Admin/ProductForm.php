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

    protected $listeners = ['removeVariation'];

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
    }

    public function removeVariation($id)
    {
        $this->variations = collect($this->variations)->filter(fn($variation) => $variation['id'] !== $id)->toArray();
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
