@extends('layouts.admin')

@section('content')


    <div class="row mt-3">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h5 class="header-title pb-3 mt-0">Division</h5>
                    <div id="division"></div>
                </div>
            </div>
        </div>

    </div>

@endsection
@push('script')
    <script>
        $(function () {

            Highcharts.chart('division', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Participant List Division wise'
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
                        text: 'Total Division'
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
                        name: "Division",
                        colorByPoint: true,
                        data: [
                                @foreach ($locations as $location)
                            {
                                name: {!! json_encode($location->name) !!},
                                y: {!! json_encode($location->participant_count) !!},

                            },
                            @endforeach

                        ]
                    }
                ]

            });

        });
    </script>
@endpush
