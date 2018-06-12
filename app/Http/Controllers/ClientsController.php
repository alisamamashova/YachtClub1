<?php

namespace App\Http\Controllers;
use App\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        $clients_name = DB::select('select distinct fullname from rent_client()'); //Вывод фио из процедуры
        $clients = DB::select('select * from staff_yacht()'); //Запрос в хранимую процедуру staff_yacht вывод всего

        return view('client', compact('clients', 'clients_name'));
    }
    public function store(Request $request, $client_id)
    {
//        $this->validate(request()[
//        'fullname'=>'required|min:2',
//        'passport'=>'required|min:6',
//        'phone_number'=>'required'
//            ]);
        $fullname = $request->fullname;
        $passport = $request->passport;
        $phone_number = $request->phone_number;
        $rent_start = $request->rent_start;
        $rent_finish = $request->rent_finish;
        $paymentmethod = $request->paymentmethod;

        $client = Client::create ([
            'fullname'=>$fullname,
            'passport'=>$passport,
            'phone_number'=>$phone_number
            ]);
        Rent::create([
            'client_id'=>$client_id,
            'rent_start'=>$rent_start,
            'rent_finish'=>$rent_finish,
            'paymentmethod'=>$paymentmethod
        ]);

    }
    public function show($id)
    {
        $clients=Client::find($id);
//        $clients = DB::select('﻿Select R.client_id, count (*) as Rent_amount
//                                    FROM rents AS R
//                                    GROUP BY client_id
//                                    Order by R.client_id');//запрос к бд для подсчета кол-ва договором по каждому клиенту
    return view('/client');
    }
}
