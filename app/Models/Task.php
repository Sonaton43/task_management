<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'status', 'project_id', 'assigned_to'];

    public function project(){
        return $this->belongsTo(Projects::class);
    }

    public function assignee(){
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function manager(){
        return $this->belongsTo(User::class, 'manager_id');
    }
    
}
