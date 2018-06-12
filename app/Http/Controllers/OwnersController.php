<?php

namespace App\Http\Controllers;
use App\Owner;
use App\Yacht;
use Illuminate\Http\Request;

class OwnersController extends Controller
{
    public function index()
    {
        $owners = Owner::all();
        //$yachts = Yacht::find($id);
        return view('owner', compact('owners', 'yachts'));
    }
    public function store(Request $request) //добавление новых владельцев
    {
        $this->validate(request(),[
            'fullname'=>'required|min:2',
            'phone_number'=>'required|min:10'
        ]);
        $fullname = $request->fullname;
        $phone_number = $request->phone_number;
//        dump($request);

        Owner::create([
           'fullname'=>$fullname,
            'phone_number'=>$phone_number,
        ]);
        return redirect('/owner');
    }
    public function show($id)
    {
        $owner = Owner::find($id);
        return view('owner', compact('owner'));
    }
    public function edit()
    {

    }
    public function destroy($id)
    {
        Owner::destroy($id);
        return redirect('/owner');
    }
}
