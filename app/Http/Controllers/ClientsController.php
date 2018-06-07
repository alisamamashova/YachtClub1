<?php

namespace App\Http\Controllers;
use App\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index()
    {
        $clients = Client::all();

        return view('client', compact('clients'));
    }
    public function store()
    {

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
