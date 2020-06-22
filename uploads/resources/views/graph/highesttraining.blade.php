@extends('layouts.admin')

@section('content')
    <div class="pageheader pd-t-25 pd-b-35">
        <div class="pd-t-5 pd-b-5">
            <h1 class="pd-0 mg-0 tx-20">Dashboard</h1>
        </div>
        <div class="breadcrumb pd-0 mg-0">
            <a class="breadcrumb-item" href="">Dashboard</a>
            <span class="breadcrumb-item active">Training Receiver</span>
        </div>
        <br />
        {!! Form::open(array('route' => 'highesttraining', 'method' => 'get')) !!}
        @include('layouts.themes.metricaladmin.datepicker')
        {!! Form::close() !!}

    <div class="row mt-3">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h5 class="header-title pb-3 mt-0">Top Highest Training Receiver</h5>
                    <div id="highesttraining"></div>
                </div>
            </div>
        </div>

    </div>
        <div class="row mt-3">
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h5 class="header-title pb-3 mt-0">Top Highest Training Receiver List View </h5>

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Batch Name</th>
                                <th scope="col">Course Name</th>
                                <th scope="col">Name of Trainee</th>
                                <th scope="col">NID</th>
                                <th scope="col">Designation</th>
                                <th scope="col">Phone/Mobile</th>
                                <th scope="col">Total</th>

                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($highesttrainings as $participant)
                                <tr>

                                    <td>{{ $participant->batch_name }}</td>
                                    <td>{{ $participant->course_name }}</td>
                                    <td>{{ $participant->name }}</td>
                                    <th>{{ $participant->nid }}</th>
                                    <td>{{ $participant->designation_name }}</td>
                                    <td>{{ $participant->mobile_no }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary">
                                            Count <span class="badge badge-light">{{ $participant->participant_count }}</span>

                                        </button>
                                    </td>

                                    <td> <a class="participantmodal" data-id="{{$participant->id}}"  data-toggle="modal" href="#participantModalshow{{$participant->id}}" id="modellink{{$participant->id}}">
                                            <i class="fa fa-book"></i> Details
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
        <div class="modal-container"></div>
@endsection
@push('script')
    <script>
        $(function () {

            Highcharts.chart('highesttraining', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Top Highest Training Receiver '
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
                        name: "Highest Training",
                        colorByPoint: true,
                        data: [
                                @foreach ($highesttrainings as $highesttraining)
                            {
                                name: {!! json_encode($highesttraining->name) !!},
                                y: {!! json_encode($highesttraining->participant_count) !!},

                            },
                            @endforeach

                        ]
                    }
                ]

            });

        });

        $(document).ready(function() {
            $('.participantmodal').click(function(e) {
                var participantId = $(this).attr("data-id");
                var url = '{{url("/")}}/participant/'+participantId;
                $('.modal-container').load(url,function(result){
                    $(".modal-backdrop").remove();
                    $('#participantModalshow'+participantId).modal({show:true, backdrop: 'static', keyboard: false});
                });
            });

        });


    </script>
@endpush
