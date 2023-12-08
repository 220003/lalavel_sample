<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @include('components.error')
                <div class="p-6 text-gray-900">
                    <h2>商品編集</h2>
                    <form action="{{ route('item.update', $item->id) }}" method="post">
                        @csrf

                        <div>
                            <label for="item_name">{{__('messages.item_name')}}</label>
                            <input type="text" name="name" value="{{ $item->name }}">
                        </div>
                        <div>
                            <label for="item_price">{{ __('messages.price') }}</label>
                            <input type="text" name="price" value="{{ $item->price }}">
                        </div>
                        <button>{{ __('messages.update') }}</button>
                    </form>
                    <a href="{{ route('item.index') }}">{{ __('messages.back') }}</a>

                    <form action="{{ route('item.destroy', $item->id) }}" method="post">
                        @csrf
                        <button>{{ __('messages.delete') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>