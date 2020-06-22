@extends('layouts.main')

@section('content')

    <div class="row mt-3">
        <!-- Column -->
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="mdi mdi-webcam"></i>
                            </div>
                        </div>
                        <div class="col-6 align-self-center text-center">
                            <div class="m-l-10">
                                <h5 class="mt-0 round-inner">{{ $course }}</h5>
                                <p class="mb-0 text-muted">Total Training</p>
                            </div>
                        </div>
                        <div class="col-3 align-self-end align-self-center">
                            <h6 class="m-0 float-right text-center text-danger">  </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="mdi mdi-account-box-outline"></i>
                            </div>
                        </div>
                        <div class="col-6 text-center align-self-center">
                            <div class="m-l-10 ">
                                <h5 class="mt-0 round-inner">{{ $batch }}</h5>
                                <p class="mb-0 text-muted">Total Batch</p>
                            </div>
                        </div>
                        <div class="col-3 align-self-end align-self-center">
                            <h6 class="m-0 float-right text-center text-success">  </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                            <div class="round ">
                                <i class="mdi mdi-account-multiple-plus"></i>
                            </div>
                        </div>
                        <div class="col-6 align-self-center text-center">
                            <div class="m-l-10 ">
                                <h5 class="mt-0 round-inner"><?=$totalparticipant?></h5>
                                <p class="mb-0 text-muted">Total Participants </p>
                            </div>
                        </div>
                        <div class="col-3 align-self-end align-self-center">
                            <h6 class="m-0 float-right text-center text-danger"> </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="mdi mdi-rocket"></i>
                            </div>
                        </div>
                        <div class="col-6 align-self-center text-center">
                            <div class="m-l-10">
                                <h5 class="mt-0 round-inner">{{ $trainer }}</h5>
                                <p class="mb-0 text-muted">Total Trainer</p>
                            </div>
                        </div>
                        <div class="col-3 align-self-end align-self-center">
                            <h6 class="m-0 float-right text-center text-success">  </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-6">
            <div class="card m-b-30">
                <div class="card-body">
                    <h5 class="header-title pb-3 mt-0">Division</h5>
                    <div id="division"></div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-12 col-xl-6">
            <div class="card m-b-30">
                <div class="card-body">

                    <h5 class="header-title mt-0 pb-3">Sex ratio</h5>


                    <div id="container"></div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('script')
<script>
    $(function () {

//alert(dataClick);
    var totalFEMALE = {{ $totalFEMALE}};
    var totalTALE = {{ $totalTALE }};

    Highcharts.chart('container', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Sex Raion of participants'
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
                    text: 'Total percent market share'
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
