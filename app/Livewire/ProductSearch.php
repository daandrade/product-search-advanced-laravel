<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;


class ProductSearch extends Component
{
    use WithPagination;

    public $search = '';
    public $selectedBrands = [];
    public $selectedCategories = [];

    // Adicione essa linha abaixo:
    public $page = 1;

    protected $queryString = [
        'search' => ['except' => ''],
        'selectedBrands' => ['except' => []],
        'selectedCategories' => ['except' => []],
        'page' => ['except' => 1], // vai funcionar agora porque a propriedade foi definida
    ];

    public function updated()
    {
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->search = '';
        $this->selectedCategories = [];
        $this->selectedBrands = [];
        $this->resetPage();
    }

    public function render()
    {
        $query = Product::with(['category', 'brand']);

        if ($this->search) {
            $searchTerms = explode(' ', $this->search);

            $query->where(function ($q) use ($searchTerms) {
                foreach ($searchTerms as $term) {
                    $q->orWhere('name', 'like', '%' . $term . '%');
                }
            });
        }

        if (!empty($this->selectedCategories)) {
            $query->whereIn('category_id', $this->selectedCategories);
        }

        if (!empty($this->selectedBrands)) {
            $query->whereIn('brand_id', $this->selectedBrands);
        }

        return view('livewire.product-search', [
            'products' => $query->paginate(10),
            'categories' => Category::all(),
            'brands' => Brand::all(),
        ]);
    }
}

