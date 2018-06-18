<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Yacht extends Model
{
    protected $table = 'yachts';
    public $timestamps = false;
    public $fillable = ['model', 'mark', 'flag', 'portofregistry',
                        'type', 'displacement', 'price', 'status', 'images','owner_id'];
    public $guarded = ['created_at','updated_at'];

//    public function scopeFilter($query, $filters)
//    {
//        if ($type = $filters['type'])
//        {
//            $query->where('type', '=', $type);
//        }
//    }
    public function staff_yachts()
    {
        //связь с экипажем через таблицу staff_yachts
        return $this->hasMany('Staff_Yacht', 'yacht_id');
    }

}
