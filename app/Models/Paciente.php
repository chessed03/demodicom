<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Paciente extends Model
{
    use HasFactory;

    protected $table = 'pacientes';

    protected $fillable = ['sucursal_id','nombre','apellidos','correo', 'status'];

    public static function getDataForPacientesView( $sucursal_id_search, $keyWord, $paginateNumber, $orderBy )
    {
        $query = DB::table('pacientes');

        $query->select(
            DB::raw('
                pacientes.id as id,
                pacientes.nombre as nombre,
                pacientes.apellidos as apellidos,
                pacientes.correo as correo,
                sucursales.nombre as nombre_sucursal
            ')
        );

        $query->leftJoin('sucursales', 'pacientes.sucursal_id', '=', 'sucursales.id');

        $query->whereRaw('pacientes.nombre LIKE "' . $keyWord . '"');

        $query->whereRaw('pacientes.status = 1');

        if ( $sucursal_id_search ) {

            $query->whereRaw('sucursales.id = "' . $sucursal_id_search . '"');

        }

        if ( $orderBy == 1 ) {

            $query->orderByRaw('pacientes.nombre ASC');

        }

        if ( $orderBy == 2 ) {

            $query->orderByRaw('pacientes.nombre DESC');

        }

        if ( $orderBy == 3 ) {

            $query->orderByRaw('pacientes.created_at DESC');

        }

        if ( $orderBy == 4 ) {

            $query->orderByRaw('pacientes.created_at ASC');

        }

        $result = $query->paginate($paginateNumber);

        return $result;
    }

    public static function validateNewPacienteNoRepeat( $id, $email )
    {

        $query = DB::table('pacientes');

        if ( $id ) {

            $query->whereRaw('id != "'. $id . '"');

        }

        $query->whereRaw('nombre =  "'. $email . '"');

        $query->whereRaw('status = 1');

        $result = $query->first();

        if ( $result ) {

            return false;

        }

        return true;

    }

    public static function validatePacienteActiveOnSites( $id )
    {
        $result = false;

        $ativeOnSites = DB::table('imagenes')
            ->whereRaw('paciente_id = "' . $id . '"')
            ->whereRaw('status = 1')
            ->first();

        if ( $ativeOnSites ) {

            $result = true;

        }

        return $result;
    }

    public static function getDataSucursalesActives()
    {

        $query = DB::table('sucursales')
            ->whereRaw('status = 1');

        $result = $query->get();

        return $result;

    }

}
