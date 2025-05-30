<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Skpd extends Model
{
    protected $table = 'skpd';
    protected $guarded = ['id'];

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id_skpd');
    }

    public function matriks(): HasOne
    {
        return $this->hasOne(Matrik::class, 'perangkat_daerah_pelaksana', 'id');
    }

    public function programs(): HasMany
    {
        return $this->hasMany(Program::class, 'id_skpd');
    }
}
