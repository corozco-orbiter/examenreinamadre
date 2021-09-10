<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Departamentos;
use App\Models\Empresas;
class Empleados extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','fecha_nacimiento','correo','genero','telefono','celular','fecha_ingreso','departamento','empresa'];
    public $timestamps = false;

    public function departamentos()
{
    return $this->belongsTo(Departamentos::class);
}
public function empresas()
{
    return $this->belongsTo(Empresas::class);
}
}
