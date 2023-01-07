<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sucursal extends Model
{
    use HasFactory;

    protected $table = 'sucursales';

    protected $fillable = ['paciente_id','nombre','direccion', 'status'];

    public static function getDataForSucursalesView( $keyWord, $paginateNumber, $orderBy )
    {
        $query = DB::table('sucursales');

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

    public static function validateNewSucursalNoRepeat( $id, $nombre )
    {

        $query = DB::table('sucursales');

        if ( $id ) {

            $query->whereRaw('id != "'. $id . '"');

        }

        $query->whereRaw('nombre =  "'. $nombre . '"');

        $query->whereRaw('status = 1');

        $result = $query->first();

        if ( $result ) {

            return false;

        }

        return true;

    }

    public static function validateSucursalActiveOnPacientes( $id )
    {
        $result = false;

        $ativeOnSites = DB::table('pacientes')
            ->whereRaw('sucursal_id = "' . $id . '"')
            ->whereRaw('status = 1')
            ->first();

        if ( $ativeOnSites ) {

            $result = true;

        }

        return $result;
    }

}
