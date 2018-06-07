<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staff';
    public $timestamps = false;
    public $fillable = ['staff_id','fullname', 'passport', 'dataofbirth', 'sex'];

    public function staff_yachts()
    {
        return $this->hasMany('Staff_Yacht', 'staff_id');
    }
}
