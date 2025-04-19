<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    use HasFactory;
    protected $table='cities';
    protected $primaryKey='city_id';

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'city_id');
    }
}
