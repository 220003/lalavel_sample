<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2>商品一覧</h2>
                    <a href="{{ route('item.create') }}">新規追加</a>
                    <table class="tabel">
                        <tr>
                            <th></th>
                            <th>商品名</th>
                            <th>価格</th>
                        </tr>
                        @foreach($items as $item)
                        <tr>
                            <td><a href="{{ route('item.edit', $item->id) }}">編集</a></td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->price }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>