<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Scout\Searchable;
class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'hasInfo',
        'role_type',
        'name',
        'email',
        'password',
        'campus_id',
        'google_id',
        'google_profile_photo',
        'profile_photo_path',
        'event_notification',
        'announcement_notification',
    ];

    public function information()
    {
        return $this->hasOne(Information::class);
    }

    public function campus()
    {
        return $this->belongsTo(Campus::class);
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function viewedPosts()
    {
        return $this->hasMany(View::class);
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();

        unset($array['created_at'], $array['updated_at'], $array['provider_id'], $array['role_type'], $array['remember_token']);

        return $array;
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function announcements()
    {
        return $this->hasMany(Announcement::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

 



    

}