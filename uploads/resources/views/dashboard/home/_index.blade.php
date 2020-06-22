

<div class="row row-xs clearfix">
        <div class="col-sm-6 col-xl-3">
            <div class="card mg-b-20">
                <div class="card-body pd-y-0">
                    <div class="custom-fieldset mb-4">
                        <div class="clearfix">
                            <label> Male</label>
                        </div>
                        <div class="d-flex align-items-center text-dark">
                            <div class="wd-40 wd-md-50 ht-40 ht-md-50 mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded card-icon-warning">
                                <i class="fa fa-male tx-warning tx-20"></i>

                            </div>
                            <div>
                                <h2 class="tx-20 tx-sm-18 tx-md-24 mb-0 mt-2 mt-sm-0 tx-normal tx-rubik tx-dark"><span class="counter">{{ $totalTMALE }}</span></h2>
                                <div class="d-flex align-items-center tx-gray-500"><span class="text-success mr-2 d-flex align-items-center"></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card mg-b-20">
                <div class="card-body pd-y-0">
                    <div class="custom-fieldset mb-4">
                        <div class="clearfix">
                            <label> Female</label>
                        </div>
                        <div class="d-flex align-items-center text-dark">
                            <div class="wd-40 wd-md-50 ht-40 ht-md-50 mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded card-icon-success">
                                <i class="fa fa-female tx-success tx-20"></i>
                            </div>
                            <div>
                                <h2 class="tx-20 tx-sm-18 tx-md-24 mb-0 mt-2 mt-sm-0 tx-normal tx-rubik tx-dark"><span class="counter">{{ $totalFEMALE }}</span></h2>
                                <div class="d-flex align-items-center tx-gray-500"><span class="text-danger mr-2 d-flex align-items-center"></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card mg-b-20">
                <div class="card-body pd-y-0">
                    <div class="custom-fieldset mb-4">
                        <div class="clearfix">
                            <label>Total batch</label>
                        </div>
                        <div class="d-flex align-items-center text-dark">
                            <div class="wd-40 wd-md-50 ht-40 ht-md-50 mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded card-icon-primary">
                                <i class="icon-handbag tx-primary tx-20"></i>
                            </div>
                            <div>
                                <h2 class="tx-20 tx-sm-18 tx-md-24 mb-0 mt-2 mt-sm-0 tx-normal tx-rubik tx-dark"><span class="counter">{{ $batch }}</span></h2>
                                <div class="d-flex align-items-center tx-gray-500"><span class="text-success mr-2 d-flex align-items-center"></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card mg-b-20">
                <div class="card-body pd-y-0">
                    <div class="custom-fieldset mb-4">
                        <div class="clearfix">
                            <label>Total Course</label>
                        </div>
                        <div class="d-flex align-items-center text-dark">
                            <div class="wd-40 wd-md-50 ht-40 ht-md-50 mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded card-icon-danger">
                                <i class="icon-speedometer tx-danger tx-20"></i>
                            </div>
                            <div>
                                <h2 class="tx-20 tx-sm-18 tx-md-24 mb-0 mt-2 mt-sm-0 tx-normal tx-rubik tx-dark"><span class="counter">{{ $course }}</span></h2>
                                <div class="d-flex align-items-center tx-gray-500"><span class="text-danger mr-2 d-flex align-items-center"></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="row row-xs clearfix">
    <div class="col-lg-12 col-xl-12 col-12">
        <div class="card mg-b-20">
            <div class="card-header">
                <h4 class="card-header-title">
                    Timing of trainings organized
                </h4>
                <div class="card-header-btn">
                    <a  href="#" data-toggle="collapse" class="btn card-collapse" data-target="#upcomingReports" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                    <a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
                    <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>

                </div>
            </div>
            <div class="collapse show" id="upcomingReports">
                <div class="card-body pd-t-0 pd-b-20">
                    <div class="d-block clearfix">
                        <div class="row">
                            <div class="col-md-4">
                                <button type="button" class="btn btn-primary btn-lg btn-block">
                                    {{ date('F, Y', strtotime($monthstart)) }} -  {{ date('F, Y', strtotime($first4month)) }}:  <span class="badge badge-light" style="font-size: 22px;"><strong>{{ $countfrst4month }}</strong></span>
                                </button>
                            </div>
                            <div class="col-md-4">
                                <button type="button" class="btn btn-primary btn-lg btn-block">
                                    {{ date('F, Y', strtotime($first4month)) }} -  {{ date('F, Y', strtotime($second4month)) }}: <span class="badge badge-light" style="font-size: 22px;">{{ $countsecond4month }}</span>
                                </button>
                            </div>
                            <div class="col-md-4">
                                <button type="button" class="btn btn-primary btn-lg btn-block">
                                    {{ date('F, Y', strtotime($second4month)) }} -  {{ date('F, Y', strtotime($last4month)) }}:  <span class="badge badge-light" style="font-size: 22px;"><strong>{{ $countlast4month }}</strong></span>
                                </button>

                            </div>
                        </div>





                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!--/ Count Card End -->
    <div class="row row-xs clearfix">
        <!--================================-->
        <!--  Annual Report Start-->
        <!--================================-->
        <div class="col-lg-12 col-xl-4 col-12">
            <div class="card mg-b-20">
                <div class="card-header">
                    <h4 class="card-header-title">
                        Gender Ratio of participants
                    </h4>
                    <div class="card-header-btn">
                        <a  href="#" data-toggle="collapse" class="btn card-collapse" data-target="#sexReports" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                        <a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
                        <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>

                    </div>
                </div>
                <div class="collapse show" id="sexReports">
                    <div class="card-body pd-t-0 pd-b-20">
                        <div class="d-block clearfix">
                            <div id="sexratio"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-xl-4 col-12">
            <div class="card mg-b-20">
                <div class="card-header">
                    <h4 class="card-header-title">
                        Participant List District wise
                    </h4>
                    <div class="card-header-btn">
                        <a  href="#" data-toggle="collapse" class="btn card-collapse" data-target="#districtReports" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                        <a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
                        <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>

                    </div>
                </div>
                <div class="collapse show" id="districtReports">
                    <div class="card-body pd-t-0 pd-b-20">
                        <div class="d-block clearfix">
                            <div id="division"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-xl-4 col-12">
            <div class="card mg-b-20">
                <div class="card-header">
                    <h4 class="card-header-title">
                        Designation wise Participants
                    </h4>
                    <div class="card-header-btn">
                        <a  href="#" data-toggle="collapse" class="btn card-collapse" data-target="#DesignationReports" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                        <a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
                        <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>

                    </div>
                </div>
                <div class="collapse show" id="DesignationReports">
                    <div class="card-body pd-t-0 pd-b-20">
                        <div class="d-block clearfix">
                            <div id="training"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Annual Report End -->
        <!--================================-->
        <!-- Sales+Order+Revenue  Start -->
        <!--================================-->

    </div>
    <div class="row row-xs clearfix">
        <!--================================-->
        <!--  Annual Report Start-->
        <!--================================-->
        <div class="col-lg-12 col-xl-4 col-12">
            <div class="card mg-b-20">
                <div class="card-header">
                    <h4 class="card-header-title">
                        Completed Training
                    </h4>
                    <div class="card-header-btn">
                        <a  href="#" data-toggle="collapse" class="btn card-collapse" data-target="#completedReports" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                        <a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
                        <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>

                    </div>
                </div>
                <div class="collapse show" id="completedReports">
                    <div class="card-body pd-t-0 pd-b-20">
                        <div class="d-block clearfix">
                            <div id="completed"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-xl-4 col-12">
            <div class="card mg-b-20">
                <div class="card-header">
                    <h4 class="card-header-title">
                        Ongoing Training
                    </h4>
                    <div class="card-header-btn">
                        <a  href="#" data-toggle="collapse" class="btn card-collapse" data-target="#ongoingtrainingReports" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                        <a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
                        <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>

                    </div>
                </div>
                <div class="collapse show" id="ongoingtrainingReports">
                    <div class="card-body pd-t-0 pd-b-20">
                        <div class="d-block clearfix">
                            <div id="ongoingtraining"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-xl-4 col-12">
            <div class="card mg-b-20">
                <div class="card-header">
                    <h4 class="card-header-title">
                        Upcoming Training
                    </h4>
                    <div class="card-header-btn">
                        <a  href="#" data-toggle="collapse" class="btn card-collapse" data-target="#upcomingReports" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                        <a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
                        <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>

                    </div>
                </div>
                <div class="collapse show" id="upcomingReports">
                    <div class="card-body pd-t-0 pd-b-20">
                        <div class="d-block clearfix">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Annual Report End -->
        <!--================================-->
        <!-- Sales+Order+Revenue  Start -->
        <!--================================-->

    </div>

@push('script')
    <script>
        $(function () {

//alert(dataClick);
            var totalFEMALE = {{ $totalFEMALE}};
            var totalTALE = {{ $totalTMALE }};

            Highcharts.chart('sexratio', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Gender Raio'
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
                    text: 'Participant List District wise'
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


            Highcharts.chart('training', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Course List With Participants'
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


            Highcharts.chart('completed', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Completed Training'
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
                        name: "Training",
                        colorByPoint: true,
                        data: [
                                @foreach ($completed as $complete)
                            {
                                name: {!! json_encode($complete->name) !!},
                                y: {!! json_encode($complete->participant_count) !!},

                            },
                            @endforeach

                        ]
                    }
                ]

            });

            Highcharts.chart('ongoingtraining', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Ongoing Training'
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
                        name: "Training",
                        colorByPoint: true,
                        data: [
                                @foreach ($ongoing as $ongoingtraining)
                            {
                                name: {!! json_encode($ongoingtraining->name) !!},
                                y: {!! json_encode($ongoingtraining->participant_count) !!},

                            },
                            @endforeach

                        ]
                    }
                ]

            });



        });
    </script>
@endpush
