<?php
/**
 * Created by  jibon Bikash Roy.
 * User: jibon
 * Date: 6/21/20
 * Time: 1:51 PM
 * Copyright jibon <jibon.bikash@gmail.com>
 */
?>
<div id="courselist"></div>
@push('script')
    <script>
        $(function () {

            Highcharts.chart('courselist', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: ''
                },
                credits: {
                    enabled: false
                },
                accessibility: {
                    announceNewData: {
                        enabled: true
                    }
                },
                xAxis: {
                    type: 'category'
                },
                yAxis: {
                    title: {
                        text: 'Total Training'
                    }

                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
//   format: '{point.y:.1f}'
                        }
                    }
                },

                tooltip: {
                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> of total<br/>'
                },

                series: [
                    {
                        name: "Training",
                        colorByPoint: true,
                        data: [
                                @foreach ($courses as $course)
                            {
                                name: {!! json_encode($course->name) !!},
                                y: {!! json_encode($course->participant_count) !!},

                            },
                            @endforeach

                        ]
                    }
                ]

            });


        });
    </script>
@endpush