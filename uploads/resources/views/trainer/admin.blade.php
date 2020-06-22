<?php
/**
 * Created by  jibon Bikash Roy.
 * User: jibon
 * Date: 3/29/20
 * Time: 3:55 PM
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
            <span class="breadcrumb-item active">Trainer List </span>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h5 class="header-title pb-3 mt-0">Trainer List </h5>
                    {!! Form::open(array('route' => 'trainer.admin', 'method' => 'get')) !!}

                    <div class="row" id="yearsetting">
                        <div class="card card-accent-primary  mg-15">
                            <div class="card-header">Filter </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="name">Start Date</label>
                                            {!! Form::text('startdate', null, array('placeholder' => 'Start Date','class' => 'form-control startdate', 'autocomplete'=>'off', 'required')) !!}
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="mobile">End Date</label>
                                            {!! Form::text('enddate', null, array('placeholder' => 'End Date','class' => 'form-control enddate', 'autocomplete'=>'off', 'required')) !!}
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="mobile">Training Center </label>
                                            <select class="form-control" id="com_training_center_id" name="com_training_center_id">
                                                <option value=""></option>
                                                @foreach($trainingcenters as $trainingcenter)

                                                    <option value="{{$trainingcenter->com_training_center_id}}">{{$trainingcenter->training_center->name}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group mt-4">
                                            <button class="btn btn-purple btn-block mg-b-10" type="submit">Search</button>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>



                    </div>
                    {!! Form::close() !!}

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Designation</th>
            <th scope="col">organization</th>
            <th scope="col">NID</th>
            <th scope="col">email</th>
            <th scope="col">Phone/Mobile</th>
            <th scope="col">Place of Posting</th>
            <th scope="col">Total</th>

            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($trainers as $trainer)
            <tr>

                <td>{{ $trainer->trainer_name }}</td>
                <td>{{ $trainer->designation ? $trainer->designation->name:'' }}</td>
                <td>{{ $trainer->organization ? $trainer->organization->name:'' }}</td>
                <th>{{ $trainer->national_id }}</th>
                <td>{{ $trainer->email }}</td>
                <td>{{ $trainer->mobile_no }}</td>
                <td>{{ $trainer->place_of_posting }}</td>
                <td>
                    <button type="button" class="btn btn-primary">
                        Count Class <span class="badge badge-light">
                            {{--{{ $participant->participant_count }}--}}
                            <?php
                            echo count($trainer->session_detail);
                            ?>
                        </span>

                    </button>
                </td>

                <td> <a class="trainermodal" data-id="{{$trainer->id}}"  data-toggle="modal" href="#trainerModalshow{{$trainer->id}}" id="modellink{{$trainer->id}}">
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
            //   $( ".startdate" ).datepicker();
            $( ".startdate" ).datepicker({ dateFormat: 'yy-mm-dd' });
            $( ".enddate" ).datepicker({ dateFormat: 'yy-mm-dd' });
            //  $( ".enddate" ).datepicker();
            $('.startdate').datepicker('setDate', '2017-01-01');
            var var_setDate = $(this).datepicker('getDate');
            $(".enddate").datepicker("setDate",var_setDate );

            $(".yearsetting").click(function(){
                $("#yearsetting").toggle();
            });

        });

        $(document).ready(function() {
            $('.trainermodal').click(function(e) {
                var trainerId = $(this).attr("data-id");
                var url = '{{url("/")}}/admin/trainer/details/'+trainerId;
                $('.modal-container').load(url,function(result){
                    $(".modal-backdrop").remove();
                    $('#trainerModalshow'+trainerId).modal({show:true,  keyboard: false});
                });
            });

        });
    </script>
@endpush