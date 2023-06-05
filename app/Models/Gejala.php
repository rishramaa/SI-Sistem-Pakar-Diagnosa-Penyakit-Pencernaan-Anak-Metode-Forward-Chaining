<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    use HasFactory;
    protected $table= "tb_gejala";
    protected $primaryKey= "kode_gejala";
    protected $fillable= ['kode_gejala','gejala','keterangan'];
    public $timestamps = false;
}
