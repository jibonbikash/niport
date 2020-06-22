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
        <div class="col-sm-12 col-xl-12 col-md-12">
            <div class="card mg-b-20">
                <div class="card-body pd-y-0">
                    <div class="custom-fieldset mb-4">
                        <div class="clearfix">
                            <label> Training Center Information</label>
                        </div>

                        <table class="table table-striped font-weight-bold">

                            <tbody>
                            <tr>
                                <td><strong>Name: {{ $training_centerinfo->name }}</strong></td>
                                <td>Email: {{ $training_centerinfo->email }}</td>
                                <td>Mobile: {{ $training_centerinfo->training_center ? $training_centerinfo->training_center->phone_no: '' }}</td>
                                <td>Address: {{ $training_centerinfo->training_center ? $training_centerinfo->training_center->address: '' }}</td>
                            </tr>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
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
      'alltraining'=>$alltraining,
        'designation'=>$designation,
        'grad'=>$grad,
        'organization'=>$organization,
            ])


@endsection
