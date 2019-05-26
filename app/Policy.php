<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function purposes()
    {
        return $this->belongsToMany(Purpose::class);
    }
}
