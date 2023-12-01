<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2>商品編集</h2>
                    <form action="{{ route('item.update', $item->id) }}" method="post">
                        @csrf

                        <div>
                            <label for="item_name">商品名</label>
                            <input type="text" name="name" value="{{ $item->name }}">
                        </div>
                        <div>
                            <label for="item_price">価格</label>
                            <input type="text" name="price" value="{{ $item->price }}">
                        </div>
                        <button>更新</button>
                    </form>
                    <a href="{{ route('item.index') }}">戻る</a>

                    <form action="{{ route('item.destroy', $item->id) }}" method="post">
                        @csrf
                        <button>削除</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>