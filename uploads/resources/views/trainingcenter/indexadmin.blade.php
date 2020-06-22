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
                        Training Center List
                    </h4>

                </div>

                <div class="card-body pd-t-0 pd-b-20 mt-3">

                    <div class="row">
                        @foreach($training_centerlist as $trainingcenters)
                            <div class="col-md-3">

                                <div class="card mg-b-20">
                                    <div class="card-header">
                                        <h4 class="card-header-title">
                                            {{ $trainingcenters->name }}
                                        </h4>

                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered">

                                            <tbody>
                                            <tr>
                                                <th>Name</th>
                                                <td>{{ $trainingcenters->name }}</td>

                                            </tr>
                                            <tr>
                                                <th>location</th>
                                                <td>{{ $trainingcenters->training_center ? $trainingcenters->training_center->location: '' }}</td>

                                            </tr>
                                            <tr>
                                                <th>phone_no</th>
                                                <td>{{ $trainingcenters->training_center ? $trainingcenters->training_center->phone_no: '' }}</td>

                                            </tr>
                                            <tr>
                                                <th>address</th>
                                                <td>{{ $trainingcenters->training_center ? $trainingcenters->training_center->address: '' }}</td>

                                            </tr>

                                            <tr>
                                                <th>email</th>
                                                <td>{{ $trainingcenters->email }}</td>

                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <a href="{{ route('center.details', ['id' => $trainingcenters->com_training_center_id]) }}" class="btn btn-primary btn-lg btn-block" target="_blank">Details </a>

                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>

                                    </div>

                                </div>



                            </div>


                        @endforeach


                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection
