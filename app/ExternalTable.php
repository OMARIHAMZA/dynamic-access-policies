<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExternalTable extends Model
{
    protected $primaryKey = 'table_id';

    public $fillable = [
        'creator_id',
        'name'
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function creatorName()
    {
        return $this->creator()->first()['name'];
    }

    public function policy()
    {
        return $this->belongsTo(Policy::class);
    }
}
