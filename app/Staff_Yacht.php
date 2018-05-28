<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff_Yacht extends Model
{
    public $timestamps = false;
    public $incrementing = false;
    protected $table = 'staff_Yachts';
    protected $dates = ['date'];

    public function yachts()
    {
        //обратная связь к яхте
        return $this->belongsTo('Yacht');
    }
    public function staff()
    {
        //обратная связь к экипажу
        return $this->belongsTo('Staff');
    }
}
