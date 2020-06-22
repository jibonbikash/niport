@extends('layouts.admin')

@section('content')
    <div class="pageheader pd-t-25 pd-b-35">
        <div class="pd-t-5 pd-b-5">
            <h1 class="pd-0 mg-0 tx-20">Training Center</h1>
        </div>
        <div class="breadcrumb pd-0 mg-0">
            <a class="breadcrumb-item" href="index.html"><i class="icon ion-ios-home-outline"></i> Dashboard</a>


        </div>
    </div>
    <div class="row clearfix">
        <div class="col-md-12">
            <span class="font-weight-bold text-success"> Name: </span> {{ $training_centerinfo->name }}
        </div>

        <div class="col-md-12"><span class="font-weight-bold text-success">Email: </span>{{ $training_centerinfo->email }}
        </div>
        <div class="col-md-12"><span
                class="font-weight-bold text-success">Mobile: </span>{{ $training_centerinfo->training_center ? $training_centerinfo->training_center->phone_no: '' }}
        </div>
        <div class="col-md-12"><span
                class="font-weight-bold text-success">Address: </span>{{ $training_centerinfo->training_center ? $training_centerinfo->training_center->address: '' }}
        </div>

        <div class="col-md-12"><span
                class="font-weight-bold text-success">Location: </span>{{ $training_centerinfo->training_center ? $training_centerinfo->training_center->location: '' }}
        </div>

    </div>
    {!! Form::open(array('route' => ['center.details', $centerID], 'method' => 'get')) !!}
    @include('layouts.themes.metricaladmin.datepicker')
    {!! Form::close() !!}


    @include('dashboard.home._index',['totalFEMALE'=>$totalFEMALE,'totalTMALE'=>$totalTMALE, 'batch'=>$batch,
            'course'=>$course,
            'locations'=>$locations,
            'courses'=>$courses,
            'completed'=>$completed,
            'ongoing'=>$ongoing,
            'centerinfo'=>$centerID,

            ])


@endsection
