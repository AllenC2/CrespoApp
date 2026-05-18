<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['Nombre', 'Usuario', 'Contrasena', 'Rol', 'FechaCreacion', 'Foto'])]
#[Hidden(['Contrasena'])]
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';
    protected $primaryKey = 'Id';
    public $timestamps = false;

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->Contrasena;
    }

    /**
     * Get the name of the password attribute for the user.
     *
     * @return string
     */
    public function getAuthPasswordName()
    {
        return 'Contrasena';
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'Contrasena' => 'hashed',
        ];
    }

    /**
     * Get the titular records associated with this user.
     */
    public function titulares()
    {
        return $this->hasMany(Titular::class, 'Usuario_Id', 'Id');
    }
}
