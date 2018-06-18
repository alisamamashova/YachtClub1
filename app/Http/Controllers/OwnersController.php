<?php

namespace App\Http\Controllers;
use App\Owner;
use App\Yacht;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OwnersController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }
    public function index()
    {
        $owners = Owner::all();
        //$yachts = Yacht::find($id);
        return view('owner', compact('owners'));
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
        session()->flash('message','Владелец успешно добавлен');

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
    public function addYacht(Request $request) {
        $this->validate(request(), [
            'mark'=>'required',
            'model'=>'required',
            'flag'=>'required',
            'portofregistry'=>'required', 'type'=>'required', 'displacement'=>'required',
            'price'=>'required|max:4'
        ]);
        $mark=$request->mark;
        $model=$request->model;
        $flag=$request->flag;
        $portofregistry=$request->portofregistry;
        $type=$request->type;
        $displacement=$request->displacement;
        $price=$request->price;
        $status=$request->status;
        $owner_id=$request->owner_id;

//        dd($owner_id);

        $yacht = Yacht::create([
            'mark'=>$mark,
            'model'=>$model,
            'flag'=>$flag,
            'portofregistry'=>$portofregistry,
            'type'=>$type,
            'displacement'=>$displacement,
            'price'=>$price,
            'status'=>$status,
            'owner_id'=>$owner_id
        ]);

//        dd($yacht);
        return redirect('ownerPage');
    }
    public function myPage()
    {
//        dd(Auth::user()->id);
        $yachts = Yacht::where('owner_id', '=',   Auth::user()->id)->get();
        return view('ownerPage', compact('yachts'));
    }
    public function destroy($id)
    {
        Owner::destroy($id);
        return redirect('/owner');
    }
}
