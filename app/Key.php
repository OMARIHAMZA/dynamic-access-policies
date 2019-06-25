<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    public $fillable = [
        'creator_id',
        'name',
    ];

    private $creator_id;
    private $name;

    public function rules()
    {
        return $this->hasMany(Rule::class);
    }
}
