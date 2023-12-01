<?php
// namespace（名前空間）：packageみたいなもの
namespace App\Http\Controllers;

// プログラムの読み込み：importみたいなもの
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function about()
    {
        return view('about');
    }

    function search(Request $request)
    {
        //連想配列データ
        $data = [
            'keyword' => $request->q
        ];
        // Viewファイルにデータを渡す
        return view('search', $data);
    }
}
