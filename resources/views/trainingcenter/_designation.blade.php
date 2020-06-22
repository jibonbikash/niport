<?php
/**
 * Created by  jibon Bikash Roy.
 * User: jibon
 * Date: 6/22/20
 * Time: 1:01 PM
 * Copyright jibon <jibon.bikash@gmail.com>
 */
?>

<div id="designation"></div>
@push('script')
    <script>
        $(function () {
            Highcharts.chart('designation', {
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
                        text: 'Total Participants'
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
                        name: "Designation",
                        colorByPoint: true,
                        data: [
                                @foreach ($designations as $designation)
                            {
                                name: {!! $designation->name !!},
                                y: {!! $designation->dparticipant_count !!},

                            },
                            @endforeach

                        ]
                    }
                ]

            });

        });
    </script>
@endpush
