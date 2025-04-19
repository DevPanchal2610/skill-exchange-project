<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillAssign extends Model
{
    use HasFactory;
    protected $table = 'skill_assigns';
    protected $primaryKey = 'skill_assgin_id';

  
    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function assigner()
    {
        return $this->belongsTo(User::class, 'assgin_id');  // Fixing the typo in 'assgin_id'
    }

    public function skill()
    {
        return $this->belongsTo(Skill::class, 'skill_id');
    }

    public function userSkill()
    {
        return $this->belongsTo(Skill::class, 'user_skill_id');
    }

}
