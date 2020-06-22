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
                                <label for="mobile">Mobile</label>
                                {!! Form::text('mobile', null, array('placeholder' => 'Mobile','class' => 'form-control')) !!}
                            </div>
                        </div>

                    </div>

                    {!! Form::close() !!}




                    <table class="table">
                        <thead>
                        <tr>

                            <th scope="col">Name</th>
                            <th scope="col">Location</th>
                            <th scope="col">Phone</th>
                            <th scope="col">address</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($training_centerlist as $trainingcenters)
                            <tr>
                                <th>{{ $trainingcenters->name }}</th>
                                <td>{{ $trainingcenters->training_center ? $trainingcenters->training_center->location: '' }}</td>
                                <td>{{ $trainingcenters->training_center ? $trainingcenters->training_center->phone_no: '' }}</td>
                                <td>{{ $trainingcenters->training_center ? $trainingcenters->training_center->address: '' }}</td>
                                <td>{{ $trainingcenters->email }}</td>

                                <td>
                                   <a href="{{ route('center.details', ['id' => $trainingcenters->com_training_center_id]) }}">     <i class="fa fa-book"></i> Details</a>

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
@push('script')
    <script>
        $(document).ready(function() {


        });

    </script>
@endpush
