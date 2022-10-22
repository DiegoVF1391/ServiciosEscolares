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
class Personal extends Model
{
    use HasFactory;
    /*
    protected $table = 'personals';
    protected $primaryKey = 'id_personal';
    public $incrementing = true;*/

    protected $primaryKey = 'id_personal';

    static $rules = [
		'nombre' => 'required',
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
}
