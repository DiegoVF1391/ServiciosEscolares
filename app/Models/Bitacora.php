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
    public $timestamps = false;

    static $rules = [
		'actividad' => 'required|string|max:100',
        'descripcion' => 'string|max:250',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['actividad','descripcion','fechaInicio', 'fechaFinal'];
}
