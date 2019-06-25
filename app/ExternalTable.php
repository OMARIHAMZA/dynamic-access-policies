<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExternalTable extends Model
{
    public $fillable = [
        'creator_id',
        'name'
    ];

    public $creator_id;
    public $name;

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

}
