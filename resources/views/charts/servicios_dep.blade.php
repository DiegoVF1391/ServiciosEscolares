@extends('layouts.app')

@section('content')

            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Reporte de servicios') }}
                        </span>
                    </div>
                </div>
                <div class="card-body">
                        <div id="container">

                        </div>
                    
                </div>
            </div>

        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>

        <script> 
            // Data retrieved https://en.wikipedia.org/wiki/List_of_cities_by_average_temperature
        Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Solicitudes finalizadas en departamento' 
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
            name: '',
            data: @json($total)
        }]
        });
        </script>
@endsection