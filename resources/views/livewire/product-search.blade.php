<div class="max-w-6xl mx-auto px-4 py-10">
    <!-- Título -->
    <div class="text-center mb-10">
        <h1 class="text-4xl font-extrabold text-gray-800 tracking-tight sm:text-5xl">
            <span class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 to-purple-600">
                Sistema de Busca Avançada
            </span>
        </h1>
        <p class="mt-2 text-lg text-gray-600">Filtre produtos por nome, categoria e marca com facilidade</p>
    </div>

    <!-- Filtros -->
    <section class="bg-white shadow-xl rounded-2xl p-8 ring-1 ring-gray-100 mb-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Nome -->
            <div>
                <label for="search" class="block text-sm font-semibold text-gray-700 mb-1">Nome do Produto</label>
                <input type="text" id="search" wire:model.debounce.500ms="search"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out"
                    placeholder="Buscar por nome...">
            </div>

            <!-- Categorias -->
            <div>
                <label for="categories" class="block text-sm font-semibold text-gray-700 mb-1">Categorias</label>
                <select id="categories" multiple wire:model="selectedCategories"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 h-32">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Marcas -->
            <div>
                <label for="brands" class="block text-sm font-semibold text-gray-700 mb-1">Marcas</label>
                <select id="brands" multiple wire:model="selectedBrands"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 h-32">
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Limpar filtros -->
        <div class="mt-6 text-right">
            <button wire:click="resetFilters"
                class="inline-flex items-center px-4 py-2 bg-indigo-100 text-indigo-800 font-semibold rounded-md hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
                Limpar Filtros
            </button>
        </div>
    </section>

    <!-- Tabela de resultados -->
    <section class="bg-white shadow-md rounded-xl overflow-hidden ring-1 ring-gray-100">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Nome</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Categoria</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Marca</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                @forelse ($products as $product)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $product->category->name ?? '-' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $product->brand->name ?? '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-4 text-center text-sm text-gray-500">
                            Nenhum produto encontrado.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </section>

    <!-- Paginação -->
    <div class="mt-8">
        {{ $products->links() }}
    </div>
</div>
