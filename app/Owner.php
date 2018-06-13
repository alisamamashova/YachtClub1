<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    public $timestamps = false;
    public $incrementing = false;
    public $primaryKey = "id";
    protected $fillable = ['id','fullname', 'phone_number'];
    protected $table = 'owners';

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
    public function yachts()
    {
        //связь к яхтам
        return $this->hasMany(Yacht::class, 'owner_id');
    }
}
