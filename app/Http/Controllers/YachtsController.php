<?php

namespace App\Http\Controllers;
use App\Yacht;
use Illuminate\Http\Request;

class YachtsController extends Controller
{
    public function index()
    {
        $yachts = Yacht::all();
        return view('yachts.index', compact('yachts'));
    }
    public function show($id)
    {
        $yachts = Yacht::find($id);
        return $yachts;
        return view('yachts.show', compact($yachts));
    }
}
