<?php
/**
 * Created by  jibon Bikash Roy.
 * User: jibon
 * Date: 3/30/20
 * Time: 4:15 PM
 * Copyright jibon <jibon.bikash@gmail.com>
 */
?>
<div id="trainerModalshow{{ $trainerDetails->id }}" class="modal fade bd-example-modal-lg">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ $trainerDetails->trainer_name }} </h4>
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">

    <table class="table table-bordered">
        <tr>

            <td>Name</td>
            <td>{{ $trainerDetails->trainer_name }}</td>
        </tr>
        <tr>

            <td>Email</td>
            <td>{{ $trainerDetails->email }}</td>
        </tr>
        <tr>

            <td>Mobile no</td>
            <td>{{ $trainerDetails->mobile_no }}</td>
        </tr>
        <tr>

            <td>Emergancy Contact</td>
            <td>{{ $trainerDetails->emergancy_contact }}</td>
        </tr>

        <tr>

            <td>National ID</td>
            <td>{{ $trainerDetails->national_id }}</td>
        </tr>
        <tr>

            <td>Place of Posting</td>
            <td>{{ $trainerDetails->place_of_posting }}</td>
        </tr>
        <tr>

            <td>Trainer Code</td>
            <td>{{ $trainerDetails->trainer_code }}</td>
        </tr>
        <tr>

            <td>Date of Birth</td>
            <td>{{ $trainerDetails->date_of_birth }}</td>
        </tr>
        <tr>

            <td>Gender</td>
            <td>{{ $trainerDetails->com_gender }}</td>
        </tr>
        <tr>

            <td>Designation</td>
            <td>{{ $trainerDetails->designation ? $trainerDetails->designation->name: ''}}</td>
        </tr>
        <tr>

            <td>Grade</td>
            <td>{{ $trainerDetails->grade ?   $trainerDetails->grade->name : ''}}</td>
        </tr>
        <tr>

            <td>Organization</td>
            <td>{{ $trainerDetails->organization ?   $trainerDetails->organization->name : ''}}</td>
        </tr>
        <tr>

            <td>Training center</td>
            <td>{{ $trainerDetails->training_center ?   $trainerDetails->training_center->name : ''}}</td>
        </tr>
        <tr>

            <td>Nationality</td>
            <td>{{ $trainerDetails->com_nationality }}</td>
        </tr>


    </table>

    <h4>Training Session </h4>
    <div class="table-responsive">
    <table class="table table-bordered">
        <thead>
        <tr>

            <th scope="col">#</th>
            <th scope="col">Batch </th>
            <th scope="col">Session Date</th>
            <th scope="col">Session Day</th>
            <th scope="col">session no</th>
            <th scope="col">Duration</th>
            <th scope="col">Start Time</th>
            <th scope="col">End Time</th>
            <th scope="col">Details</th>
        </tr>
        </thead>
        <tbody>
        @foreach($trainerDetails->session_detail  as $index => $session)
            <tr>
                <th>{{ ++$index }}</th>
                <td>{{ $session->batch ? $session->batch->name:'' }}</td>
                <td>{{ date('F j, Y', strtotime($session->session_date)) }} </td>
                <td>{{  $session->session_day  }}</td>
                <td>{{  $session->session_no  }}</td>
                <td>{{  $session->duration  }}</td>
                <td>{{  $session->time_from  }}</td>
                <td>{{  $session->time_to  }} </td>
                <td>{{  $session->trn_curriculum_details  }}
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
</div>
        </div>
    </div>
</div>