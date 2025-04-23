<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailVerification extends Model
{
    public $timestamps = false;
    protected $fillable = ['token', 'data', 'created_at'];
}
