<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyPageController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('mypage', [
            'user' => $request->user(),
        ]);
    }
}
