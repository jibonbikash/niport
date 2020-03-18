@extends('layouts.main')

@section('content')


    <div class="row mt-3">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h5 class="header-title pb-3 mt-0">Designation</h5>
                    <div id="designation"></div>
                </div>
            </div>
        </div>

    </div>

@endsection
@push('script')
    <script>
        $(function () {

            Highcharts.chart('designation', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Top Participant List Designation wise'
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
                        text: 'Total Participant'
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
                        name: "District",
                        colorByPoint: true,
                        data: [
                                @foreach ($designations as $designation)
                            {
                                name: {!! json_encode($designation->name) !!},
                                y: {!! json_encode($designation->participant_count) !!},

                            },
                            @endforeach

                        ]
                    }
                ]

            });

        });
    </script>
@endpush
