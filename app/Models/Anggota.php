<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function pinjaman(){
        return $this->hasOne(Pinjaman::class);
    }
    public function simpanan()
    {
        return $this->hasOne(Simpanan::class, 'anggota_id');
    }
    // public function pinjaman(){
    //     return $this->belongsToMany(Pinjaman::class);
    // }
    // public function simpanan()
    // {
    //     return $this->belongsToMany(Simpanan::class);
    // }
}
