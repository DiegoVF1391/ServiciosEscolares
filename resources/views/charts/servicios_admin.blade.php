@extends('layouts.app')

@section('content')
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Reportes de servicios') }}
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
            type: 'line'
        },
        title: {
            text: 'Solicitudes finalizadas en todos los departamentos'
        },
        subtitle: {
            text: 'Source: ' +
            '<a href="https://en.wikipedia.org/wiki/List_of_cities_by_average_temperature" ' +
            'target="_blank">Wikipedia.com</a>'
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
            name: 'Solicitudes registradas',
            data: @json($counts)
        }/*, {
            name: 'Tallinn',
            data: [-2.9, -3.6, -0.6, 4.8, 10.2, 14.5, 17.6, 16.5, 12.0, 6.5,
            2.0, -0.9]
        }*/]
        });
        </script>
@endsection