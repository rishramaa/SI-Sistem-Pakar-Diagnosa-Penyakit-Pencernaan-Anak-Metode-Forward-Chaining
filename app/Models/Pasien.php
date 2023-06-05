<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    protected $table = "tb_pasien";
    protected $primaryKey = 'id_pasien';
    protected $fillable = ['id_pasien', 'nama', 'jenis_kelamin', 'alamat', 'no_hp', 'username', 'password'];
    public $timestamps = false;
}
