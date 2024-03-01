<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;

class MyPageController extends Controller
{
    public function __invoke(Request $request)
    {
        $records = Record::where('user_id', $request->user()->id)
            ->latest()
            ->with('product')
            ->get();

        return view('mypage', [
            'user' => $request->user(),
            'records' => $records,
        ]);
    }
}
