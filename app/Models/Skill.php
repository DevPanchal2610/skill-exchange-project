<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Skill extends Model
{
    use HasFactory;

    protected $table = 'skills';
    protected $primaryKey = 'skill_id';
    protected $fillable = [
        'skill_name',
        'description',
        'user_id',
        'skill_image',
        'isactive',
        'skill_category'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function skillAssignments()
    {
        return $this->hasMany(SkillAssign::class, 'skill_id');
    }

    public function userSkillAssignments()
    {
        return $this->hasMany(SkillAssign::class, 'user_skill_id');
    }
}
