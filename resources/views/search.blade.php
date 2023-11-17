<x-app-layout>
    <h2>Search</h2>
    <form action="/search" method="get">
        <input type="text" name="q" value="{{ $keyword }}">
        <button>Search</button>
    </form>
    <h3>{{ $keyword }}の検索結果</h3>
    <div>
        .....
    </div>
</x-app-layout>