<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Bem-vindo à Nossa Loja Virtual') }}
        </h2>
    </x-slot>

    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-blue-500 to-purple-600 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-4">Descubra Produtos Incríveis</h1>
            <p class="text-xl md:text-2xl mb-8">A melhor seleção de produtos para você</p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="#products" class="bg-white text-blue-600 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition">Ver Produtos</a>
                @guest
                    <a href="{{ route('login') }}" class="bg-transparent border border-white text-white px-8 py-3 rounded-full font-semibold hover:bg-white/10 transition">Entrar</a>
                    <a href="{{ route('register') }}" class="bg-white text-blue-600 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition">Registrar</a>
                @endguest
            </div>
        </div>
    </div>

    <!-- Products Section -->
    <div id="products" class="py-12 bg-gray-50 dark:bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center mb-8 text-gray-900 dark:text-gray-100">Nossos Produtos</h2>

            <!-- Filter Section -->
            <div class="mb-8 flex justify-center">
                <form method="GET" action="{{ url('/') }}" class="flex items-center space-x-4">
                    <label for="type_id" class="text-gray-700 dark:text-gray-300 font-medium">Filtrar por Tipo:</label>
                    <select name="type_id" id="type_id" onchange="this.form.submit()" class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Todos</option>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}" {{ request('type_id') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                        @endforeach
                    </select>
                </form>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($products as $product)
                    <div class="bg-white dark:bg-gray-700 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-200 dark:bg-gray-600 flex items-center justify-center">
                                <span class="text-gray-500">Sem Imagem</span>
                            </div>
                        @endif
                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-2 text-gray-900 dark:text-gray-100">{{ $product->name }}</h3>
                            <p class="text-gray-600 dark:text-gray-300 mb-4">{{ Str::limit($product->description, 100) }}</p>
                            <div class="flex justify-between items-center">
                                <span class="text-2xl font-bold text-green-600">R$ {{ number_format($product->price, 2, ',', '.') }}</span>
                                <span class="text-sm text-gray-500">Qtd: {{ $product->quantity }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @if($products->isEmpty())
                <p class="text-center text-gray-500 dark:text-gray-400">Nenhum produto disponível no momento.</p>
            @endif
        </div>
    </div>
</x-app-layout>