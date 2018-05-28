<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'Staff';
    public $timestamps = 'false';
    public $fillable = ['fullname', 'passport', 'dataofbirth', 'sex'];

    public function staff_yachts()
    {
        return $this->hasMany('Staff_Yacht', 'staff_id');
    }
}
