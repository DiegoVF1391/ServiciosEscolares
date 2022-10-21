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
		'estado' => 'required',
		'calificacion' => 'required',
		'fechaAsignacion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['estado','calificacion','comentarios', 'fechaAsignacion', 'fechaFinalización'];
}
