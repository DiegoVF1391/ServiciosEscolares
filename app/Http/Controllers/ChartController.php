<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;
use App\Models\Solicitud;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\Object_;

class ChartController extends Controller
{
    public function serviciosAdmin(){
        /*$serviciosTotales = Solicitud::select(
            DB::raw("EXTRACT(MONTH FROM updated_at) as month"),
            DB::raw('COUNT(id_solicitud) as count'))
            ->where('estado', '=', 'atendida')
            ->groupBy('month')
            ->get()
            ->toArray();
        $counts = array_fill(0, 12, 0);
        foreach($serviciosTotales as $s){
            $index = $s['month']-1;
            $counts[$index] = $s['count'];
        }*/

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



        return view('charts.servicios_admin', compact('mantenimiento', 'it'));
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
