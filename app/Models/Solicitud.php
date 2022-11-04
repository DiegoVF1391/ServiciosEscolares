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
      'nombre' => 'required|string|max:50',
      'descripcion' => 'required|string|max:250',
      'id_departamento' => 'required|min:0|not_in:0',
      'id_asignado' => 'integer|min:1',
      'comentarios'     => 'string|string|max:250',
      'estado' => 'string|string|max:50',
      'comentarios_asignado' => 'string|string|max:250'
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','descripcion','estado', 'id_departamento' ,'calificacion','comentarios', 'fechaAsignacion', 'fechaFinalización', 'id_asignado', 'comentarios_asignado'];

    public function departamento(){
      return $this->belongsTo(Departamento::class, 'id_departamento','id_departamento');
    }
}
