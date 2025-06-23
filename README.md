# 🔍 Sistema de Busca Avançada com Laravel, Livewire e TailwindCSS

Este projeto implementa um sistema robusto de busca combinada de produtos utilizando **Laravel 12**, **Livewire**, **TailwindCSS** e **Vite**. É uma solução moderna e elegante para filtragem de dados dinâmicos, com foco em performance, UX e boas práticas.

---

## 🚀 Tecnologias Utilizadas

- [Laravel 12](https://laravel.com/)
- [Livewire 3](https://livewire.laravel.com/)
- [TailwindCSS](https://tailwindcss.com/)
- [Vite](https://vitejs.dev/)
- [Sail (Docker nativo do Laravel)](https://laravel.com/docs/12.x/sail)
- PHPUnit para testes automatizados

---

## ⚙️ Funcionalidades

- 🔍 Filtro por nome do produto (suporta múltiplas palavras)
- 🧠 Filtro combinável por categorias e marcas (multi-select)
- 🧼 Reset de filtros com botão dedicado
- 📄 Paginação integrada com Livewire
- 💡 UX responsiva com layout limpo e elegante em TailwindCSS
- ✅ Testes automatizados de comportamento da busca e filtros

---

## 📦 Instalação

### 1. Clone o repositório
```bash
git clone https://git@github.com:daandrade/product-search-advanced-laravel.git
cd laravel-livewire-filters

### 2. Configure o ambiente

cp .env.example .env
./vendor/bin/sail up -d
./vendor/bin/sail artisan key:generate

### 3. Instale dependências

./vendor/bin/sail npm install
./vendor/bin/sail npm run dev

### 4. Rode as migrations e seeds

./vendor/bin/sail artisan migrate --seed

🧪 Testes

./vendor/bin/sail artisan test --filter=ProductSearchTest


🧠 Conceitos aplicados
-Paginação reativa com WithPagination
-Query binding com wire:model e debounce
-Uso de queryString para manter filtros na URL
-Separação de lógica e apresentação via componentes Livewire
-Responsividade nativa com Tailwind

✨ Melhorias Futuras
-Ordenação por colunas
-Exportação de resultados (CSV/Excel)
-Filtros adicionais (preço, status, data de criação)
-Versão com Vue 3 + Inertia.js

🧑‍💻 Autor
Desenvolvido por Daniel Andrade
Profissional com foco em back-end PHP/Laravel, entusiasta de clean code, testes e arquitetura de sistemas escaláveis.


