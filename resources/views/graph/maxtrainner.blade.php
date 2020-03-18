@extends('layouts.main')

@section('content')


    <div class="row mt-3">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h5 class="header-title pb-3 mt-0">Maximum conducted trainer</h5>
                    <div id="highesttraining"></div>
                </div>
            </div>
        </div>

    </div>

@endsection
@push('script')
    <script>
        $(function () {

            Highcharts.chart('highesttraining', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Maximum conducted trainer '
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
                        text: 'Total training'
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
                        name: "Highest Training",
                        colorByPoint: true,
                        data: [
                                @foreach ($maxtrainners as $maxtrainner)
                            {
                                name: {!! json_encode($maxtrainner->trainer_name) !!},
                                y: {!! json_encode($maxtrainner->trainer_count) !!},

                            },
                            @endforeach

                        ]
                    }
                ]

            });

        });
    </script>
@endpush
