<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function anggota(){
        return $this->BelongsTo(Anggota::class);
    }
}
