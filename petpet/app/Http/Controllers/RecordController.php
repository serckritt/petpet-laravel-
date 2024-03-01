<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function destroy(Request $request){

        $record = Record::find($request->record);

        $record->delete();

        return redirect()->route('mypage');
    }
}
