<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pakar extends Model
{
    use HasFactory;
    protected $table= "tb_pakar";
    protected $primaryKey= "id_pakar";
    protected $fillable= ['id_pakar','nama_pakar','spesialis'];
    public $timestamps = false;
}
