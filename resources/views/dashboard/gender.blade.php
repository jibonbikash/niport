@extends('layouts.main')

@section('content')


    <div class="row mt-3">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h5 class="header-title pb-3 mt-0">Gender</h5>
                    <div id="gender"></div>
                </div>
            </div>
        </div>

    </div>

@endsection
@push('script')
    <script>
        $(function () {

            var totalFEMALE = {{ $totalFEMALE}};
            var totalTALE = {{ $totalTALE }};

            Highcharts.chart('gender', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Sex ratio of participants'
                },
                credits: {
                    enabled: false
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
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
