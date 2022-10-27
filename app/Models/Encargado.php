<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encargado extends Model
{
    use HasFactory;
    
    protected $table = 'encargados';
    protected $primaryKey = 'id_encargado';
    public $incrementing = true;

    static $rules = [
		'nombre' => 'required',
		'email' => 'required',
		'password' => 'required',
    'acceso' => 'required'
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','email','password','acceso'];

    public function departamento(){
      return $this->belongsTo(Departamento::class, 'id_departamento');
    }
}
