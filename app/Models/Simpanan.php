<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simpanan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function anggota(){
        return $this->BelongsTo(Anggota::class);
    }

    public function pinjaman(){
        return $this->BelongsTo(Pinjaman::class);
    }
}
