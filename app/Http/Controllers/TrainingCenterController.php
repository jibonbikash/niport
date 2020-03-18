<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
class TrainingCenterController extends Controller
{

    //
    public function index(Request $request){

        $training_centers = User::with(['training_center'])->role('TrainigCenter')->get();
       // dd($training_centers);
        return view('trainingcenter.index',[
            'training_centerlist'=>$training_centers
        ]);

//        $training_centers=User::with(['trainingcenter'])->paginate(10);
//        dd($users);
    }

    public function details(Request $request, $id){
          $training_centerinfo = User::with(['training_center'])->role('TrainigCenter')->where('com_training_center_id', $id)->first();
        $totalFEMALE = DB::table('reg_participant')
            ->leftJoin('trn_participant_enroll', 'reg_participant.id', '=', 'trn_participant_enroll.reg_participant_id')
            ->leftJoin('trn_batch', 'trn_participant_enroll.trn_batch_id', '=', 'trn_batch.id')
            ->leftJoin('trn_course', 'trn_participant_enroll.trn_course_id', '=', 'trn_course.id')
            ->where('reg_participant.com_gender', 'FEMALE')
            ->where('reg_participant.is_active', 1)
            ->where('trn_batch.com_training_center_id', $id)
            ->count();

        $totalTMALE = DB::table('reg_participant')
            ->leftJoin('trn_participant_enroll', 'reg_participant.id', '=', 'trn_participant_enroll.reg_participant_id')
            ->leftJoin('trn_batch', 'trn_participant_enroll.trn_batch_id', '=', 'trn_batch.id')
            ->leftJoin('trn_course', 'trn_participant_enroll.trn_course_id', '=', 'trn_course.id')
            ->where('trn_batch.com_training_center_id', $id)
            ->where('reg_participant.com_gender', 'MALE')
            ->where('reg_participant.is_active', 1)
            ->count();

        $trn_batch = DB::table('trn_batch')
            ->where('trn_batch.com_training_center_id', $id)
            ->count();

        $trn_course = DB::table('trn_batch')
            ->where('trn_batch.com_training_center_id', $id)
            ->distinct('trn_course_id')
            ->count('trn_course_id');

        $locations = DB::table('com_location')
            ->select('com_location.name', DB::raw('count(reg_participant.id) as participant_count'))
            ->leftJoin('reg_participant', 'com_location.id', '=', 'reg_participant.division_id')
            ->leftJoin('trn_participant_enroll', 'reg_participant.id', '=', 'trn_participant_enroll.reg_participant_id')
            ->leftJoin('trn_batch', 'trn_participant_enroll.trn_batch_id', '=', 'trn_batch.id')
            ->where('trn_batch.com_training_center_id', $id)
            ->where('com_location.is_active', 1)
            ->where('com_location.location_type', '=','DIVISION')
            ->groupBy('reg_participant.division_id')
            ->orderBy('participant_count', 'desc')
            ->get();

        $courses = DB::table('trn_course')
            ->select('trn_course.name', DB::raw('count(trn_participant_enroll.id) as participant_count'))
            ->leftJoin('trn_participant_enroll', 'trn_course.id', '=', 'trn_participant_enroll.trn_course_id')
            ->leftJoin('reg_participant', 'trn_participant_enroll.reg_participant_id', '=', 'reg_participant.id')
            ->leftJoin('trn_batch', 'trn_participant_enroll.trn_batch_id', '=', 'trn_batch.id')
            ->where('trn_course.is_active', 1)
            ->where('trn_batch.com_training_center_id', $id)
            ->groupBy('trn_participant_enroll.trn_course_id')
            ->orderBy('participant_count', 'desc')
            ->having('participant_count', '>', 1)
            ->take(8)
            ->get();

        $completed = DB::table('trn_batch')
            ->select('trn_course.name', DB::raw('count(trn_participant_enroll.id) as participant_count'))
            ->leftJoin('trn_course', 'trn_batch.trn_course_id', '=', 'trn_course.id')
            ->leftJoin('trn_participant_enroll', 'trn_course.id', '=', 'trn_participant_enroll.trn_course_id')
            ->leftJoin('reg_participant', 'trn_participant_enroll.reg_participant_id', '=', 'reg_participant.id')
            ->where([
                ['trn_batch.is_approved', 1],
                ['trn_batch.trn_batch_status', 'COMPLETE'],
                ['trn_batch.com_training_center_id',$id],
            ])
            ->groupBy('trn_participant_enroll.trn_course_id')
            ->orderBy('participant_count', 'desc')
            ->having('participant_count', '>', 1)
            ->take(8)
            ->get();


        $ongoing = DB::table('trn_batch')
            ->select('trn_course.name', DB::raw('count(trn_participant_enroll.id) as participant_count'))
            ->leftJoin('trn_course', 'trn_batch.trn_course_id', '=', 'trn_course.id')
            ->leftJoin('trn_participant_enroll', 'trn_course.id', '=', 'trn_participant_enroll.trn_course_id')
            ->leftJoin('reg_participant', 'trn_participant_enroll.reg_participant_id', '=', 'reg_participant.id')
            ->where([
                ['trn_batch.is_approved', 1],
                ['trn_batch.trn_batch_status', 'IN_PROGRESS'],
                ['trn_batch.com_training_center_id', $id],
            ])
            ->groupBy('trn_participant_enroll.trn_course_id')
            ->orderBy('participant_count', 'desc')
            ->having('participant_count', '>', 1)
            ->take(8)
            ->get();
//dd($training_centerinfo);
        return view('trainingcenter.training_centerinfo',[
            'totalFEMALE'=>$totalFEMALE,
            'totalTMALE'=>$totalTMALE,
            'batch'=>$trn_batch,
            'course'=>$trn_course,
            'locations'=>$locations,
            'courses'=>$courses,
            'completed'=>$completed,
            'ongoing'=>$ongoing,
            'training_centerinfo'=>$training_centerinfo,

        ]);
    }
}
