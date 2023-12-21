<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Category;
use App\Models\Project;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     protected $fillable = [
        'name', 'email', 'password', 'role', 'specialty_id',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function specialty()
    {
        return $this->belongsTo(Category::class, 'specialty_id');
    }

    public function projectsAsMember1()
    {
        return $this->hasMany(Project::class, 'member1_id');
    }

    public function projectsAsMember2()
    {
        return $this->hasMany(Project::class, 'member2_id');
    }

    public function projectsAsMember3()
    {
        return $this->hasMany(Project::class, 'member3_id');
    }

    public function evaluationsAsEvaluator()
    {
        return $this->hasMany(Evaluation::class, 'evaluator_id');
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
