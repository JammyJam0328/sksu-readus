<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $guarded=[];
     public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function information()
    {
        return $this->hasOne(Information::class);
    }
}