<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 *
 * @property $id
 * @property $nombre
 * @property $email
 * @property $password
 * @property $acceso
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */

class Encargado extends Model
{
    use HasFactory;
    
    /*protected $table = 'encargados';
    protected $primaryKey = 'id_encargado';
    public $incrementing = true;
*/
    static $rules = [
		'name' => 'required',
		'email' => 'required',
		'password' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','email','password'];

    /*public function departamento(){
      return $this->hasOne(Departamento::class);
    }*/
}
