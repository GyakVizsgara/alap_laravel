<?php

namespace App\Http\Controllers;
use App\Models\Bejegyzesek;

use Illuminate\Http\Request;

class BejegyzesFelvitelController extends Controller
{
    public function bejegyFel(Request $request)

    {
        $request->validate([
            'osztaly_id' => 'required',
            'tevekenyseg_id' => 'required'
        ]);
        $bejegyzes = new Bejegyzesek();
        $bejegyzes -> osztaly_id -> $request ->osztaly_id;
        $bejegyzes -> tevekenyseg_id -> $request ->tevekenyseg_id;
        $res = $bejegyzes->save();

        if($res){
            return back()->with('sikeres', 'Bejegyzés rögzítve');
        }


        //return Bejegyzesek::create($request->all());

    }
}
