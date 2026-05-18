<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['Nombre', 'Descripcion', 'Tamano', 'Locacion', 'Foto'])]
class Bosque extends Model
{
    use HasFactory;

    protected $table = 'bosques';
    protected $primaryKey = 'Id';
    public $timestamps = false;

    /**
     * Get the trees (arboles) associated with this forest (bosque).
     */
    public function arboles()
    {
        return $this->hasMany(Arbol::class, 'Bosque_Id', 'Id');
    }
}
