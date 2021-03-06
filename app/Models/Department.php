<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function campus()
    {
        return $this->belongsTo(Department::class);
    }

    public function programs()
    {
        return $this->hasMany(Program::class);
    }
}