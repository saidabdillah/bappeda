<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Matrik extends Model
{
    protected $guarded = ['id'];

    public function skpd(): BelongsTo
    {
        return $this->belongsTo(Skpd::class, 'perangkat_daerah_pelaksana', 'id');
    }

    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class, 'kode', 'kode');
    }


    #[Scope]
    protected function userMatriks(Builder $query): void
    {
        $query->where('perangkat_daerah_pelaksana', auth()->user()->id_skpd);
    }

    #[Scope]
    protected function periode(Builder $query): void
    {
        $query->orderBy('periode', 'ASC')->orderBy('perangkat_daerah_pelaksana', 'DESC');
    }

    #[Scope]
    protected function cariMatrik(Builder $query, string $cari): void
    {
        $query->where('kode', 'like', "%$cari%");
    }
}
