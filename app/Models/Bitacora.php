<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    use HasFactory;
 
    protected $table = 'bitacoras';
    protected $primaryKey = 'id_bitacora';
    public $incrementing = true;

    static $rules = [
		'actividad' => 'required',
		'fechaInicio' => 'required',
        'fechaFinal' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['actividad','descripcion','fechaInicio', 'fechaFinal'];
}
