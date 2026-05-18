<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['Nombre', 'Tamano', 'Locacion', 'Especie', 'FechaPlantado', 'Bosque_Id'])]
class Arbol extends Model
{
    use HasFactory;

    protected $table = 'arboles';
    protected $primaryKey = 'Id';
    public $timestamps = false;

    /**
     * Get the forest (bosque) associated with this tree.
     */
    public function bosque()
    {
        return $this->belongsTo(Bosque::class, 'Bosque_Id', 'Id');
    }

    /**
     * Get the titular records associated with this tree.
     */
    public function titulares()
    {
        return $this->hasMany(Titular::class, 'Arbol_Id', 'Id');
    }
}
