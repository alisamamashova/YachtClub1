<?php

namespace App\Http\Controllers;
use App\Client;
use App\Rent;
use Illuminate\Http\Request;

class RentsController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }
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
    public function store(Request $request)
    {
        $client = Client::create([
            'fullname' => $request->fullname,
            'phone_number' => $request->phone_number,
            'passport' => $request->passport,
        ]);
        $rent = Rent::create([
            'rent_start' => $request->rent_start,
            'client_id' => Client::all()->last()->id,
        'rent_finish' => $request->rent_finish,
            'yacht_id' => $request->yacht_id,
            'paymentmethod' => $request->paymentmethod
        ]);

        return redirect('/');
    }

}

