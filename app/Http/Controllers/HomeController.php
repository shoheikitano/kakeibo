<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index() {

      $user = Auth::user();

      $day = $user->days()->first();

      if(is_null($day)) {
        return view('home');
      }

      return redirect()->route('shushies.index', [
        'id' => $day->id,
      ]);
    }
}
