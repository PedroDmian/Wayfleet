<?php

namespace App\Models\Shared;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use SoftDeletes;
    protected $table = 'countries';
    protected $fillable = [
        'name',
        'key',
        'updated_by',
        'created_by'
    ];

    public function states()
    {
        return $this->hasMany(State::class);
    }

    public function municipalities()
    {
        return $this->hasManyThrough(Municipality::class, State::class);
    }
}