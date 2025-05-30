<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = 'program';
    protected $guarded = ['id'];

    public function skpd()
    {
        return $this->belongsTo(Skpd::class, 'id_skpd');
    }

    public function matriks()
    {
        return $this->hasMany(Matrik::class, 'kode');
    }
}
