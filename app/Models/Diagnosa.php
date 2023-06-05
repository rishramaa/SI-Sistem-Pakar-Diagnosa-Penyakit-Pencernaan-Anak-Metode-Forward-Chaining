<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosa extends Model
{
    use HasFactory;
    protected $table = "tb_diagnosa";
    protected $primaryKey = "kode_diagnosa";
    protected $fillable = ['kode_diagnosa', 'kode_penyakit', 'keterangan', 'penanganan'];
    public $timestamps = false;
}
