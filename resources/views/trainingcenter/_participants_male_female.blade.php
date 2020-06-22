<?php
/**
 * Created by  jibon Bikash Roy.
 * User: jibon
 * Date: 6/21/20
 * Time: 1:12 PM
 * Copyright jibon <jibon.bikash@gmail.com>
 */
?>
<div id="sexration"></div>
@push('script')
    <script>
        $(function () {

//alert(dataClick);
            var totalFEMALE = {{ $totalFEMALE}};
            var totalTALE = {{ $totalTALE }};

            Highcharts.chart('sexration', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: ''
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                credits: {
                    enabled: false
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                        }
                    }
                },
                series: [{
                    name: 'Brands',
                    colorByPoint: true,
                    data: [{
                        name: 'Male',
                        y: totalTALE,
                        sliced: true,
                        selected: true
                    }, {
                        name: 'Female',
                        y: totalFEMALE
                    }]
                }]
            });




        });
    </script>
@endpush
