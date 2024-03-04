<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function destroy(Request $request){
        //마이페이지에서 구매기록 삭제를 진행
        $record = Record::find($request->record);

        $record->delete();

        return redirect()->route('mypage');
    }
}
