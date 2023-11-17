<x-app-layout>
    <h2>Item List</h2>

    <a href="{{ route('item.create') }}">New</a>
    <table>
        @foreach($items as $item)
        <tr>
            <td>
                <a href="{{ route('item.show', $item->id) }}">{{ $item->name }}</a>
            </td>
            <td>{{ $item->price }}円</td>
        </tr>
        @endforeach
    </table>
</x-app-layout>