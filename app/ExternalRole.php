<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExternalRole extends Model
{
    public $fillable = [
        'creator_id',
        'name',
        'description',
        'updated_at',
        'created_at'
    ];

    public $creator_id;
    public $name;
    public $description;

    public function creator()
    {
        return $this->belongsTo(User::class);
    }
}
