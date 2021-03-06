<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function departments()
    {
        return $this->hasMany(Department::class);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
}