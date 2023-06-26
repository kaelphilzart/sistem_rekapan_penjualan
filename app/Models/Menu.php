<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'Menu';
    protected $primaryKey = 'id_menu';
    protected $fillable = ['id_menu', 'nama_menu', 'harga'];
}
