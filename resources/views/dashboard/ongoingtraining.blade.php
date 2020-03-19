@extends('layouts.admin')

@section('content')
    <div class="pageheader pd-t-25 pd-b-35">
        <div class="pd-t-5 pd-b-5">
            <h1 class="pd-0 mg-0 tx-20">Dashboard</h1>
        </div>
        <div class="breadcrumb pd-0 mg-0">
            <a class="breadcrumb-item" href="">Dashboard</a>
            <span class="breadcrumb-item active">Trainer location</span>
        </div>
        <br />
        {!! Form::open(array('route' => 'ongoingtraining', 'method' => 'get')) !!}
        @include('layouts.themes.metricaladmin.datepicker')
        {!! Form::close() !!}

    <div class="row mt-3">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h5 class="header-title pb-3 mt-0">Ongoing Training</h5>
                   <strong>Total Data:</strong> {{ $ongoingtrainings->total() }}
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Batch Name</th>
                            <th scope="col">Course Name</th>
                            <th scope="col">Raining Center Name</th>
                            <th scope="col">Duration</th>
                            <th scope="col">Training Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($ongoingtrainings as $ongoingtraining)
                        <tr>
                            <td>{{ $ongoingtraining->name }}</td>
                            <td>{{ $ongoingtraining->course_name }}</td>
                            <td>{{ $ongoingtraining->training_center_name }}</td>
                            <td>{{ $ongoingtraining->duration }}</td>
                            <td>
                               <strong>Start:</strong> {{  date('F j, Y', strtotime($ongoingtraining->training_start_date)) }} -
                                <strong>End:</strong>  {{  date('F j, Y', strtotime($ongoingtraining->training_end_date)) }}
                            </td>
                        </tr>
@endforeach
                        </tbody>
                    </table>
                    {{ $ongoingtrainings->links() }}
                </div>
            </div>
        </div>

    </div>

@endsection

