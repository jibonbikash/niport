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

        if ($request->input('startdate') && $request->input('enddate')) {
            $startdate = $request->input('startdate');
            $enddate = $request->input('enddate');
            $monthstart = date('Y-m-d', strtotime($startdate));
            $first4month = date('Y-m-d', strtotime("+4 months", strtotime($monthstart)));
            $second4month=date('Y-m-d', strtotime("+4 months", strtotime($first4month)));
            $last4month=date('Y-m-d', strtotime("+4 months", strtotime($second4month)));

        } else {
            if (date('m') > 6) {

                $startdate = date('Y') . '-' . date("07-01");
                $enddate = date("Y-m-d");
                $monthstart= date('Y'). '-' .date("07-01").'-'.date('Y');
                $first4month = date('Y-m-d', strtotime("+4 months", strtotime($monthstart)));
                $second4month=date('Y-m-d', strtotime("+4 months", strtotime($first4month)));
                $last4month=date('Y-m-d', strtotime("+4 months", strtotime($second4month)));

            } else {
                $year = date('Y') - 1;
                $startdate = $year . '-' . date("07-01");
                $enddate = date("Y-m-d");
                $monthstart= $year . '-'. date("07-01");
                $first4month = date('Y-m-d', strtotime("+4 months", strtotime($monthstart)));
                $second4month=date('Y-m-d', strtotime("+4 months", strtotime($first4month)));
                $last4month=date('Y-m-d', strtotime("+4 months", strtotime($second4month)));
            }
        }

        $training_centerinfo = User::with(['training_center'])->role('TrainigCenter')->where('com_training_center_id', $id)->first();
      //  dd( $training_centerinfo);
        $totalFEMALE = DB::table('reg_participant')
            ->leftJoin('trn_participant_enroll', 'reg_participant.id', '=', 'trn_participant_enroll.reg_participant_id')
            ->leftJoin('trn_batch', 'trn_participant_enroll.trn_batch_id', '=', 'trn_batch.id')
            ->leftJoin('trn_course', 'trn_participant_enroll.trn_course_id', '=', 'trn_course.id')
            ->where('reg_participant.com_gender', 'FEMALE')
            ->whereDate('trn_batch.training_start_date','>=', $startdate)
            ->whereDate('trn_batch.training_end_date','<=', $enddate)
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
            ->whereDate('trn_batch.training_start_date','>=', $startdate)
            ->whereDate('trn_batch.training_end_date','<=', $enddate)
            ->count();

        $trn_batch = DB::table('trn_batch')
            ->where('trn_batch.com_training_center_id', $id)
            ->whereDate('trn_batch.training_start_date','>=', $startdate)
            ->whereDate('trn_batch.training_end_date','<=', $enddate)
            ->count();

        $trn_course = DB::table('trn_batch')
            ->where('trn_batch.com_training_center_id', $id)
            ->whereDate('trn_batch.training_start_date','>=', $startdate)
            ->whereDate('trn_batch.training_end_date','<=', $enddate)
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
            ->where([
                ['trn_batch.training_start_date','>=', $startdate],
                ['trn_batch.training_end_date','<=', $enddate],

            ])
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
            ->where([
                ['trn_batch.training_start_date','>=', $startdate],
                ['trn_batch.training_end_date','<=', $enddate],

            ])
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
                ['trn_batch.training_start_date','>=', $startdate],
                ['trn_batch.training_end_date','<=', $enddate],
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
                ['trn_batch.training_start_date','>=', $startdate],
                ['trn_batch.training_end_date','<=', $enddate],
            ])
            ->groupBy('trn_participant_enroll.trn_course_id')
            ->orderBy('participant_count', 'desc')
            ->having('participant_count', '>', 1)
            ->take(8)
            ->get();

        $countfrst4month = DB::table('trn_batch')
            ->select('trn_batch.id')
            ->leftJoin('trn_course', 'trn_batch.trn_course_id', '=', 'trn_course.id')
            //  ->leftJoin('trn_participant_enroll', 'trn_course.id', '=', 'trn_participant_enroll.trn_course_id')
            //   ->leftJoin('reg_participant', 'trn_participant_enroll.reg_participant_id', '=', 'reg_participant.id')
            ->where([
                ['trn_batch.is_approved', 1],
                ['trn_batch.com_training_center_id', $id],
                ['trn_batch.training_start_date','>=', $monthstart],
                ['trn_batch.training_end_date','<=', $first4month],
            ])
            ->whereIn('trn_batch.trn_batch_status',['IN_PROGRESS','COMPLETE','CLOSE'])
            ->count();

        $countsecond4month = DB::table('trn_batch')
            ->select('trn_batch.id')
            ->leftJoin('trn_course', 'trn_batch.trn_course_id', '=', 'trn_course.id')
            //  ->leftJoin('trn_participant_enroll', 'trn_course.id', '=', 'trn_participant_enroll.trn_course_id')
            //   ->leftJoin('reg_participant', 'trn_participant_enroll.reg_participant_id', '=', 'reg_participant.id')
            ->where([
                ['trn_batch.is_approved', 1],
                ['trn_batch.com_training_center_id', $id],
                ['trn_batch.training_start_date','>=', $first4month],
                ['trn_batch.training_end_date','<=', $second4month],
            ])
            ->whereIn('trn_batch.trn_batch_status',['IN_PROGRESS','COMPLETE','CLOSE'])
            ->count();


        $countlast4month = DB::table('trn_batch')
            ->select('trn_batch.id')
            ->leftJoin('trn_course', 'trn_batch.trn_course_id', '=', 'trn_course.id')
            //  ->leftJoin('trn_participant_enroll', 'trn_course.id', '=', 'trn_participant_enroll.trn_course_id')
            //   ->leftJoin('reg_participant', 'trn_participant_enroll.reg_participant_id', '=', 'reg_participant.id')
            ->where([
                ['trn_batch.is_approved', 1],
                ['trn_batch.com_training_center_id', $id],
                ['trn_batch.training_start_date','>=', $second4month],
                ['trn_batch.training_end_date','<=', $last4month],
            ])
            ->whereIn('trn_batch.trn_batch_status',['IN_PROGRESS','COMPLETE','CLOSE'])
            ->count();

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
            'centerID'=>$id,
            'countfrst4month'=>$countfrst4month,
            'countsecond4month'=>$countsecond4month,
            'countlast4month'=>$countlast4month,
            'monthstart'=>$monthstart,
            'first4month'=>$first4month,
            'second4month'=>$second4month,
            'last4month'=>$last4month,


        ]);
    }
}
