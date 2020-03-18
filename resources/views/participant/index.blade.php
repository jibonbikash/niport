@extends('layouts.main')

@section('content')


    <div class="row mt-3">
        <div class="col-md-12 col-lg-12 col-xl-12">

            <div class="card m-b-30">
                <div class="card-body">
                    <h5 class="header-title pb-3 mt-0">Participant List</h5>

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

    {!! Form::open(array('route' => 'participants', 'method' => 'get')) !!}
<div class="row">
<div class="col-4">
<div class="form-group">
<label for="batch_id">Batch</label>
    {!! Form::select('batch_id', [null=>'Please Select'] + $batches, null, ['class' => 'form-control']) !!}
</div>
</div>
<div class="col-4">
<div class="form-group">
<label for="course_id">Course</label>
    {!! Form::select('course_id', [null=>'Please Select'] + $courses, null, ['class' => 'form-control']) !!}
</div>
</div>
<div class="col-4">
<button type="submit" class="btn btn-primary">Search</button>
</div>
</div>
                    {!! Form::close() !!}
                    {!! Form::open(array('route' => 'participant_update', 'method' => 'post')) !!}
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h5 class="header-title pb-3 mt-0">Bulk Update</h5>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="batch_id">Division</label>
                                        {!! Form::select('Location', [null=>'Please Select'] + $locations, null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="col-8">
                                    <div class="form-group pt-4">
                                    <label for="ererer"> &nbsp;</label>
                                    <button type="submit" class="btn btn-primary">Bulk Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>



    <table class="table">
        <thead>
        <tr>
            <th scope="col">
                <a class="checkall" href="#"> Check All</a> <a class="uncheckall" href="#"> Uncheck All</a>
            </th>
            <th scope="col">NID</th>
            <th scope="col">Organization</th>
            <th scope="col">Name of Trainee</th>
            <th scope="col">Designation</th>
            <th scope="col">Phone/Mobile</th>
            <th scope="col">Division</th>
        </tr>
        </thead>
        <tbody>
        @foreach($participants as $participant)
        <tr>
            <th>
                <input type="checkbox" name="participant[]" value="{{ $participant->id }}">
                </th>
            <th>{{ $participant->nid }}</th>
            <td>{{ $participant->organization_name }}</td>
            <td>{{ $participant->name }}</td>
            <td>{{ $participant->designation_name }}</td>
            <td>{{ $participant->mobile_no }}</td>
            <td>{{ $participant->division_name }}</td>

        </tr>
       @endforeach
        </tbody>
    </table>
                    {!! Form::close() !!}
    {{ $participants->links() }}
</div>
</div>
</div>

</div>

@endsection
@push('script')
    <script>
        $(document).ready(function() {
            // Check All
            $('.checkall').click(function() {
                $(":checkbox").attr("checked", true);
            });
            // Uncheck All
            $('.uncheckall').click(function() {
                $(":checkbox").attr("checked", false);
            });
        });

    </script>
@endpush
