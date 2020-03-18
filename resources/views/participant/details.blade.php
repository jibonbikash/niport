<div id="participantModalshow{{ $participant->id }}" class="modal fade bd-example-modal-lg">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ $participant->name }} </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">

<div class="table-responsive">
    <table class="table table-bordered">
        <tbody>
        <tr>
            <td><span class="font-weight-bold"> Name:</span> {{ $participant->name }}</td>
            <td><span class="font-weight-bold">Mobile: </span>{{ $participant->mobile_no }}</td>
            <td><span class="font-weight-bold">Email: </span>{{ $participant->email }}</td>
            <td><span class="font-weight-bold">Gender: </span>{{ $participant->gender }}</td>
            <td><span class="font-weight-bold">NID: </span>{{ $participant->nid }}</td>
        </tr>
        <tr>
            <td><span class="font-weight-bold">Grade: </span>{{ $participant->grade ? $participant->grade->name : ''}}</td>
            <td><span class="font-weight-bold">Designation: </span>{{ $participant->designation ? $participant->designation->name : ''}}</td>
            <td><span class="font-weight-bold">Organization: </span>{{ $participant->organization ? $participant->organization->name: ''}}</td>
            <td><span class="font-weight-bold">Religion : </span>{{ $participant->com_religion }}</td>
            <td><span class="font-weight-bold">Date of Birth: </span>{{ $participant->date_of_birth }}</td>
        </tr>

        <tr>
            <td><span class="font-weight-bold">Joining Date: </span>{{ $participant->joining_date }}</td>
            <td><span class="font-weight-bold">Emergency Contact : </span>{{ $participant->emergency_contact }}</td>
            <td><span class="font-weight-bold">District: </span>{{ $participant->district ? $participant->district->name : ''}}</td>
            <td><span class="font-weight-bold">Upazila:</span> {{ $participant->upazila ? $participant->upazila->name : ''}}</td>
            <td><span class="font-weight-bold">Village: </span>{{ $participant->village }}</td>
        </tr>



        </tbody>

    </table>
<br />
    <span class="font-weight-bold">Total Training: {{ Participant::totaltraining($participant->id) }}</span>
    <br > <br >
    <span class="font-weight-bold text-success"> Training List </span>   <br >
    <table class="table table-bordered">
        <thead>
        <tr>

            <th scope="col">Batch</th>
            <th scope="col">Course</th>
            <th scope="col">Participant status</th>
            <th scope="col">Batch start date</th>
            <th scope="col">Batch end date</th>
        </tr>
        </thead>

        <tbody>
        @foreach($participant->participantEnroll as $Enrollparticipant)
        <tr>
        <td>{{ $Enrollparticipant->batch?  $Enrollparticipant->batch->name: ''}} </td>
        <td>{{ $Enrollparticipant->course?  $Enrollparticipant->course->name: ''}}</td>
        <td>{{ $Enrollparticipant->trn_participant_status }}</td>
            <td>{{ $Enrollparticipant->batch ?  date("F j, Y", strtotime($Enrollparticipant->batch->training_start_date)): ''}}</td>
            <td>{{ $Enrollparticipant->batch ?  date("F j, Y", strtotime($Enrollparticipant->batch->training_end_date)): ''}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>



</div>
                <div class="row">
                    <div class="card mg-b-20">
                        <div class="card-header">
                            <h4 class="card-header-title">
                                Training
                            </h4>

                        </div>
                        <div class="card-body collapse show" id="collapse9">
                            <div class="nav-tabs-top">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#navs-top-home">Completed</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active show" data-toggle="tab" href="#navs-top-profile">Ongoing</a>
                                    </li>

                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade" id="navs-top-home">
                                        <div class="card-body">
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>

                                                    <th scope="col">Batch</th>
                                                    <th scope="col">Course</th>
                                                    <th scope="col">Participant status</th>
                                                    <th scope="col">Batch start date</th>
                                                    <th scope="col">Batch end date</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                @foreach($participant->participantCOMPLETED as $Enrollparticipant)
                                                    <tr>
                                                        <td>{{ $Enrollparticipant->batch?  $Enrollparticipant->batch->name: ''}} </td>
                                                        <td>{{ $Enrollparticipant->course?  $Enrollparticipant->course->name: ''}}</td>
                                                        <td>{{ $Enrollparticipant->trn_participant_status }}</td>
                                                        <td>{{ $Enrollparticipant->batch ?  date("F j, Y", strtotime($Enrollparticipant->batch->training_start_date)): ''}}</td>
                                                        <td>{{ $Enrollparticipant->batch ?  date("F j, Y", strtotime($Enrollparticipant->batch->training_end_date)): ''}}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade active show" id="navs-top-profile">
                                        <div class="card-body">

                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>

                                                    <th scope="col">Batch</th>
                                                    <th scope="col">Course</th>
                                                    <th scope="col">Participant status</th>
                                                    <th scope="col">Batch start date</th>
                                                    <th scope="col">Batch end date</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                @foreach($participant->participantENROLLED as $Enrollparticipant)
                                                    <tr>
                                                        <td>{{ $Enrollparticipant->batch?  $Enrollparticipant->batch->name: ''}} </td>
                                                        <td>{{ $Enrollparticipant->course?  $Enrollparticipant->course->name: ''}}</td>
                                                        <td>{{ $Enrollparticipant->trn_participant_status }}</td>
                                                        <td>{{ $Enrollparticipant->batch ?  date("F j, Y", strtotime($Enrollparticipant->batch->training_start_date)): ''}}</td>
                                                        <td>{{ $Enrollparticipant->batch ?  date("F j, Y", strtotime($Enrollparticipant->batch->training_end_date)): ''}}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
