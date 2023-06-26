<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stand extends Model
{
    use HasFactory;
    
    protected $table = 'stand';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'nama_stand', 'alamat'];
}
