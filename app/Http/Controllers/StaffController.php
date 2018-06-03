<?php

namespace App\Http\Controllers;
use App\Staff;
use Illuminate\Support\Facades\DB;
//use App\Staff_Yacht;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $perPage = 20;
        //$staff = Staff::orderBy('id')->paginate($perPage);
        $staff_name = DB::select('select distinct fullname from staff_yacht()'); //Вывод фио из процедуры
        $staff = DB::select('select * from staff_yacht()'); //Запрос в хранимую процедуру staff_yacht вывод всего
        return view('staff', compact('staff', 'staff_name'));
    }
    public function store(Request $request) //добавление новых моряков
    {
        $fullname = $request->fullname;
        $sex = $request->sex;
        $passport = $request->passport;
        $databirth = $request->databirth;
        $position1 = $request->position1;
        $salary = $request->salary;
        $start_work = $request->start_work;
        $finish_work = $request->finish_work;
        $yacht_id = $request->yacht_id;

        Staff::create([
            'fullname' => $fullname,
            'sex' => $sex,
            'passport' => $passport,
            'databirth' => $databirth,
            'position1' => $position1,
            'salary' => $salary,
            'start_work' => $start_work,
            'finish_work' => $finish_work,
            'yacht_id' => $yacht_id
        ]);
    }
    public function show($id) //вывод информации по каждому члену экипажа
    {
        $staff = Staff::find($id);
        return view('staff', compact('staff'));
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
