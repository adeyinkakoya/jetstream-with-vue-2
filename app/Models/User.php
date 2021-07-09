<?php

namespace App\Models;

use App\Models\Post;
use App\Policies\UserPolicy;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Laravel\Jetstream\HasProfilePhoto;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'gender'
    ];

    /**
     * The attributes that should be hidden for arrays.
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
     * The attributes that should be cast to native types.
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
        'profile_photo_url','permissions'
    ];


    public function posts(){
        return $this->hasMany(Post::class);
    }

// Overwrite this method from the has profile photo class
    protected function defaultProfilePhotoUrl()
    {
        return $this->gender=="Mr" ? asset('storage/images/avatar_male.png') : asset('storage/images/avatar_female.png');
        
    }

// public function getUserRoleAttribute(){
//     return $this->getRoleNames();
// }   


public function getPermissionsAttribute(){
    return [
        'user'=>[
            'viewany'=>$this->can('viewAny',$this),
            'create'=>$this->can('create',$this)
        ]
        ];
}  
}
