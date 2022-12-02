<?php

namespace App\Exports;

use App\Models\Solicitud;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\Object_;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ReportesExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $solicitud = DB::table('solicitudes')
            ->join('departamentos', 'solicitudes.id_departamento', '=', 'departamentos.id_departamento')
            ->join('users', 'solicitudes.id_user_asigna', '=', 'users.id')
            ->select('solicitudes.id_solicitud', 'solicitudes.nombre', 'solicitudes.descripcion', 'solicitudes.estado', 'users.name','departamentos.nombre as departamento')
            ->orderBy('solicitudes.id_solicitud', 'asc')
            ->get();

        return $solicitud;
        //return Solicitud::all();
    }

    public function headings(): array
    {
        return [
            'Id Solicitud',
            'Nombre',
            'Descripcion',
            'Estado',
            'Empleado',
            'Departamento',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]]

        ];
    }
}
