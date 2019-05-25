<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purpose extends Model
{
    public function creator()
    {
        return $this->hasOne(User::class);
    }
}
