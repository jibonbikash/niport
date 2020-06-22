@extends('layouts.main')

@section('content')


    <div class="row mt-3">
        <div class="col-md-12 col-lg-12 col-xl-12">

            <div class="card m-b-30">
                <div class="card-body">
                    <h5 class="header-title pb-3 mt-0">Batch List</h5>

                    @if ($message = Session::get('success'))
                        <div class="card-block pl-3 pr-3">
                            <div class="alert alert-success border-success">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="icofont icofont-close-line-circled"></i>
                                </button>
                                <strong>Success!</strong> {{ $message }}
                            </div>
                        </div>
                    @endif
                    <form  method="POST" action="{{ route('participant_batchlistupdate',['id'=>$batch->id]) }}">
                        @csrf

                    <div class="row">
<div class="col-md-4">
    <div class="form-group">
        <label for="Name">Name</label>
        {!! Form::text('name', $batch->name,array('class'=>$errors->first('name') ? 'form-control is-invalid':'form-control','id'=>'name')) !!}

    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label for="Name">Training Center</label>
        {!! Form::select('com_training_center_id',[null=>'Please Select'] + $trainingCenters, $batch->com_training_center_id, ['class' => 'form-control com_training_center_id']) !!}

{{--        {!! Form::text('com_training_center_id', $batch->name,array('class'=>$errors->first('name') ? 'form-control is-invalid':'form-control','id'=>'name')) !!}--}}

    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label for="Name">Course</label>
        {!! Form::select('trn_course_id',[null=>'Please Select'] + $courses, $batch->trn_course_id, ['class' => 'form-control com_training_center_id']) !!}



    </div>
</div>
                </div>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="duration">Duration (In Days)</label>
                                {!! Form::text('duration', $batch->duration,array('class'=>$errors->first('name') ? 'form-control is-invalid':'form-control','id'=>'duration')) !!}

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="trn_training_schedule_id">Training Schedule</label>
                                {!! Form::select('trn_training_schedule_id',[null=>'Please Select'] + $TrainingSchedules, $batch->trn_training_schedule_id, ['class' => 'form-control trn_training_schedule_id']) !!}
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="training_start_date">Training Start Date</label>
                                {!! Form::text('training_start_date', date('d-m-Y', strtotime($batch->training_start_date)), array('class'=>$errors->first('name') ? 'form-control is-invalid':'form-control','id'=>'training_start_date')) !!}

                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4">
                        <div class="form-group">
                            <label for="Name">Training End Date</label>
                            {!! Form::text('training_end_date', date('d-m-Y', strtotime($batch->training_end_date)), array('class'=>$errors->first('training_end_date') ? 'form-control is-invalid':'form-control','id'=>'training_end_date')) !!}

                        </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group pt-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>

                    {!! Form::close() !!}


                </div>
            </div>
        </div>

    </div>

@endsection

@push('script')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>

        $(document).ready(function() {
            $("#training_start_date" ).datepicker(
                {
                    changeMonth: true,
                    changeYear: true,
                    dateFormat: 'dd-mm-yy'
                }
            );

            $("#training_end_date" ).datepicker(
                {
                    changeMonth: true,
                    changeYear: true,
                    dateFormat: 'dd-mm-yy'
                }
            );
        });

    </script>
@endpush




