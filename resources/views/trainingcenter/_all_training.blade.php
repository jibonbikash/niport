<?php
/**
 * Created by  jibon Bikash Roy.
 * User: jibon
 * Date: 6/21/20
 * Time: 3:28 PM
 * Copyright jibon <jibon.bikash@gmail.com>
 */
?>
<div id="alltraining"></div>
@push('script')
    <script>
        $(function () {
            Highcharts.chart('alltraining', {
                chart: {
                    type: 'spline'
                },
                title: {
                    text: ''
                },

                xAxis: {
                    categories: [@foreach ($alltraining as $training) {!! json_encode($training->name) !!}, @endforeach]
                },
                yAxis: {
                    title: {
                        text: 'Course'
                    },

                },
                credits: {
                    enabled: false
                },
                tooltip: {
                    crosshairs: true,
                    shared: true
                },
                plotOptions: {
                    spline: {
                        marker: {
                            radius: 4,
                            lineColor: '#666666',
                            lineWidth: 1
                        }
                    }
                },
                series: [{
                    name: 'Course with Participant',
                    marker: {
                        symbol: 'square'
                    },
                    data: [@foreach ($alltraining as $training) {!! json_encode($training->participant_count) !!}, @endforeach]

                }],
            });

        });
    </script>
@endpush

