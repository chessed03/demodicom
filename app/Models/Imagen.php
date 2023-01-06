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

    public static function getDataForImagenesView( $keyWord, $paginateNumber, $orderBy )
    {
        $query = DB::table('imagenes');

        $query->select(
            DB::raw('
                pacientes.id as paciente_id,
                pacientes.nombre as nombre,
                pacientes.apellidos as apellidos,
                pacientes.correo as correo,
                COUNT(*) as numero_imagenes
            ')
        );

        $query->leftJoin('pacientes', 'imagenes.paciente_id', '=', 'pacientes.id');

        $query->whereRaw('pacientes.nombre LIKE "' . $keyWord . '"');

        $query->whereRaw('pacientes.status = 1');

        $query->whereRaw('imagenes.status = 1');

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

    public static function pacienteIdImagenes( $paciente_id )
    {

        $result = null;

        if ( $paciente_id ) {

            $query = DB::table('imagenes')
                ->select(
                    DB::raw('
                        id,
                        url_imagen
                    ')
                )
                ->whereRaw('paciente_id = "' . $paciente_id . '"');

            $query->whereRaw('status = 1');

            $result = $query->get();

            return $result;

        }

        return $result;

    }

}
