@extends('layouts.admin')

@section('content')

    <div class="pageheader pd-t-25 pd-b-35">
    <div class="pd-t-5 pd-b-5">
        <h1 class="pd-0 mg-0 tx-20">Dashboard</h1>
    </div>
    <div class="breadcrumb pd-0 mg-0">
        <a class="breadcrumb-item" href="">Dashboard</a>
        <span class="breadcrumb-item active">Trainer location</span>
    </div>
    <br />
    {!! Form::open(array('route' => 'district', 'method' => 'get')) !!}
    @include('layouts.themes.metricaladmin.datepicker')
    {!! Form::close() !!}

    <div class="row mt-3">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h5 class="header-title pb-3 mt-0">location</h5>
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
                    text: 'Participant List location wise'
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
                        text: 'Total percent'
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
