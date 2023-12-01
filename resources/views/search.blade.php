<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2>検索</h2>
                    <form action="/search" method="get">
                        <input type="text" name="q">
                        <button>Search</button>
                    </form>
                    <h3>検索キーワード</h3>
                    <p>{{ $keyword }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>