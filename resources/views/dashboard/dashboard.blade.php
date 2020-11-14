@extends('partial.app')
@section('content')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">

            <section id="dashboard-analytics">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card bg-analytics text-white">
                            <div class="card-content">
                                <div class="card-body text-center">
                                    <img src="{{ asset('app-assets/images/elements/decore-left.png') }}" class="img-left" alt="card-img-left">
                                    <img src="{{ asset('app-assets/images/elements/decore-right.png') }}" class="img-right" alt="card-img-right">
                                    <div class="avatar avatar-xl bg-primary shadow mt-0">
                                        <div class="avatar-content">
                                            <i class="feather icon-home white font-large-1"></i>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <h1 class="mb-2 text-white">Welcome, {{session('nama')}}!</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card bg-white text-white">
                            <div class="card-content">
                                <div class="card-body text-center">
                                    <canvas id="horizontal-bar" width="400" height="500"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card bg-white text-white">
                            <div class="card-content">
                                <div class="card-body text-center">
                                    <canvas id="bar-chart" width="400" height="400"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                

            </section>

        </div>
    </div>
</div>
<!-- END: Content-->

@endsection


@section('js')
<script>

$(window).on("load", function () {

var $primary = '#7367F0';
var $success = '#28C76F';
var $danger = '#EA5455';
var $warning = '#FF9F43';
var $label_color = '#1E1E1E';
var grid_line_color = '#dae1e7';
var scatter_grid_color = '#f3f3f3';
var $scatter_point_light = '#D1D4DB';
var $scatter_point_dark = '#5175E0';
var $white = '#fff';
var $black = '#000';

var themeColors = [$primary, $success, $danger, $warning, $label_color];

    $.ajax({
        url: '/dashboard/chart',
        type: "GET",
        dataType: 'JSON',
        success: function( data, textStatus, jQxhr ){
            var barChartctx = $("#bar-chart");
            // Chart Options
            var barchartOptions = {
            // Elements options apply to all of the options unless overridden in a dataset
            // In this case, we are setting the border of each bar to be 2px wide
            elements: {
                rectangle: {
                borderWidth: 2,
                borderSkipped: 'left'
                }
            },
            responsive: true,
            maintainAspectRatio: false,
            responsiveAnimationDuration: 500,
            legend: { display: false },
            scales: {
                xAxes: [{
                display: true,
                gridLines: {
                    color: grid_line_color,
                },
                scaleLabel: {
                    display: true,
                }
                }],
                yAxes: [{
                display: true,
                gridLines: {
                    color: grid_line_color,
                },
                scaleLabel: {
                    display: true,
                },
                ticks: {
                    stepSize: 1000
                },
                }],
            },
            title: {
                display: true,
                text: 'Data Product'
            },

            };

            // Chart Data
            var barchartData = {
            labels: data.labelProduct,
            datasets: [{
                label: "Total Product",
                data: data.dataProduct,
                backgroundColor: themeColors,
                borderColor: "transparent"
            }]
            };

            var barChartconfig = {
            type: 'bar',

            // Chart Options
            options: barchartOptions,

            data: barchartData
            };



            // Create the chart
            var barChart = new Chart(barChartctx, barChartconfig);

            var horizontalChartctx = $("#horizontal-bar");

        var horizontalchartOptions = {
            // Elements options apply to all of the options unless overridden in a dataset
            // In this case, we are setting the border of each horizontal bar to be 2px wide
            elements: {
            rectangle: {
                borderWidth: 2,
                borderSkipped: 'right',
                borderSkipped: 'top',
            }
            },
            responsive: true,
            maintainAspectRatio: false,
            responsiveAnimationDuration: 500,
            legend: {
            display: false,
            },
            scales: {
            xAxes: [{
                display: true,
                gridLines: {
                color: grid_line_color,
                },
                scaleLabel: {
                display: true,
                }
            }],
            yAxes: [{
                display: true,
                gridLines: {
                color: grid_line_color,
                },
                scaleLabel: {
                display: true,
                }
            }]
            },
            title: {
            display: true,
            text: 'Most View Product'
            }
        };

        // Chart Data
        var horizontalchartData = {
            labels: data.labelClick,
            datasets: [{
            label: "Total Viewer",
            data: data.dataClick,
            backgroundColor: themeColors,
            borderColor: "transparent"
            }]
        };

        var horizontalChartconfig = {
            type: 'horizontalBar',

            // Chart Options
            options: horizontalchartOptions,

            data: horizontalchartData
        };

        // Create the chart
        var horizontalChart = new Chart(horizontalChartctx, horizontalChartconfig);
        
        },
        error: function( jqXhr, textStatus, errorThrown ){
            console.log( errorThrown );
            console.warn(jqXhr.responseText);
        },
    });

});
 

</script>
@endsection
