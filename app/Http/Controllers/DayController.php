<?php

namespace App\Http\Controllers;

use App\Day;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DayController extends Controller
{
    //
    public function showCreateForm()
    {
      return view('days/create');
    }

    public function create(Request $request)
    {
        // フォルダモデルのインスタンスを作成する
        $day = new Day();
        // タイトルに入力値を代入する
        $day->due_date = $request->due_date;
        // インスタンスの状態をデータベースに書き込む
        Auth::user()->days()->save($day);

        return redirect()->route('shushies.index', [
            'id' => $day->id,
        ]);
    }
}
