@extends('layouts.admin')

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

                    {!! Form::open(array('route' => 'participantlist', 'method' => 'get')) !!}

                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="name">Name</label>
                                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="nid">NID</label>
                                {!! Form::text('nid', null, array('placeholder' => 'NID','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="mobile">Mobile</label>
                                {!! Form::text('mobile', null, array('placeholder' => 'Mobile','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="grade">Designation</label>
                                {!! Form::select('designation', [null=>'Please Select'] + $COM_DESIGNATIONS, null, ['class' => 'form-control']) !!}
                            </div>
                        </div>


                    </div>

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
                        <div class="col-4 mt-4">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                    {!! Form::close() !!}




                    <table class="table">
                        <thead>
                        <tr>

                            <th scope="col">NID</th>
                            <th scope="col">Organization</th>
                            <th scope="col">Name of Trainee</th>
                            <th scope="col">Designation</th>
                            <th scope="col">Phone/Mobile</th>
                            <th scope="col">Division</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($participants as $participant)
                            <tr>
                                <th>{{ $participant->nid }}</th>
                                <td>{{ $participant->organization_name }}</td>
                                <td>{{ $participant->name }}</td>
                                <td>{{ $participant->designation_name }}</td>
                                <td>{{ $participant->mobile_no }}</td>
                                <td>{{ $participant->division_name }}</td>
                                <td> <a class="participantmodal" data-id="{{$participant->id}}"  data-toggle="modal" href="#participantModalshow{{$participant->id}}" id="modellink{{$participant->id}}">
                                        <i class="fa fa-book"></i> Details
                                    </a>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $participants->links() }}
                </div>
            </div>
        </div>

    </div>
    <div class="modal-container"></div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('.participantmodal').click(function(e) {
                var participantId = $(this).attr("data-id");
                var url = '{{url("/")}}/participant/'+participantId;
                $('.modal-container').load(url,function(result){
                    $(".modal-backdrop").remove();
                    $('#participantModalshow'+participantId).modal({show:true, backdrop: 'static', keyboard: false});
                });
            });

        });

    </script>
@endpush
