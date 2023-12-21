<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'email', 'password', 'project_id'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
