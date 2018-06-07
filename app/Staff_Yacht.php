<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff_Yacht extends Model
{
    public $timestamps = false;
    public $incrementing = false;
    public $primaryKey = "staff_id";
    protected $table = 'staff_Yachts';
    protected $dates = ['date'];
    public $fillable = ['position1', 'salary', 'start_work', 'finish_work', 'yacht_id', 'staff_id'];

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
