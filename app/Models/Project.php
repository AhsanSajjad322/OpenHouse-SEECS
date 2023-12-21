<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Location;
use App\Models\Evaluation;

class Project extends Model
{
    protected $table = 'projects';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'detail', 'marks', 'status', 'location_id', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function evaluators()
    {
        return $this->belongsToMany(Evaluator::class, 'evaluations')->withPivot('marks');
    }
}