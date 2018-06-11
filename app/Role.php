<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public static function isAdmin()
    {
        if($user = auth()->user())
        {
            if($user->role->display_name === 'Администратор')
                return true;
        }
        else
        {
            return false;
        }
    }

    public static function isClient()
    {
        if($user = auth()->user())
        {
            if($user->role->display_name === 'Клиент')
                return true;
        }
        else
        {
            return false;
        }
    }
}
