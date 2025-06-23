<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ProductSearchTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        // Criar categorias e marcas
        $this->category = Category::factory()->create(['name' => 'Eletrônicos']);
        $this->brand = Brand::factory()->create(['name' => 'Apple']);

        // Criar produtos
        Product::factory()->create([
            'name' => 'iPhone 13 Pro Max',
            'category_id' => $this->category->id,
            'brand_id' => $this->brand->id,
        ]);

        Product::factory()->create([
            'name' => 'Samsung Galaxy S22',
            'category_id' => $this->category->id,
            'brand_id' => Brand::factory()->create(['name' => 'Samsung'])->id,
        ]);

        Product::factory()->create([
            'name' => 'Notebook Dell',
            'category_id' => Category::factory()->create(['name' => 'Informática'])->id,
            'brand_id' => Brand::factory()->create(['name' => 'Dell'])->id,
        ]);
    }

    public function test_listagem_inicial_funciona()
    {
        Livewire::test('product-search')
            ->assertSee('iPhone 13 Pro Max')
            ->assertSee('Samsung Galaxy S22')
            ->assertSee('Notebook Dell');
    }

    public function test_busca_por_nome_parcial_funciona()
    {
        Livewire::test('product-search')
            ->set('search', 'iPhone Pro')
            ->assertSee('iPhone 13 Pro Max')
            ->assertDontSee('Samsung Galaxy S22');
    }

    public function test_filtro_por_categoria_funciona()
    {
        Livewire::test('product-search')
            ->set('selectedCategories', [$this->category->id])
            ->assertSee('iPhone 13 Pro Max')
            ->assertSee('Samsung Galaxy S22')
            ->assertDontSee('Notebook Dell');
    }

    public function test_filtro_por_marca_funciona()
    {
        Livewire::test('product-search')
            ->set('selectedBrands', [$this->brand->id])
            ->assertSee('iPhone 13 Pro Max')
            ->assertDontSee('Samsung Galaxy S22')
            ->assertDontSee('Notebook Dell');
    }

    public function test_combina_filtros_de_nome_categoria_marca()
    {
        Livewire::test('product-search')
            ->set('search', 'iPhone')
            ->set('selectedCategories', [$this->category->id])
            ->set('selectedBrands', [$this->brand->id])
            ->assertSee('iPhone 13 Pro Max')
            ->assertDontSee('Samsung Galaxy S22')
            ->assertDontSee('Notebook Dell');
    }

    public function test_limpar_filtros_reseta_todos_os_dados()
    {
        Livewire::test('product-search')
            ->set('search', 'iPhone')
            ->set('selectedCategories', [$this->category->id])
            ->call('resetFilters')
            ->assertSet('search', '')
            ->assertSet('selectedCategories', [])
            ->assertSet('selectedBrands', []);
    }
}
