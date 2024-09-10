<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProvidersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('providers')->delete();
        
        \DB::table('providers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Cooperativa de trabajo Emplastcoop LTDA',
                'tipo' => 3,
                'distrito' => 5,
                'direccion' => 'Descartes 4265',
                'descripcion' => null,
                'phone' => '1568626422',
                'existen_registros_compras_ungs' => false,
                'email' => 'orfilaa@hotmail.com',
                'pagina_web' => 'https://www.facebook.com/EmplastCoop/',
                'nombre_referente' => 'Alejandro',
                'referente' => null,
                'cargo' => 'Tesorero',
                'cuit' => '30716196344',
                'matricula_inaes' => '57264',
                'registro_provincial_dipac' => null,
                'inscriptos_renatep' => false,
                'cooperativa_registro_nacional_efectores' => false,
                'inscriptos_sipro' => false,
                'cantidad_trabajadores' => 65,
                'trabajadores_mujeres_diversidades' => 0,
                'porcentaje_mujeres_diversidades' => 0,
                'trabajadores_discapacidad' => false,
                'escala_produccion' => 1,
                'fecha_inscripcion' => Carbon::createFromFormat('d/m/Y H:i:s', '1/12/2021 13:54:14')
            ),
        ));
        
        
    }
}