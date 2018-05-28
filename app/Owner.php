<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    public $timestamps = false;
    protected $fillable = ['fullname', 'phone_number'];
    protected $table = 'owners';

    public function yachts()
    {
        //связь к яхтам
        return $this->hasMany(Yacht::class, 'owner_id');
    }
}
