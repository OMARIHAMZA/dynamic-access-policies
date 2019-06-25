<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    protected $primaryKey = 'policy_id';

    public $fillable = [
        'creator_id',
        'data_element',
        'name',
        'rules',
        'emergency_rules'
    ];

    public function creator()
    {
        return $this->belongsTo(User::class);
    }
}
