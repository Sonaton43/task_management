<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'project_code', 'manager_id'];

    public function manager(){
        return $this->belongsTo(User::class, 'manager_id');
    }

    // public function tasks(){
    //     return $this->hashMany(Task::class);
    // }
    
}
