@extends('layouts.app')

@section('content')
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span id="card_title">
                            <h2 class="display-8">{{ __('Reportes de servicios') }}</h2>
                        </span>
                    </div>
                </div>
                <div class="card-body">
                        <div id="chart-servicios" class="chart">

                        </div><br>
                        <div id="chart-pendientes" class="chart">

                        </div>
                        <div id="chart-calis" class="chart">

                        </div>
                </div>
            </div><br>
            
            
            
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-16">
                        <div class="container text-center">
                            <h1 class="display-4">Exportar datos</h1><br>
                            <div class="row">
                                <div class="col-6">
                                    <div class="info-box bg-success">
                                        <span class="info-box-icon"><i class="far fa-file-excel"></i></span>
                                        <div class="info-box-content">
                                          <span class="info-box-text">Exportar datos en Excel</span>
                                          <span class="info-box-number">Clic en el boton para descargar el reporte en Excel de los empleados</span><br>
                                          <a class="btn btn-light" href="{{ route('reporteExcel') }}"><i class="fa fa-fw fa-download"></i>  Descargar Excel</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="info-box bg-danger">
                                        <span class="info-box-icon"><i class="far fa-file-pdf"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Exportar datos en PDF</span>
                                            <span class="info-box-number">Clic en el boton para descargar el reporte en Excel de los empleados</span><br>
                                            <a class="btn btn-light" href="{{ route('reportePdf') }}"><i class="fa fa-fw fa-download"></i>  Descargar PDF</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>

        <script> 
            Highcharts.chart('chart-servicios', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Solicitudes finalizadas en todos los departamentos'
            },
            subtitle: {
                text: 'Cantidad total de todas las solicitudes que fueron finalizadas por cada mes'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                text: 'Cantidad de solicitudes'
                }
            },
            plotOptions: {
                line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
                }
            },
            series: [{
                name: 'Mantenimiento',
                data: @json($mantenimiento)
            }, {
                name: 'IT',
                data: @json($it)
            }]
            });
        </script>
        
        <script> 
            Highcharts.chart('chart-pendientes', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Solicitudes pendientes en todos los departamentos'
            },
            subtitle: {
                text: 'Cantidad total de todas las solicitudes que están pendientes por cada mes'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                text: 'Cantidad de solicitudes'
                }
            },
            plotOptions: {
                line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
                }
            },
            series: [{
                name: 'Mantenimiento',
                data: @json($penMantenimiento)
            }, {
                name: 'IT',
                data: @json($penIt)
            }]
            });
        </script>

        <script>   
            Highcharts.chart('chart-calis', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Calificaciones de solicitudes finalizadas en todos los departamentos'
            },
            subtitle: {
                text: 'Cantidad total de todas las solicitudes que fueron finalizadas por cada mes'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                text: 'Calificación'
                }
            },
            plotOptions: {
                line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
                }
            },
            series: [{
                name: 'Mantenimiento',
                data: @json($calificacionMantenimiento)
            }, {
                name: 'IT',
                data: @json($calificacionIt)
            }]
            });
        </script>
@endsection