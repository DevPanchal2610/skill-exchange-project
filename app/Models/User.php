<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'city_id',
        'profile_picture',
        'isactive',
        'isadmin',
        'security_question',
        'security_answer'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    //protected $table = 'users';

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function assignedSkills()
    {
        return $this->hasMany(SkillAssign::class, 'user_id');
    }

    public function assignedToOthers()
    {
        return $this->hasMany(SkillAssign::class, 'assgin_id');
    }

    public function skills()
    {
        return $this->hasMany(Skill::class, 'user_id');
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class, 'user_id');
    }
}
