<!DOCTYPE html>
<html lang="pt-BR" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Busca de Produtos</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <!-- Favicon -->
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🔍</text></svg>">
</head>
<body class="bg-gradient-to-tr from-slate-100 via-white to-slate-200 min-h-screen font-sans antialiased text-gray-800">

    <div class="container max-w-6xl mx-auto px-4 py-10">
        
        <!-- Header -->
        <header class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                Sistema de Busca Avançada
            </h1>
            <p class="mt-4 text-lg text-gray-600">
                Refine sua busca por <span class="font-medium text-indigo-700">nome</span>, <span class="font-medium text-indigo-700">categoria</span> e <span class="font-medium text-indigo-700">marca</span> com facilidade e elegância.
            </p>
        </header>

        <!-- Conteúdo do Componente Livewire -->
        <main class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl p-6 ring-1 ring-gray-200">
            @livewire('product-search')
        </main>

        <!-- Rodapé -->
        <footer class="mt-10 text-center text-sm text-gray-500">
            <p>© {{ date('Y') }} Sistema de Produtos • Desenvolvido com <span class="text-pink-500">❤</span> em Laravel</p>
        </footer>
    </div>

    @livewireScripts
</body>
</html>
