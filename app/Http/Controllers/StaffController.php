<?php

namespace App\Http\Controllers;
use App\Staff;
use App\Staff_Yacht;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $perPage = 20;
        $staff = DB::select
        $staff = Staff::orderBy('id')->paginate($perPage);
        return view('staff', compact('staff'));
    }
    public function create()
    {
        //
    }
    public function store()
    {
            $staff = Staff::create( [
                'fullname'   => request( 'fullname' ),
                'passport' => request( 'passport' ),
                'sex' => request('sex'),
                'databirth'   => request( 'databirth' )
            ]);
            $staffYacht= Staff_Yacht::create ([
                'position' => request('position'),
                'salary' => request('salary'),
                'start_work' => request('start_work'),
                'finish_work' => request('finish_work'),
                'yacht_id' => request('yacht_id')
                ]);
    }
    public function show() //вывод информации по каждому члену экипажа
    {

    }
    public function edit()
    {

    }
    public function update()
    {

    }
    public function destroy()
    {

    }
}
