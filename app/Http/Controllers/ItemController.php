<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $order_column = ($request->order_column) ? $request->order_column : 'id';
        $order_value = ($request->order_value) ? $request->order_value : 'asc';
        if ($item_name = $request->item_name) {
            //SELECT * FROM items WHERE name LIKE '%xxxx%' ORDER BY XXX;
            $items = Item::where('name', 'LIKE', "%{$item_name}%")
                ->orderBy($order_column, $order_value)
                ->get();
        } else {
            //SELECT * FROM items; 
            $items = Item::orderBy($order_column, $order_value)->get();
        }

        $data = [
            'items' => $items,
            'item_name' => $item_name,
        ];
        // resources/views/item/index.blade.php に受け渡して表示
        return view('item.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ItemRequest $request)
    {
        // dd($request);
        // dd($request->all());
        //Requestからデータを取得
        $data = $request->all();
       
        //データベースに保存
        // INSERT INTO items (name, price) VALUES (xxxx, xxxx);
        Item::create($data);
        //リダイレクト
        return redirect(route('item.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        // $items[1] = "コーヒー";
        // $items[2] = "紅茶";
        // $items[3] = "ほうじ茶";
        $items = [
            1 => 'コーヒー',
            2 => '紅茶',
            3 => 'ほうじ茶',
        ];
        $item = "";
        if ($id > 0 && in_array($id, array_keys($items))) {
            $item = $items[$id];
        }
        // ビューに受け渡すデータ生成
        $data = ['item' => $item];

        // reources/views/item/show.blade.php を表示
        // データを受け渡す
        return view('item.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        //商品IDから商品データを取得
        // SELECT * FROM items WHERE id = xx;
        $item = Item::find($id);
        $data['item'] = $item;
        //編集画面を表示
        return view('item.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ItemRequest $request, int $id)
    {
        $data = $request->all();
        // dd($data);
        // UPDATE items SET price = xxx WHERE id = xx;
        // 1.
        // unset($data['_token']);
        // Item::where('id', $id)->update($data);
        //Query Builder
        DB::table('items')->where('id', $id)->update($data);
        // 2.
        // SELECT * FROM items WHERE id = xx;
        // UPDATE items SET price = xxx WHERE id = xx;
        // Item::find($id)->fill($data)->save();

        //リダイレクト
        return redirect(route('item.edit', $id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        // DELETE FROM items WHERE id = xx;
        Item::destroy($id);
        // 一覧画面にリダイレクト
        return redirect(route('item.index'));
    }
}
