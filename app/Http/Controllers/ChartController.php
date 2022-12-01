<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;
use App\Models\Solicitud;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\Object_;
use Maatwebsite\Excel\Facades\Excel;

use App\Exports\ReportesExport;

class ChartController extends Controller
{
    public function serviciosAdmin(){
        /*$serviciosTotales = Solicitud::select(
            DB::raw("EXTRACT(MONTH FROM updated_at) as month"),
            DB::raw('COUNT(id_solicitud) as count'))
            ->where('estado', '=', 'finalizado')
            ->groupBy('month')
            ->get()
            ->toArray();
        $counts = array_fill(0, 12, 0);
        foreach($serviciosTotales as $s){
            $index = $s['month']-1;
            $counts[$index] = $s['count'];
        }*/

        

        
        //CANTIDAD DE SERVICIOS TERMINADOS
        $serviciosMante = Solicitud::select(
            DB::raw("EXTRACT(MONTH FROM updated_at) as month"),
            DB::raw('COUNT(id_solicitud) as count'))
            ->where('estado', '=', 'finalizado')
            ->where('id_departamento', '=', '1')
            ->groupBy('month')
            ->get()
            ->toArray();
        $mantenimiento = array_fill(0, 12, 0);
        foreach($serviciosMante as $s){
            $index = $s['month']-1;
            $mantenimiento[$index] = $s['count'];
        }

        $serviciosIT = Solicitud::select(
            DB::raw("EXTRACT(MONTH FROM updated_at) as month"),
            DB::raw('COUNT(id_solicitud) as count'))
            ->where('estado', '=', 'finalizado')
            ->where('id_departamento', '=', '2')
            ->groupBy('month')
            ->get()
            ->toArray();
        $it = array_fill(0, 12, 0);
        foreach($serviciosIT as $s){
            $index = $s['month']-1;
            $it[$index] = $s['count'];
        }

        //CALIFIACIONES PROMEDIO DE LOS SERVICIOS
         
        $caliMan = Solicitud::select(
            DB::raw("EXTRACT(MONTH FROM updated_at) as month"),
            DB::raw('AVG(calificacion) as calificacion'))
            ->where('estado', '=', 'finalizado')
            ->where('id_departamento', '=', '1')
            ->groupBy('month')
            ->get()
            ->toArray();
        $calificacionMantenimiento = array_fill(0, 12, 0);
        foreach($caliMan as $p){
            $index = $p['month']-1;
            $calificacionMantenimiento[$index] = floatval($p['calificacion']);
        }  
        
        $caliIt = Solicitud::select(
            DB::raw("EXTRACT(MONTH FROM updated_at) as month"),
            DB::raw('AVG(calificacion) as calificacion'))
            ->where('estado', '=', 'finalizado')
            ->where('id_departamento', '=', '2')
            ->groupBy('month')
            ->get()
            ->toArray();
        $calificacionIt = array_fill(0, 12, 0);
        foreach($caliIt as $p){
            $index = $p['month']-1;
            $calificacionIt[$index] = floatval($p['calificacion']);
        }

        //CANTIDAD DE SERVICIOS PENDIENTES
        $penMan = Solicitud::select(
            DB::raw("EXTRACT(MONTH FROM updated_at) as month"),
            DB::raw('COUNT(id_solicitud) as count'))
            ->where('estado', '=', 'En progreso')
            //->where('estado', '=', 'asignada')
            ->where('id_departamento', '=', '1')
            ->groupBy('month')
            ->get()
            ->toArray();
        $penMantenimiento = array_fill(0, 12, 0);
        foreach($penMan as $p){
            $index = $p['month']-1;
            $penMantenimiento[$index] = $p['count'];
        }

        $pendienteIt = Solicitud::select(
            DB::raw("EXTRACT(MONTH FROM updated_at) as month"),
            DB::raw('COUNT(id_solicitud) as count'))
            ->where('estado', '=', 'En progreso')
            //->where('estado', '=', 'asignada')
            ->where('id_departamento', '=', '2')
            ->groupBy('month')
            ->get()
            ->toArray();
        $penIt = array_fill(0, 12, 0);
        foreach($pendienteIt as $p){
            $index = $p['month']-1;
            $penIt[$index] = $p['count'];
        }

        return view('charts.servicios_admin', compact('mantenimiento', 'it','calificacionIt', 'calificacionMantenimiento', 'penMantenimiento', 'penIt'));
    }

    public function exportExcel(){
        return Excel::download(new ReportesExport, 'Reporte-del-sistema.xlsx');
    }
}
