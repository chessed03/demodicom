<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Imagen extends Model
{
    use HasFactory;

    protected $table = 'imagenes';

    protected $fillable = ['paciente_id','url_imagen', 'status'];

    public static function getDataForImagenesView( $sucursal_id_search, $keyWord, $paginateNumber, $orderBy )
    {
        $query = DB::table('imagenes');

        $query->select(
            DB::raw('
                pacientes.id as paciente_id,
                pacientes.nombre as nombre,
                pacientes.apellidos as apellidos,
                pacientes.correo as correo,
                COUNT(*) as numero_imagenes,
                sucursales.nombre as nombre_sucursal
            ')
        );

        $query->leftJoin('pacientes', 'imagenes.paciente_id', '=', 'pacientes.id');

        $query->leftJoin('sucursales', 'pacientes.sucursal_id', '=', 'sucursales.id');

        $query->whereRaw('pacientes.nombre LIKE "' . $keyWord . '"');

        $query->whereRaw('pacientes.status = 1');

        $query->whereRaw('imagenes.status = 1');

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

        $query->groupByRaw('pacientes.id');

        $result = $query->paginate($paginateNumber);

        return $result;
    }

    public static function getPacientesActives()
    {
        $query = DB::table('pacientes')
            ->select(DB::raw('
                id,
                nombre,
                apellidos
            '));

        $query->whereRaw('status = 1');

        $result = $query->get();

        return $result;
    }

    public static function pacienteIdDatos( $paciente_id )
    {
        $result = null;

        if ( $paciente_id ) {

            $query = DB::table('pacientes')
                ->whereRaw('id = "' . $paciente_id . '"');

            $result = $query->first();

            return $result;

        }

        return $result;
    }

    public static function pacienteIdImagenes( $paciente_id, $date_search_initial, $date_search_final )
    {

        $result = null;

        if ( $paciente_id ) {

            $query = DB::table('imagenes')
                ->select(
                    DB::raw('
                        id,
                        url_imagen,
                        created_at
                    ')
                )
                ->whereRaw('paciente_id = "' . $paciente_id . '"');

            $query->whereRaw('status = 1');

            if ( $date_search_initial ) {

                $query->whereRaw('created_at >= "' . $date_search_initial . " 00:00:00" . '"');

            }

            if ( $date_search_final ) {

                $query->whereRaw('created_at <= "' . $date_search_final . " 23:59:59" . '"');

            }

            $result = $query->get();

            return $result;

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
