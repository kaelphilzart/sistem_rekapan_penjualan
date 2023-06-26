<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'Users';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'email', 'password', 'level'];
}
