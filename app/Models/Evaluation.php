<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\User;

class Evaluation extends Model
{
    protected $table = 'evaluations';
    protected $primaryKey = null; // Since it has a composite key
    protected $fillable = ['evaluator_id', 'project_id', 'marks'];

    public function evaluator()
    {
        return $this->belongsTo(Evaluator::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}