<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Bosque;
use App\Models\Arbol;
use App\Models\Titular;
use App\Models\Reporte;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Seed Users
        $juan = User::firstOrCreate(
            ['Usuario' => 'titular@crespo.com'],
            [
                'Nombre' => 'Juan Crespo (Titular)',
                'Contrasena' => bcrypt('password'),
                'Rol' => 'Titular',
                'FechaCreacion' => now(),
            ]
        );

        $ana = User::firstOrCreate(
            ['Usuario' => 'ana@crespo.com'],
            [
                'Nombre' => 'Ana Martínez (Titular)',
                'Contrasena' => bcrypt('password'),
                'Rol' => 'Titular',
                'FechaCreacion' => now(),
            ]
        );

        // 2. Seed Forests
        $bosque1 = Bosque::firstOrCreate(
            ['Nombre' => 'Reserva Ecológica Crespo'],
            [
                'Descripcion' => 'Una hermosa reserva natural protegida dedicada a la reforestación y conservación de especies endémicas.',
                'Tamano' => 150.50,
                'Locacion' => 'Valle de Bravo, México',
            ]
        );

        $bosque2 = Bosque::firstOrCreate(
            ['Nombre' => 'Santuario del Bosque de Niebla'],
            [
                'Descripcion' => 'Bosque nublado de alta montaña enfocado en la absorción de carbono y preservación de manantiales.',
                'Tamano' => 85.00,
                'Locacion' => 'Xalapa, Veracruz',
            ]
        );

        // 3. Seed Trees
        $arbol1 = Arbol::firstOrCreate(
            ['Nombre' => 'Roble Centinela'],
            [
                'Tamano' => 12.50,
                'Locacion' => 'Sección A - Parcela 4',
                'Especie' => 'Quercus robur',
                'FechaPlantado' => '2024-03-12',
                'Bosque_Id' => $bosque1->Id,
            ]
        );

        $arbol2 = Arbol::firstOrCreate(
            ['Nombre' => 'Pino Real'],
            [
                'Tamano' => 8.20,
                'Locacion' => 'Sección A - Parcela 12',
                'Especie' => 'Pinus patula',
                'FechaPlantado' => '2025-01-20',
                'Bosque_Id' => $bosque1->Id,
            ]
        );

        $arbol3 = Arbol::firstOrCreate(
            ['Nombre' => 'Encino Guardián'],
            [
                'Tamano' => 15.00,
                'Locacion' => 'Zona Norte - Parcela 2',
                'Especie' => 'Quercus ilex',
                'FechaPlantado' => '2023-11-05',
                'Bosque_Id' => $bosque2->Id,
            ]
        );

        // 4. Seed Titular Records
        $t1 = Titular::firstOrCreate(
            [
                'Usuario_Id' => $juan->Id,
                'Arbol_Id' => $arbol1->Id,
            ],
            [
                'FechaInicio' => '2024-03-15',
                'FirmadaPor' => 'Director Crespo Ambiental',
                'estado_vigencia' => 'Vigente',
            ]
        );

        $t2 = Titular::firstOrCreate(
            [
                'Usuario_Id' => $juan->Id,
                'Arbol_Id' => $arbol2->Id,
            ],
            [
                'FechaInicio' => '2025-01-22',
                'FirmadaPor' => 'Director Crespo Ambiental',
                'estado_vigencia' => 'Vigente',
            ]
        );

        $t3 = Titular::firstOrCreate(
            [
                'Usuario_Id' => $ana->Id,
                'Arbol_Id' => $arbol3->Id,
            ],
            [
                'FechaInicio' => '2023-11-10',
                'FirmadaPor' => 'Director Crespo Ambiental',
                'estado_vigencia' => 'Vigente',
            ]
        );

        // 5. Seed Reports with beautiful online nature images
        $img1 = null;
        $img2 = null;
        $img3 = null;

        try {
            // Using context options with a short timeout to prevent hanging the seeder
            $ctx = stream_context_create(['http' => ['timeout' => 3]]);
            $img1 = @file_get_contents('https://images.unsplash.com/photo-1542273917363-3b1817f69a2d?w=600', false, $ctx);
            $img2 = @file_get_contents('https://images.unsplash.com/photo-1502082553048-f009c37129b9?w=600', false, $ctx);
            $img3 = @file_get_contents('https://images.unsplash.com/photo-1448375240586-882707db888b?w=600', false, $ctx);
        } catch (\Exception $e) {
            // Safe fallback to null in case of offline/network failures
        }

        Reporte::firstOrCreate(
            [
                'RelacionConTitulo' => $t1->Id,
                'Descripcion' => 'El Roble Centinela muestra un crecimiento saludable este mes. El follaje está denso y verde. No presenta plagas ni signos de sequedad.',
            ],
            [
                'Estado' => 'Excelente',
                'Atencion_Requerida' => 'Ninguna',
                'Foto_Evidencia' => $img1,
                'Creado_El' => '2026-05-10 10:00:00',
            ]
        );

        Reporte::firstOrCreate(
            [
                'RelacionConTitulo' => $t2->Id,
                'Descripcion' => 'El Pino Real muestra un desarrollo estable. Se aplicaron nutrientes orgánicos de liberación lenta en el suelo para mejorar la absorción.',
            ],
            [
                'Estado' => 'Saludable',
                'Atencion_Requerida' => 'Monitoreo de riego preventivo',
                'Foto_Evidencia' => $img2,
                'Creado_El' => '2026-05-15 14:30:00',
            ]
        );

        Reporte::firstOrCreate(
            [
                'RelacionConTitulo' => $t3->Id,
                'Descripcion' => 'El Encino Guardián se encuentra robusto y fuerte. Se realizó una poda menor de ramas bajas secas para estimular la copa superior.',
            ],
            [
                'Estado' => 'Excelente',
                'Atencion_Requerida' => 'Ninguna',
                'Foto_Evidencia' => $img3,
                'Creado_El' => '2026-05-12 09:15:00',
            ]
        );
    }
}
