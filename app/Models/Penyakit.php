<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    use HasFactory;
    protected $table= "tb_penyakit";
    protected $primaryKey= "kode_penyakit";
    protected $fillable= ['kode_penyakit','penyakit','keterangan'];
    public $timestamps = false;
}
