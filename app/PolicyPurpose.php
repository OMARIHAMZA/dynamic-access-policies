<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PolicyPurpose extends Model
{
    public $timestamps = false;
    protected $table = 'policy_purpose';
    public $fillable = [
        'policy_id', 'purpose_id'
    ];

    public $policy_id;
    public $purpose_id;

    public function policy()
    {
        return Policy::find($this->policy_id);
    }

    public function purpose()
    {
        return Purpose::find($this->purpose_id);
    }
}
