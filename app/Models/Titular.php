<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['FechaInicio', 'FirmadaPor', 'Arbol_Id', 'Usuario_Id', 'foto_recibido', 'estado_vigencia', 'motivo_baja'])]
class Titular extends Model
{
    use HasFactory;

    protected $table = 'titulares';
    protected $primaryKey = 'Id';

    /**
     * Get the user (usuario) who holds this title.
     */
    public function usuario()
    {
        return $this->belongsTo(User::class, 'Usuario_Id', 'Id');
    }

    /**
     * Get the tree (arbol) associated with this title.
     */
    public function arbol()
    {
        return $this->belongsTo(Arbol::class, 'Arbol_Id', 'Id');
    }

    /**
     * Get the reports associated with this title.
     */
    public function reportes()
    {
        return $this->hasMany(Reporte::class, 'RelacionConTitulo', 'Id');
    }

    /**
     * Get the most recent report associated with this title.
     */
    public function reporteMasReciente()
    {
        return $this->hasOne(Reporte::class, 'RelacionConTitulo', 'Id')
            ->orderBy('Creado_El', 'desc');
    }
}
