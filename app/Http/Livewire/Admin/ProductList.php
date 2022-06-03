<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class ProductList extends Component
{
    public $search;

    public function render()
    {
        return view('livewire.admin.product-list')->layout('layouts.admin');
    }

    public function getProductsProperty()
    {
        return Product::query()
            ->when($this->search, function (Builder $product) {
//                $product->whereRaw('LOWER(name) LIKE ?', '%' . mb_strtolower($this->search) . '%');

                $formattedNumber = is_numeric($this->search)
                    ? \Str::of($this->search)->replace(',', '')->replace('.', '')
                    : $this->search;

                $product->where('name', 'LIKE', "%{$this->search}%")
                    ->orWhere('price', 'LIKE', "%{$formattedNumber}%");
            })
            ->paginate(9);
    }
}
