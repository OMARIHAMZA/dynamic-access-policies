<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccessRequestsHistory extends Model
{
    protected $table = "access_requests_history";

    public $timestamps = false;

    protected $fillable = [
        'requester_id',
        'external_tables',
        'access_date',
        'emergency',
        'requested',
        'result'
    ];
}
