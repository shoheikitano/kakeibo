<?php

namespace App\Http\Controllers;

use App\Day;
use App\Shushi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShushiController extends Controller
{
    //
    public function index(int $id)
    {
        $sum = 0;
        $total = 0;

        $days = Auth::user()->days()->get();

        $current_day = Day::find($id);

        $shushis = $current_day->shushis()->get();

        foreach($shushis as $shushi) {
          $sum = $sum + $shushi->money;
        }

        foreach($days as $day) {
          $total = $total + $day->sum;
        }


        return view('shushies/index', [
            'days' => $days,
            'current_day_id' => $current_day->id,
            'shushis' => $shushis,
            'sum' => $sum,
            'total' => $total,
        ]);
    }

    public function showCreateForm(int $id)
    {
        return view('shushies/create', [
            'day_id' => $id
        ]);
    }

    public function create(int $id, Request $request)
    {
        $current_day = Day::find($id);

        $shushi = new Shushi();
        $shushi->title = $request->title;
        $shushi->money = $request->money;
        $current_day->sum += $shushi->money;

        $current_day->shushis()->save($shushi);
        $current_day->save();

        return redirect()->route('shushies.index', [
            'id' => $current_day->id,
        ]);
    }

    public function showEditForm(int $id, int $shushi_id)
    {
        $shushi = Shushi::find($shushi_id);

        return view('shushies/edit', [
            'shushi' => $shushi,
        ]);
    }

    public function edit(int $id, int $shushi_id, Request $request)
    {
        // 1
        $shushi = Shushi::find($shushi_id);

        // 2
        $shushi->title = $request->title;
        $shushi->money = $request->money;
        $shushi->save();

        // 3
        return redirect()->route('shushies.index', [
            'id' => $shushi->day_id,
        ]);
    }
}
