<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

use Request;

class User extends Authenticatable
{
    use Notifiable;

    const ROLE_USER = 1;
    const ROLE_MANAGER = 90;
    const ROLE_ADMIN = 100;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'role', 'name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin(): bool
    {
        if (Auth::check() && ($this->role > 1)) {
            return true;
        }
        else {
            return false;
        }
    }

    public function isManager(): bool
    {
        return $this->role == self::ROLE_MANAGER;
    }

    public function isUser(): bool
    {
        if (Auth::check() && ($this->role >= 1)) {
            return true;
        }
        else {
            return false;
        }
    }
}
