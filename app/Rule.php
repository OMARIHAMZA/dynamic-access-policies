<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    public $fillable = [
        'key_id',
        'value',
    ];

    private $key_id;
    private $value;

    public function key()
    {
        return Key::find($this->key_id);
    }
}
