<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purpose extends Model
{
    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function policies()
    {
        return $this->belongsToMany('App\Policy');
    }

    public static function asActionName($id): string
    {
        switch ($id) {
            case 0:
                return 'create';
            case 1:
                return 'update';
            case 2:
                return 'read';
            case 3:
                return 'delete';
        }
    }
}
