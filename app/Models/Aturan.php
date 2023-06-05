<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aturan extends Model
{
    use HasFactory;
    protected $table= "tb_aturan";
    protected $primaryKey= "kode_aturan";
    protected $fillable= ['kode_aturan','list_gejala','kode_penyakit','penyakit'];
    public $timestamps = false;
}
