<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;

    public $search;
    public $filter;

    protected $queryString = [
        'search' => ['except' => ''],
        'filter' => ['except' => '']
    ];

    public function render()
    {
        return view('livewire.admin.product-list')->layout('layouts.admin');
    }

    public function getProductsProperty()
    {
        return Product::query()
            ->when($this->search, function (Builder $query) {
//                $query->whereRaw('LOWER(name) LIKE ?', '%' . mb_strtolower($this->search) . '%');

                $formattedNumber = is_numeric($this->search)
                    ? \Str::of($this->search)->replace(',', '')->replace('.', '')
                    : $this->search;

                $query->where(
                    fn(Builder $product) => $product
                        ->where('name', 'LIKE', "%{$this->search}%")
                        ->orWhere('price', 'LIKE', "%{$formattedNumber}%")
                        ->orWhere('description', 'LIKE', "%{$this->search}%")
                );
            })
            ->when($this->filter, function (Builder $query) {
                $this->filter === 'draft'
                    ? $query->whereNull('published_at')
                    : $query->whereNotNull('published_at');
            })
            ->paginate(9);
    }
}
