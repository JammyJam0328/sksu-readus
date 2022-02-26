<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
class Post extends Model
{
    use Searchable;
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function privacy()
    {
        return $this->belongsTo(Privacy::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function medias()
    {
        return $this->hasMany(Media::class);
    }

    public function incrementViews()
    {
        $this->increment('views');
    }
    // 
    public function views()
    {
        return $this->hasMany(View::class);
    }

    public function alreadyViewed()
    {
        return $this->views()->where('user_id', auth()->id())->exists();
    }

    public function viewsCount()
    {
        return $this->views()->count();
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();

       unset($array['created_at'],$array['updated_at']);

        return $array;
    }

    

}