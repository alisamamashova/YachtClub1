<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public $timestamps = false;
    protected $table = 'clients';
    protected $fillable = ['fullname', 'passport', 'phone_number'];

    public function rents()
    {
        //связь к аренде
        return $this->hasMany(Rent::class, 'rent_id');
    }
}