<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    public $timestamps = false;
    public $incrementing = false;
    protected $table = 'rents';
    protected $dates = ['date'];

    public function clients()
    {
        //обратная связь к клиентам
        return $this->belongsTo(Client::class);
    }
}
