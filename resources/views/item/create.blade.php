<x-app-layout>
    <div class="py-12">
        @include('components.error')
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2>商品追加</h2>
                    <form action="{{ route('item.store') }}" method="post">
                        @csrf

                        <div>
                            <label for="item_name">{{__('messages.item_name')}}</label>
                            <input type="text" name="name" value="{{ old('name') }}">
                        </div>
                        <div>
                            <label for="item_price">{{ __('messages.price') }}</label>
                            <input type="text" name="price" value="{{ old('price') }}">
                        </div>
                        <button>{{ __('messages.update') }}</button>
                    </form>
                    <a href="{{ route('item.index') }}">{{ __('messages.back') }}</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>