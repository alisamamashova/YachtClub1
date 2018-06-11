<?php

namespace App\Http\Controllers;
use App\Yacht;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Input;

class YachtsController extends Controller
{
    public function index(Request $request)
    {
        //фильтр цене

        $yachts = Yacht::where(function($query) {
            $minPrice = Input::has('minPrice') ? Input::get('minPrice') : null;
            $maxPrice = Input::has('maxPrice') ? Input::get('maxPrice') : null;
            dump($minPrice);//для картинки
            if (isset($minPrice) && isset($maxPrice)) {
                $query ->whereBetween('price', [$minPrice, $maxPrice]);
            }

        })->get();

        //фильтр по типам яхт
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
        return view('showyacht', compact('yacht'));
    }
    public function store(Request $request) //добавление новых яхт
    {
        $mark=$request->mark;
        $model=$request->model;
        $flag=$request->flag;
        $portofregistry=$request->portofregistry;
        $type=$request->type;
        $displacement=$request->displacement;
        $price=$request->price;
        $status=$request->status;
        $owner_id=$request->owner_id;

        Yacht::create([
           /*'mark'=>$request->('mark'),
            'model'=>$request->('model'),
            'flag'=>$request->('flag'),
            'portofregistry'=>$request->('portofregistry'),
            'type'=>$request->('type'),
            'displacement'=>$request->('displacement'),
            'price'=>$request->('price'),
            'status'=>$request->('status'),
            'owner_id'=>$request->('owner_id')*/
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
    }
    public function edit()
    {

    }
    public function destroy()
    {

    }
}
