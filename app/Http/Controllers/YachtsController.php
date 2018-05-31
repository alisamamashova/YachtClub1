<?php

namespace App\Http\Controllers;
use App\Yacht;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class YachtsController extends Controller
{
    public function index()
    {
        $yachts = Yacht::all();
        //фильтр типа яхт
        if($type = request('type'))
        {
            $yachts = $yachts->where('type', '=', $type);
        }

        $types = DB::select('select distinct type from yachts');
        return view('yacht', compact('yachts','types'));
    }

    public function show($id)
    {
        $yacht = Yacht::find($id);
       // return $yachts;
        return view('show', compact('yacht'));
    }
}
