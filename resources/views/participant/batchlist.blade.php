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





                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">

                            </th>
                            <th scope="col">Training Center</th>
                            <th scope="col">Batch Name</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">End Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($batchlists as $batchlist)
                            <tr>
                                <th>

                                </th>
                                <th>{{ $batchlist->training_center_name }}</th>
                                <td>{{ $batchlist->name }}</td>
                                <td>{{ $batchlist->training_start_date }}</td>
                                <td>{{ $batchlist->training_end_date }}</td>
                                <td>{{ $batchlist->trn_batch_status }}</td>

                                <td><a href="{{ route('participant_batchlistedit',['id'=>$batchlist->id]) }}"> Edit</a></td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $batchlists->links() }}
                </div>
            </div>
        </div>

    </div>

@endsection

