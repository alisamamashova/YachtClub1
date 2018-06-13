<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store()
    {
        $email = request('email');
        $pwdHash = hash('md5', request('password'));
        $password = request('password');

        $user = User::where('email', $email)
            ->where('password', $pwdHash)
            ->first();

//        echo $pwdHash;
//        echo $email;
//        dd($user);

        if($user)
        {
            Auth::login($user);
        }
        else
        {
            session()->flash('messageError', 'Неудачная попытка авторизации');
            return back()->withErrors([
                'message' => 'Пожалуйста, убедитесь в корректности введенных данных'
            ]);
        }

//        dd();
        DB::disconnect('pgsql');
        $user = DB::connection('pgsqlAuth')
            ->select("
							select users.email, users.password, users.role
							from users
							where email = '$email' AND password = '$pwdHash'");

//        echo
//        dd($user);
        if($user)
        {
//            dd(Config::get('database.connections.pgsql.username'));
//            dd(config(['database.connections.pgsql.username']));
//            var_dump($user);
//            var_dump($user[0]->role);
//            Config::set('database.connections.pgsql.username',$user[0]->role);


            switch ($user[0]->role)
            {
                case 'Владелец':
                    Config::set('database.connections.pgsql.username','owner');
                    Config::set('database.connections.pgsql.password', env('DB_ROLE_OWNER_PASSWORD'));
//                    config(['database.connections.pgsql.password' => env('DB_ROLE_OWNER_PASSWORD')]);
                    break;
                case 'Администратор':
                    Config::set('database.connections.pgsql.username','admin');
                    Config::set('database.connections.pgsql.password',  env('DB_ROLE_ADMINPASSWORD'));
//                    config(['database.connections.pgsql.password' => env('DB_ROLE_ADMIN_PASSWORD')]);
                    break;

                default:
                    break;
            }
        }

//        dd(Config::get('database.connections.pgsql.password'));
        DB::reconnect('pgsql');

//        dd($user);
        Session::flash('message', 'Успешная авторизация!');
//        Session::flash('alert-class', 'alert-danger');
        if($user[0]->role === 'Владелец')
            return redirect('/ownerPage');
        else
            return redirect('/staff');
    }
    public function destroy()
    {
        auth()->logout();
        return redirect('/login');
    }
}
