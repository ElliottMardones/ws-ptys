<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comuna;

class ComunaController extends Controller
{
    // Obtener todas las comunas
    public function index()
    {
        $comunas = Comuna::all();
        return response()->json($comunas);
    }

    // Obtener una comuna específica
    public function show($idcom, $anno)
    {
        $comuna = Comuna::where('idcom', $idcom)->where('Anno', $anno)->first();

        if ($comuna) {
            return response()->json($comuna);
        } else {
            return response()->json(['mensaje' => 'Comuna no encontrada'], 404);
        }
    }

    // Método para obtener una comuna y sus indicadores
public function getComunaWithIndicadores($idcom, $anno)
{
    $comuna = Comuna::with(['indicadores' => function($query) use ($anno) {
                $query->where('Anno', $anno);
            }])
            ->where('idcom', $idcom)
            ->where('Anno', $anno)
            ->first();

    if ($comuna) {
        foreach ($comuna->indicadores as $key => $indicador) {
            // Decodificar JSON reemplazando comillas simples por dobles
            $indicador->Subtitulos = json_decode(str_replace("'", '"', $indicador->Subtitulos));
            $indicador->table_body = json_decode(str_replace("'", '"', $indicador->table_body));
            $indicador->table_header = json_decode(str_replace("'", '"', $indicador->table_header));

            $thead = explode("', '", trim($indicador->thead, "[]'"));
            $indicador->thead = $thead;

            $Fuente = explode("', '", trim($indicador->Fuente, "[]'"));
            $indicador->Fuente = $Fuente;

            $tablas = explode("', '", trim($indicador->Tabla, "[]'"));
            $indicador->Tabla = $tablas;

            // Agrupar los indicadores por el tipo de indicador
            $tipoIndicador = $indicador->Indicador;
            $comuna->indicadores[$tipoIndicador] = $indicador;
            unset($comuna->indicadores[$key]);
        }

        $ordenIndicadores = [
            'Indicadores demográficos',
            'Indicadores sociales',
            'Indicadores de salud',
            'Indicadores educacionales',
            'Indicadores económicos',
            'Indicadores municipales',
            'Indicadores de seguridad',
            'Indicadores electorales'
        ];

        // Ordenar los indicadores según el orden deseado
        $comuna->indicadores = $comuna->indicadores->sortBy(function($indicador) use ($ordenIndicadores) {
            return array_search($indicador->Indicador, $ordenIndicadores);
        });

        return response()->json($comuna);
    } else {
        return response()->json(['mensaje' => 'Comuna no encontrada'], 404);
    }
}



}
