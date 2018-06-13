<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Staff;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Owner;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'name' => 'required|min:2',
//            'surname' => 'required|min:2',
//            'phone' => 'required|min:10'
        ]);

        $email = request('email');
        $pwdHash = hash('md5', request('password'));

        $user = User::create([
            'email' => $email,
            'password' => $pwdHash,
            'role' => 'Владелец'
        ]);

        //Running as host
//        config(['database.connections.pgsqlAuth.username' => env('DB_USERNAME_SEC')]);
//        config(['database.connections.pgsqlAuth.password' => env('DB_PASSWORD_SEC')]);

        // Add a user to the second database
        DB::connection('pgsqlAuth')
            ->select("INSERT INTO users(email, password, role)
			VALUES 
			('$email','$pwdHash','Владелец')");

        $owner =Owner::create([
            'id' => User::all()->last()->id,
            'fullname' => request('name'),
            'phone_number' => request('phone')
        ]);

//        dd($owner);

        return redirect('/dashboard');
    }


}