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
                    <h5 class="header-title pb-3 mt-0">Trainer List</h5>
                    {!! Form::open(array('route' => 'trainer.index', 'method' => 'get')) !!}
                    @include('layouts.themes.metricaladmin.datepicker')
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
                        Count <span class="badge badge-light">
                            {{--{{ $participant->participant_count }}--}}
                            <?php
                            echo count($trainer->session_detail);
                            ?>
                        </span>

                    </button>
                </td>

                <td> <a class="participantmodal" data-id="{{$trainer->id}}"  data-toggle="modal" href="#participantModalshow{{$trainer->id}}" id="modellink{{$trainer->id}}">
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
@endsection

