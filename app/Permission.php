<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public $fillable = [
        'title',
        'description',
    ];

    protected $primaryKey = 'permission_id';
    public $title;
    public $description;

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
