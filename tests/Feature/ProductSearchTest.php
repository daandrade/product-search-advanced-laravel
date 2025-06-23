<?php

namespace Tests\Unit;

use App\Livewire\ProductSearch;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ProductSearchTest extends TestCase
{
    use RefreshDatabase;

    public function test_component_can_render()
    {
        $this->withoutExceptionHandling();

        Livewire::test(ProductSearch::class)
            ->assertStatus(200);
    }

    public function test_can_filter_by_name()
    {
        Product::factory()->create(['name' => 'Notebook Gamer']);
        Product::factory()->create(['name' => 'Cadeira']);

        Livewire::test(ProductSearch::class)
            ->set('search', 'notebook')
            ->assertSee('Notebook Gamer')
            ->assertDontSee('Cadeira');
    }

    public function test_can_filter_by_category()
    {
        $categoriaA = Category::factory()->create();
        $categoriaB = Category::factory()->create();

        Product::factory()->create(['category_id' => $categoriaA->id, 'name' => 'Produto A']);
        Product::factory()->create(['category_id' => $categoriaB->id, 'name' => 'Produto B']);

        Livewire::test(ProductSearch::class)
            ->set('selectedCategories', [$categoriaA->id])
            ->assertSee('Produto A')
            ->assertDontSee('Produto B');
    }

    public function test_can_filter_by_brand()
    {
        $brandA = Brand::factory()->create();
        $brandB = Brand::factory()->create();

        Product::factory()->create(['brand_id' => $brandA->id, 'name' => 'Produto A']);
        Product::factory()->create(['brand_id' => $brandB->id, 'name' => 'Produto B']);

        Livewire::test(ProductSearch::class)
            ->set('selectedBrands', [$brandA->id])
            ->assertSee('Produto A')
            ->assertDontSee('Produto B');
    }

    public function test_can_clear_filters()
    {
        Product::factory()->create(['name' => 'Mesa']);

        Livewire::test(ProductSearch::class)
            ->set('search', 'Mesa')
            ->call('resetFilters')
            ->assertSet('search', '')
            ->assertSet('selectedCategories', [])
            ->assertSet('selectedBrands', []);
    }
}
