<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Paciente extends Model
{
    use HasFactory;

    protected $table = 'pacientes';

    protected $fillable = ['nombre','apellidos','correo', 'status'];

    public static function getDataForPacientesView( $keyWord, $paginateNumber, $orderBy )
    {
        $query = DB::table('pacientes');

        $query->whereRaw('nombre LIKE "' . $keyWord . '"');

        $query->whereRaw('status = 1');

        if ( $orderBy == 1 ) {

            $query->orderByRaw('nombre ASC');

        }

        if ( $orderBy == 2 ) {

            $query->orderByRaw('nombre DESC');

        }

        if ( $orderBy == 3 ) {

            $query->orderByRaw('created_at DESC');

        }

        if ( $orderBy == 4 ) {

            $query->orderByRaw('created_at ASC');

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

}
