<?php

namespace App\Http\Controllers;
use App\Rent;
use Illuminate\Http\Request;

class RentsController extends Controller
{
    public function index()
    {
        $rents = Rent::all();
        return view('rents', compact('rents'));
    }
    public function show($id)
    {
        $rents = Rent::find($id);
//        $rents = DB::select('Select R.client_id, count (*) as Rent_amount
//                                  FROM rents AS R
//                                  GROUP BY client_id
//                                  Order by R.client_id');//запрос к бд для подсчета кол-ва договором по каждому клиенту
        return view('/rents');
    }

}

