<?php

namespace App\Http\Controllers;

use App\Batch;
use App\Course;
use App\Location;
use App\Participant;
use App\TrainingCenter;
use App\TrainingSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParticipantsController extends Controller
{
    //
    public function index(Request $request){

   $batches= Batch::all()->pluck('name', 'id')->toArray();
   $courses= Course::all()->pluck('name', 'id')->toArray();
   $locations= Location::where('location_type','DIVISION')->pluck('name', 'id')->toArray();
 //  dd($locations);
        $participants = DB::table('reg_participant')
            ->select('reg_participant.*', 'trn_participant_enroll.*','com_location.name as division_name', 'set_up_data_com.name as designation_name', 'com_grade.name as com_grade_name', 'organization.name as organization_name')
            ->leftJoin('trn_participant_enroll', 'reg_participant.id', '=', 'trn_participant_enroll.reg_participant_id')
            ->leftJoin('set_up_data_com', 'reg_participant.com_designation_id', '=', 'set_up_data_com.id')
            ->leftJoin('set_up_data_com as com_grade', 'reg_participant.com_grade_id', '=', 'com_grade.id')
            ->leftJoin('set_up_data_com as organization', 'reg_participant.com_organization_id', '=', 'organization.id')
            ->leftJoin('com_location', 'reg_participant.division_id', '=', 'com_location.id')

            ->when($request->input('batch_id'), function ($q) use ($request){
              return  $q->where('trn_participant_enroll.trn_batch_id', $request->input('batch_id'));
            })

            ->when($request->input('course_id'), function ($q) use ($request){
               return $q->where('trn_participant_enroll.trn_course_id', $request->input('course_id'));
            })

          //  ->where('trn_participant_enroll.trn_course_id', $request->input('course_id'))
            ->where('reg_participant.is_active', 1)
//            ->groupBy('trn_participant_enroll.reg_participant_id')
//            ->orderBy('participant_count', 'desc')
//            ->limit(20)
            ->paginate(50);
//dd($participants);
        return view('participant.index',[
            'participants'=>$participants,
            'batches'=>$batches,
            'courses'=>$courses,
            'locations'=>$locations,
        ]);

    }

    public function update(Request $request){

//        $request->input('participant');
//        print_r();
      //  dd($request->input('participant'));
      //  dd($request->input('Location'));
//        if(count($request->input('participant') > 0)){
//
//
//        }

        if ($request->has('participant')) {
           // if (count($request->input('participant')) > 0) {

                foreach ($request->input('participant') as $participantid) {

               //   echo $participantid. '<br />';
                    $updateparticipant = Participant::find($participantid);
                    $updateparticipant->division_id = $request->input('Location');
                    $updateparticipant->save();
                }

            return redirect()->route('participants')->with('success', 'Successfully data update.');
          //  }
        }


    }

    public function batchlist(Request $request){

      //  $batches= Batch::all()->pluck('name', 'id')->toArray();

        $batchlists = DB::table('trn_batch')
            ->select('trn_batch.*', 'trn_course.name as course_name', 'trn_training_schedule.schedule_code as schedule_name', 'com_training_center.name as training_center_name')
            ->leftJoin('com_training_center', 'trn_batch.com_training_center_id', '=', 'com_training_center.id')
            ->leftJoin('trn_course', 'trn_batch.trn_course_id', '=', 'trn_course.id')
            ->leftJoin('trn_training_schedule', 'trn_batch.trn_training_schedule_id', '=', 'trn_training_schedule.id')
            ->leftJoin('trn_coordinator', 'trn_batch.batch_coordinator_id', '=', 'trn_coordinator.id')
            ->where('trn_batch.is_approved', 1)
            ->paginate(50);

//        $batches= Batch::all()->pluck('name', 'id')->toArray();
//        $courses= Course::all()->pluck('name', 'id')->toArray();



        return view('participant.batchlist',[
            'batchlists'=>$batchlists,
        ]);

    }
    public function batchlistedit( Request $request, $id){
        $batch = Batch::find($id);
        $courses= Course::all()->pluck('name', 'id')->toArray();
        $trainingCenters= TrainingCenter::all()->pluck('name', 'id')->toArray();
        $TrainingSchedules= TrainingSchedule::all()->pluck('schedule_code', 'id')->toArray();
        return view('participant.batchlistedit',[
            'batch'=>$batch,
            'courses'=>$courses,
            'trainingCenters'=>$trainingCenters,
            'TrainingSchedules'=>$TrainingSchedules,
        ]);

    }

    public function updatebatch(Request $request, $id){

        $batch = Batch::find($id);
        $batch->name = $request->input('name');
        $batch->com_training_center_id = $request->input('com_training_center_id');
        $batch->trn_course_id = $request->input('trn_course_id');
        $batch->duration = $request->input('duration');
        $batch->trn_training_schedule_id = $request->input('trn_training_schedule_id');
        $batch->training_start_date = date('Y-m-d', strtotime($request->input('training_start_date')));
        $batch->training_end_date = date('Y-m-d', strtotime($request->input('training_end_date')));
      //  $batch->save();
        if($batch->save()){

            return redirect()->route('participant_batchlist')->with('success', 'Successfully data update.');

        }

    }
}
