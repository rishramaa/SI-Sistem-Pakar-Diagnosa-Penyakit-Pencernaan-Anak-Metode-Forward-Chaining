<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $table= "tb_report";
    protected $primaryKey= "id_report";
    protected $fillable= ['id_report','id_pakar','nama_pakar','id_pasien','nama','kode_diagnosa','kode_aturan','list_gejala','gejala','kode_penyakit','penyakit'];
    public $timestamps = false;
}
