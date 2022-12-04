<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;
use App\Models\Solicitud;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\Object_;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Exports\ReportesExport;

class ChartController extends Controller
{
    public function serviciosAdmin(){

        //CANTIDAD DE SERVICIOS TERMINADOS
        $serviciosMante = Solicitud::select(
            DB::raw("EXTRACT(MONTH FROM updated_at) as month"),
            DB::raw('COUNT(id_solicitud) as count'))
            ->where('estado', '=', 'atendida')
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
            ->where('estado', '=', 'atendida')
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
            ->where('estado', '=', 'atendida')
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
            ->where('estado', '=', 'atendida')
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

    //EXPORTAR DATOS EN EXCEL
    public function exportExcel(){
        return Excel::download(new ReportesExport, 'Reporte-del-sistema.xlsx');
    }
    
    //EXPORTAR DATOS EN PDF
    public function exportPdf(){
        $solicitudes = DB::table('solicitudes')
        ->join('departamentos', 'solicitudes.id_departamento', '=', 'departamentos.id_departamento')
        ->join('users', 'solicitudes.id_user_asigna', '=', 'users.id')
        ->select('solicitudes.id_solicitud', 'solicitudes.nombre', 'solicitudes.descripcion', 'solicitudes.estado', 'users.name','departamentos.nombre as departamento')
        ->orderBy('departamentos.nombre', 'asc')
        ->get();

        $penMan = Solicitud::where('estado', '!=', 'atendida')
            ->where('id_departamento', '=', '1')
            ->get()->count();

        $penIt = Solicitud::where('estado', '!=', 'atendida')
                ->where('id_departamento', '=', '2')
                ->get()->count();
        
        $caliMan = Solicitud::where('estado', '=', 'atendida')
                    ->where('id_departamento', '=', '1')
                    ->get()
                    ->avg('calificacion');
        
        $caliIt = Solicitud::where('estado', '=', 'atendida')
                    ->where('id_departamento', '=', '2')
                    ->get()
                    ->avg('calificacion');
        //dd($caliIt);
        $pdf = PDF::loadView('charts.solicitudes', compact('solicitudes', 'penIt', 'penMan', 'caliIt', 'caliMan'));
        

        return $pdf->download('Reporte-del-sistema.pdf');
    }

    public function serviciosDep(){
        $id_departamento = auth()->user()->id_departamento;
        $serviciosDep = Solicitud::select(
            DB::raw("EXTRACT(MONTH FROM updated_at) as month"),
            DB::raw('COUNT(id_solicitud) as count'))
            ->where('estado', '=', 'atendida')
            ->where('id_departamento', '=', $id_departamento)
            ->groupBy('month')
            ->get()
            ->toArray();
        $total = array_fill(0, 12, 0);
        foreach($serviciosDep as $s){
            $index = $s['month']-1;
            $total[$index] = $s['count'];
        }

        $depa = DB::table('departamentos')
        ->select('nombre')
        ->where('id_departamento', '=', $id_departamento)
        ->get();
        // dd($depa[0]->nombre);
        $d = $depa[0]->nombre;
        // dd($d);
        return view('charts.servicios_dep', compact('depa','total'));
    }
}
