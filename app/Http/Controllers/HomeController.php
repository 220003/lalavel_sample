<?php
//namespace(名前空間)　packageみたいなもの
namespace App\Http\Controllers;
//プログラムの読み込み　importみたいなもの
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function about(){
        return view('about');
    }

    function search(Request $request){
        //dd($request);//デバッグ
    // $keyword = $request ->q;//ほかの言語では.だがphpでは->
    // $message = "キーワードは{$keyword}です";
    
    //連想配列データ
    $data=[
        'keyword' => $request->q
    ];
    return view('search',$data);//データの受け渡し
    }
}