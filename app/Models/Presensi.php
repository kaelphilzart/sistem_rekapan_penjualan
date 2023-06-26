<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;
    protected $table = 'Presensi';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'nama', 'tanggal', 'status', 'stand'];
}
