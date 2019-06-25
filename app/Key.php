<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    public $fillable = [
        'name',
    ];

    private $name;

    public function rules()
    {
        return $this->hasMany(Rule::class);
    }
}
