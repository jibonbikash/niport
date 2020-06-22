<?php
/**
 * Created by  jibon Bikash Roy.
 * User: jibon
 * Date: 3/30/20
 * Time: 2:37 PM
 * Copyright jibon <jibon.bikash@gmail.com>
 */
?>
@extends('layouts.admin')

@section('content')
    <div class="pageheader pd-t-25 pd-b-35">
        <div class="pd-t-5 pd-b-5">
            <h1 class="pd-0 mg-0 tx-20">Dashboard</h1>
        </div>
        <div class="breadcrumb pd-0 mg-0">
            <a class="breadcrumb-item" href="">Dashboard</a>
            <span class="breadcrumb-item active">Report </span>
        </div>
    </div>

    <div class="row row-xs clearfix">
        <div class="col-lg-12 col-xl-12 col-12">
            <div class="card mg-b-20">
                <div class="card-header">
                    <h4 class="card-header-title">
                        Summary
                    </h4>

                </div>

                <div class="card-body pd-t-0 pd-b-20 mt-3">
                    <div id="graphlist">
                    <div class="row mt-3">
                        <!-- Column -->
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <div class="d-flex flex-row">
                                        <div class="col-3 align-self-center">
                                            <div class="round">
                                                <i class="fas fa-calendar-week fa-lg"></i>
                                            </div>
                                        </div>
                                        <div class="col-6 align-self-center text-center">
                                            <div class="m-l-10">
                                                <h5 class="mt-0 round-inner text-dark">{{ $course }}</h5>
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
                                                <i class="fas fa-clipboard-list fa-lg"></i>
                                            </div>
                                        </div>
                                        <div class="col-6 text-center align-self-center">
                                            <div class="m-l-10 ">
                                                <h5 class="mt-0 round-inner text-dark">{{ $batch }}</h5>
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
                                                <i class="fas fa-users fa-lg"></i>
                                            </div>
                                        </div>
                                        <div class="col-6 align-self-center text-center">
                                            <div class="m-l-10 ">
                                                <h5 class="mt-0 round-inner text-dark"><?=$totalparticipant?></h5>
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
                                                <i class="fas fa-chalkboard-teacher fa-lg"></i>
                                            </div>
                                        </div>
                                        <div class="col-6 align-self-center text-center">
                                            <div class="m-l-10">
                                                <h5 class="mt-0 round-inner text-dark">{{ $trainer }}</h5>
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


                        <div class="row mt-3">
                            <div class="col-md-12 col-lg-12 col-xl-4">
                                <div class="card">
                                    <h5 class="card-header">Participant list division wise</h5>
                                    <div class="card-body">
                                        @include('trainingcenter._participants_division',[
                               'locations'=>$locations,
                    ])
                                    </div>
                                </div>


                            </div>

                            <div class="col-md-12 col-lg-12 col-xl-4">
                                <div class="card">
                                    <h5 class="card-header">Participants sex ratio</h5>
                                    <div class="card-body">
                                        @include('trainingcenter._participants_male_female',[
                              'totalFEMALE'=>$totalFEMALE,
                           'totalTALE'=>$totalTALE,
                    ])
                                    </div>
                                </div>


                            </div>

                            <div class="col-md-12 col-lg-12 col-xl-4">
                                <div class="card">
                                    <h5 class="card-header">Course list with participants</h5>
                                    <div class="card-body">
                                        @include('trainingcenter._courselist_larticipants',[
                             'courses'=>$courses
                    ])
                                    </div>
                                </div>


                            </div>

                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12 col-lg-12 col-xl-4">
                                <div class="card">
                                    <h5 class="card-header">Completed Training</h5>
                                    <div class="card-body">
                                        @include('trainingcenter._completed_training',[
                                'completed'=>$completed,
                    ])
                                    </div>
                                </div>


                            </div>

                            <div class="col-md-12 col-lg-12 col-xl-4">
                                <div class="card">
                                    <h5 class="card-header">Ongong Training</h5>
                                    <div class="card-body">
                                        @include('trainingcenter._ongoing_training',[
                                'ongoing'=>$ongoing,
                    ])
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-12 col-lg-12 col-xl-4">
                                <div class="card">
                                    <h5 class="card-header">All Training</h5>
                                    <div class="card-body">
                                        @include('trainingcenter._all_training',[
                                'alltraining'=>$alltraining,
                    ])
                                    </div>
                                </div>


                            </div>

                        </div>

                </div>

            </div>

        </div>
    </div>
        <div class="setting-sidebar" id="demoSettingSidebar">
            <div class="wrapper" id="demoSettingSidebarScroll">
                <a class="demo-settings-icon" id="demoSettingSidebarTrigger" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-settings tx-16"></i>
                </a>
                <div class="card">
                    <div class="card-header">
                        Searach
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Traing Center</label>
                                    </div>
                                    <select class="custom-select" id="trainingcenter">
                                        <option value="" selected="">Choose...</option>
                                        <?php
                                        $training_centers = \App\User::with(['training_center'])->role('TrainigCenter')->get();

                                        ?>
                                        @foreach($training_centers as $trainingcenters)
                                            <option value="{{ $trainingcenters->com_training_center_id }}">{{ $trainingcenters->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 mt-2">


                                <input id="start_date1" type="text" class="form-control start_date1" placeholder="Start Date">

                            </div>
                            <div class="col-md-12 mt-2">


                                <input type="text" id="enddate" class="form-control" placeholder="End Date" >

                            </div>
                            <div class="col-md-12 mt-2">

                                <button class="btn btn-primary btn-block mg-b-10" id="search">Search</button>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
@endsection
        @push('script')
            <script>
                $.ajaxSetup({

                    headers: {

                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                    }

                });


                $(function () {
                    $("#startdate").datepicker({dateFormat: 'yy-mm-dd'});
                    $("#start_date1").datepicker({dateFormat: 'yy-mm-dd'});
                    $("#enddate").datepicker({dateFormat: 'yy-mm-dd'});
                    $('#start_date1').datepicker('setDate', '2017-01-01');


                    $("#search").click(function(e){
                        e.preventDefault();
                        let startdate = $("#start_date1").val();
                        let enddate = $("#enddate").val();
                        let trainingcenter = $("#trainingcenter").val();
                        let _token   = $('meta[name="csrf-token"]').attr('content');
                        console.log(trainingcenter);
                        console.log(startdate);
                        console.log(enddate);


                        $.ajax({
                            type: 'get',
                            url: "{{ route('trainingcenterindfo') }}",
                            data: {startdate: startdate,
                                enddate: enddate,
                                trainingcenter: trainingcenter,
                            },
                            success: function (data) {
                                $("#graphlist").html(data);
                                console.log(data);

                            }

                        });

                    });

                });
            </script>
    @endpush