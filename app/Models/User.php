<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Spatie\MediaLibrary\HasMedia;
// use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable 
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'avatar',
        'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

//     public function registerMediaCollections() : void
//     {
//         $this->addMediaCollection('avatar')
//             ->singleFile();
// //            ->useFallbackUrl(config('app.placeholder').'160.png')
// //            ->useFallbackPath(config('app.placeholder').'160.png')
// //            ->registerMediaConversions(function (Media $media) {
// //                $this
// //                    ->addMediaConversion('thumb')
// //                    ->width(160)
// //                    ->height(160);
// //            });
//     }


    public function role()
    {
        return $this->belongsTo(Role::class);
    }


    public function hasPermission($permission): bool
    {
        return $this->role->permissions()->where('slug', $permission)->first() ? true : false;
    }

//    public function hasRole("Admin")
//    {
//        return $this->role == $admin; // sample implementation only
//    }
}
