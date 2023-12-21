<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluator extends Model
{
    protected $table = 'evaluators';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'email', 'password'];

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'evaluations')->withPivot('marks');
    }
}