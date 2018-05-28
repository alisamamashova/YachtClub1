<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Yacht extends Model
{
    protected $table = 'yachts';
    public $timestamps = 'false';
    public $fillable = ['model', 'mark', 'flag', 'portofregistry',
                        'type', 'displacement', 'price', 'status', ];
    public function staff_yachts()
    {
        //связь с экипажем через таблицу staff_yachts
        return $this->hasMany('Staff_Yacht', 'yacht_id');
    }

}
