<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Reporte de solicitudes</title>
        <style>
            .tabla {
                width: 100%;
                border: 1px solid #000000;
            }
        </style>
    </head>
    <body>
        <h1 class="text-center">Reporte de solicitudes</h1><br>
        <h2>Solicitudes totales</h2>
        <table class="tabla">
            <thead>
                <tr>
                    <th>Id Solicitud</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Empleado</th>
                    <th>Departamento</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($solicitudes as $s)
                    <tr>
                        <td>{{ $s->id_solicitud }}</td>
                        <td>{{ $s->nombre }}</td>
                        <td>{{ $s->descripcion }}</td>
                        <td>{{ $s->estado }}</td>
                        <td>{{ $s->name }}</td>
                        <td>{{ $s->departamento }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table><br>

        <h2>Mantenimiento</h2>
        <p>Solicitudes pendientes de departamento de Mantenimiento: {{$penMan}}</p>
        <p>Calificaciones de las solicitudes de departamento de Mantenimiento: {{$caliMan}}</p>
        <br>
        
        <h2>IT</h2>
        <p>Solicitudes pendientes de departamento de IT: {{$penIt}}</p>
        <p>Calificaciones de las solicitudes de departamento de Mantenimiento: {{$caliIt}}</p>

    </body>
</html>