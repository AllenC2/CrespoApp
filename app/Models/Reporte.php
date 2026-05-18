<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['Descripcion', 'Estado', 'Atencion_Requerida', 'Foto_Evidencia', 'Creado_El', 'RelacionConTitulo'])]
class Reporte extends Model
{
    use HasFactory;

    protected $table = 'reportes';
    protected $primaryKey = 'Id';
    public $timestamps = false;

    /**
     * Get the titular record associated with this report.
     */
    public function titular()
    {
        return $this->belongsTo(Titular::class, 'RelacionConTitulo', 'Id');
    }
}
