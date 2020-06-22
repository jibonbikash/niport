<?php
/**
 * Created by  jibon Bikash Roy.
 * User: jibon
 * Date: 3/30/20
 * Time: 5:08 PM
 * Copyright jibon <jibon.bikash@gmail.com>
 */
?>


@extends('layouts.admin')

@section('content')


    <div class="row mt-3">
        <div class="col-md-12 col-lg-12 col-xl-12">

            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="header-title pb-3 mt-0">Batch/Course Pre/post Test</h5>


                </div>

                <div class="card-body">
                    {!! Form::open(array('route' => 'trainer.preprotest', 'method' => 'get')) !!}


                    <div class="row">
                        {{--<div class="col-4">--}}
                            {{--<div class="form-group">--}}
                                {{--<label for="batch_id">Batch</label>--}}
                                {{--{!! Form::select('batch_id', [null=>'Please Select'] + $batcheslist, null, ['class' => 'form-control']) !!}--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="col-4">
                            <div class="form-group">
                                <label for="course_id">Course</label>
                                {!! Form::select('course_id', [null=>'Please Select'] + $courseslist, null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-4 mt-4">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                    {!! Form::close() !!}

                    <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>

                            <th scope="col">#</th>
                            <th scope="col">Training Center</th>
                            <th scope="col">Batch</th>
                            <th scope="col">Course</th>
                            <th scope="col">Course Description</th>
                            <th scope="col">Duration</th>
                            <th scope="col">Objective</th>
                            <th scope="col">Post Test Mark</th>
                            <th scope="col">Pre Test Mark</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $batches as $index => $batch)
                            <tr>

                                <td>{{ ++$index }}</td>
                                <td>{{ $batch->training_center ? $batch->training_center->name :'' }}</td>
                                <td>{{ $batch->name }}</td>
                                <td>{{ $batch->Course ? $batch->Course->name :'' }}</td>
                                <td>{{ $batch->Course ? $batch->Course->description:'' }}</td>
                                <td>{{ $batch->Course ? $batch->Course->duration:'' }}</td>
                                <td>{{ $batch->Course ? $batch->Course->objective:'' }}</td>
                                <td>{{ $batch->Course ? $batch->Course->post_test_mark :'' }}</td>
                                <td>{{ $batch->Course ? $batch->Course->pre_test_mark:'' }}</td>

                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                        {{ $batches->appends(Request::all())->links() }}

                </div>

                </div>
            </div>
        </div>
    </div>

@endsection