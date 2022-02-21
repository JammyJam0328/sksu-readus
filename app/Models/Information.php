<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Information extends Model
{
    use HasFactory;
    use searchable;
    protected $guarded=[];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();

       unset($array['user_id'],$array['created_at'],$array['updated_at']);

        return $array;
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

}