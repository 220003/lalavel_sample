<x-app-layout>
    <div class="w-full max-auto">

        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="mb-4 text-2xl font-extrabold leading-none tracking-tight text-gray-900 dark:text-white">Item List</h2>

            <div class="mb-3">
                <form action="{{ route('item.index') }}" method="get">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">{{__('messages.item_name')}}</label>
                    <input type="text" name="item_name" value="{{ $item_name }}" class="border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <button class="bg-blue-500 text-sm text-white py-1 px-4 rounded focus:outline-none focus:shadow-outline">{{__('messages.search')}}</button>
                    <a href="{{ route('item.index') }}" class="bg-white text-blue-500 font-bold py-2 px-4 rounded">{{__('messages.clear')}}</a>
                </form>
            </div>

            <div class="m-5">
                <a href="{{ route('item.create') }}" class="bg-white text-blue-500 border py-2 px-4 rounded">{{ __('messages.new') }}</a>
            </div>
            <table class="text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <th scope="col" class="px-6 py-3">
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('messages.item_name') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('messages.price') }}
                        <a href="{{ 
                            route('item.index', 
                            [ 
                                'order_column' => 'price',
                                'order_value' => 'desc',
                                'item_name' => $item_name,
                            ])
                        }}">▼</a>
                        <a href="{{ 
                            route('item.index', 
                            [ 
                                'order_column' => 'price',
                                'order_value' => 'asc',
                                'item_name' => $item_name,
                            ])
                        }}">▲</a>
                    </th>
                </thead>
                <tbody>
                    <!-- 繰り返し表示 -->
                    @foreach($items as $item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">
                            <a href="{{ route('item.edit', $item->id) }}" class="bg-white text-blue-500 border py-2 px-4 round">{{ __('messages.edit') }}</a>
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('item.show', $item->id) }}">{{ $item->name }}</a>
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->price }}円
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>