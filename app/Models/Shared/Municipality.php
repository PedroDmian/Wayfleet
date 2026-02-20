<?php

namespace App\Models\Shared;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Municipality extends Model
{
    use SoftDeletes;

    protected $table = 'municipalities';
    protected $fillable = [
        'name',
        'key',
        'state_id',
        'updated_by',
        'created_by'
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function country()
    {
        return $this->hasOneThrough(Country::class, State::class);
    }
}