<?php
/**
 * Created by  jibon Bikash Roy.
 * User: jibon
 * Date: 6/22/20
 * Time: 10:45 AM
 * Copyright jibon <jibon.bikash@gmail.com>
 */
?>
@extends('layouts.blank')

@section('content')
<div class="row mt-3">
    <!-- Column -->
    <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="col-3 align-self-center">
                        <div class="round">
                            <i class="fas fa-male fa-lg"></i>
                        </div>
                    </div>
                    <div class="col-9 align-self-center text-center">
                        <div class="m-l-10">
                            <h5 class="mt-0 round-inner text-dark">{{$totalTALE}}</h5>
                            <p class="mb-0 text-muted">Male</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="col-3 align-self-center">
                        <div class="round">
                            <i class="fas fa-male fa-lg"></i>
                        </div>
                    </div>
                    <div class="col-9 align-self-center text-center">
                        <div class="m-l-10">
                            <h5 class="mt-0 round-inner text-dark">{{$totalFEMALE}}</h5>
                            <p class="mb-0 text-muted">Female</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="col-3 align-self-center">
                        <div class="round">
                            <i class="fas fa-clipboard-list fa-lg"></i>
                        </div>
                    </div>
                    <div class="col-9 text-center align-self-center">
                        <div class="m-l-10 ">
                            <h5 class="mt-0 round-inner text-dark">{{ $batch }}</h5>
                            <p class="mb-0 text-muted"> Batch</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->

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
                    <div class="col-9 align-self-center text-center">
                        <div class="m-l-10">
                            <h5 class="mt-0 round-inner text-dark">{{ $course }}</h5>
                            <p class="mb-0 text-muted">Course</p>
                        </div>
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


<div class="row mt-3">


    <div class="col-md-12 col-lg-12 col-xl-6">
        <div class="card">
            <h5 class="card-header">Grade</h5>
            <div class="card-body">
                @include('trainingcenter._grad',[
        'grads'=>$grad,
])
            </div>
        </div>


    </div>
    <div class="col-md-12 col-lg-12 col-xl-6">
        <div class="card">
            <h5 class="card-header">Organization</h5>
            <div class="card-body">
                @include('trainingcenter._organizaton',[
        'organizations'=>$organization
])
            </div>
        </div>


    </div>

</div>

@endsection