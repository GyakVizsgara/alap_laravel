<?php

namespace App\Http\Controllers;

use App\Models\Bejegyzesek;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BejegyzesekController extends Controller
{
    public function index(Request $request)

    {
        $leker = DB::table('bejegyzeseks')
            ->join('tevekenysegs', 'tevekenysegs.tevekenyseg_id', '=', 'bejegyzeseks.tevekenyseg_id')
            ->get();
        return $leker;
    }

    public function szures(Request $request){
        /* $pontszam = $request->query('q', ''); */

        /* $pontszam = Bejegyzesek::where('pontszam', "%$pontszam%") */
        $pontszam = DB::table('bejegyzeseks')
        ->join('tevekenysegs', 'tevekenysegs.tevekenyseg_id', '=', 'bejegyzeseks.tevekenyseg_id');
           
        $sort = $request->query('desc', '');
        $a = '';
        if ($sort == "") {
            return $pontszam->get();
        } else if ($sort == "RendezNo") {
            $a = 'ASC';
        } else if ($sort == "RendezCsokken") {
            $a = 'DESC';
        }
        return $pontszam->orderBy('pontszam', $a)->get();

    }





    //        return Bejegyzesek::all();

    public function store(Request $request)

    {
        $request->validate([
            'osztaly_id' => 'required',
            'tevekenyseg_id' => 'required'
        ]);
        $bejegyzes = new Bejegyzesek();
        $bejegyzes->osztaly_id = $request->osztaly_id;
        $bejegyzes->tevekenyseg_id = $request->tevekenyseg_id;
        $bejegyzes->allapot = true;
        $bejegyzes->save();

        return response()->json(true);
        /* if ($res) {
            return back()->with('sikeres', 'Bejegyzés rögzítve');
        } */
        //return Bejegyzesek::create($request->all());

        // $request->validate([]);
        //return Bejegyzesek::create($request->all());
    }
}
