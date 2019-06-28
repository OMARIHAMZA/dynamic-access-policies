<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function roleTitle()
    {
        return $this->role()->first()['title'];
    }

    public function permissions()
    {
        return $this->role()->permissions();
    }

    public function externalRoles()
    {
        return $this->hasMany(ExternalRole::class);
    }

    public function externalTables()
    {
        return $this->hasMany(ExternalTable::class);
    }

    public function requestsHistory()
    {
        return $this->hasMany(AccessRequestsHistory::class, 'requester_id');
    }
}
