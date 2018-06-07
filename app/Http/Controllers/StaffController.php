<?php

namespace App\Http\Controllers;
use App\Staff;
use App\Staff_Yacht;
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

        $staff = Staff::create([
            'fullname' => $fullname,
            'sex' => $sex,
            'passport' => $passport,
            'databirth' => $databirth
        ]);

        Staff_Yacht::create([
            'staff_id' => $staff->id,
            'position1' => $position1,
            'salary' => $salary,
            'start_work' => $start_work,
            'finish_work' => $finish_work,
            'yacht_id' => $yacht_id
        ]);
        return redirect('/staff');
    }
    public function show($id) //вывод информации по каждому члену экипажа
    {
        $staff = Staff::find($id);
        return view('staff', compact('staff'));
    }
    public function edit(Request $request)
    {
        $id = $request->id;
        $sy = Staff_Yacht::where('staff_id', '=', $id)->first();
//        dd($sy);
        $sy->yacht_id = $request->yacht_id;
        $sy->start_work = $request->start_work;
        $sy->finish_work = $request->finish_work;
        $sy->position1 = $request->position1;
        $sy->salary = $request->salary;
        $sy->save();
        return redirect('/staff');
    }

    public function update()
    {
    }
    public function destroy($id)
    {
        Staff::destroy($id);
//        Staff_Yacht::destroy($id);
        return redirect('/staff');
    }
}
