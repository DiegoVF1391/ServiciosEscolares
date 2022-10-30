<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Solicitud extends Model
{
    use HasFactory;
 
    protected $table = 'solicitudes';
    protected $primaryKey = 'id_solicitud';
    public $incrementing = true;

    static $rules = [
      'nombre' => 'required',
      'descripcion' => 'required',
      'id_departamento' => 'required|min:0|not_in:0'
      // 'estado' => 'requierd',
      // 'fechaAsignacion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','descripcion','estado', 'id_departamento' ,'calificacion','comentarios', 'fechaAsignacion', 'fechaFinalización'];

    public function departamento(){
      return $this->belongsTo(Departamento::class, 'id_departamento','id_departamento');
    }
}
