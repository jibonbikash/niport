<?php

namespace App\Http\Controllers;

use App\Batch;
use App\Course;
use App\Location;
use App\Participant;
use App\SetUpdataCom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParticipantController extends Controller
{
    public function index(Request $request){
        $user = auth()->user();
        $batches= Batch::all()->pluck('name', 'id')->toArray();
        $courses= Course::all()->pluck('name', 'id')->toArray();
        $locations= Location::where('location_type','DIVISION')->pluck('name', 'id')->toArray();
        $COM_DESIGNATIONS= SetUpdataCom::where('keyword','COM_DESIGNATION')->pluck('name', 'id')->toArray();
        //  dd($locations);
        $participants = DB::table('reg_participant')
            ->select('reg_participant.*', 'trn_participant_enroll.*','com_location.name as division_name', 'set_up_data_com.name as designation_name', 'com_grade.name as com_grade_name', 'organization.name as organization_name')
            ->leftJoin('trn_participant_enroll', 'reg_participant.id', '=', 'trn_participant_enroll.reg_participant_id')
            ->leftJoin('set_up_data_com', 'reg_participant.com_designation_id', '=', 'set_up_data_com.id')
            ->leftJoin('set_up_data_com as com_grade', 'reg_participant.com_grade_id', '=', 'com_grade.id')
            ->leftJoin('set_up_data_com as organization', 'reg_participant.com_organization_id', '=', 'organization.id')
            ->leftJoin('com_location', 'reg_participant.division_id', '=', 'com_location.id')
            ->leftJoin('trn_batch', 'trn_participant_enroll.trn_batch_id', '=', 'trn_batch.id')
            ->when($request->input('name'), function ($q) use ($request){
                return  $q->where('reg_participant.name', $request->input('name'));
            })

            ->when($request->input('nid'), function ($q) use ($request){
                return  $q->where('reg_participant.nid', $request->input('nid'));
            })
            ->when($request->input('mobile'), function ($q) use ($request){
                return  $q->where('reg_participant.mobile_no', $request->input('mobile'));
            })
            ->when($request->input('designation'), function ($q) use ($request){
                return  $q->where('reg_participant.com_designation_id', $request->input('designation'));
            })
            ->when($request->input('batch_id'), function ($q) use ($request){
                return  $q->where('trn_participant_enroll.trn_batch_id', $request->input('batch_id'));
            })

            ->when($request->input('course_id'), function ($q) use ($request){
                return $q->where('trn_participant_enroll.trn_course_id', $request->input('course_id'));
            })

            ->where('reg_participant.is_active', 1)
            ->where('trn_batch.com_training_center_id', $user->com_training_center_id)
            ->paginate(50);
//dd($participants);
        return view('participant.list',[
            'participants'=>$participants,
            'batches'=>$batches,
            'courses'=>$courses,
            'locations'=>$locations,
            'COM_DESIGNATIONS'=>$COM_DESIGNATIONS,
        ]);

    }

    public function details($id)
    {
        $Participant = Participant::with(['participantEnroll','participantCOMPLETED','participantENROLLED'])->find($id);
      //  dd($Participant);
        return view('participant.details', [
            'participant' => $Participant
        ]);
    }
}
