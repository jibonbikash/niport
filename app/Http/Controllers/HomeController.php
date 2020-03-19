<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index( Request $request)
    {
        //date("Y",strtotime("-1 year"));

        if ($request->input('startdate') && $request->input('enddate')) {
            $startdate = $request->input('startdate');
            $enddate = $request->input('enddate');
        } else {
            if (date('m') > 6) {

                $startdate = date('Y') . '-' . date("07-01");
                $enddate = date("Y-m-d");

            } else {
                $year = date('Y') - 1;
                $startdate = $year . '-' . date("07-01");
                $enddate = date("Y-m-d");
            }
        }


        /*
        if ( date('m') > 6 ) {
            $year = date('Y') + 1;
            $startdate= $year.'-'.date("m-d");

            $enddate=date("Y-m-d");
        }
        else {
            $year = date('Y');
            $startdate= $year.'-'.date("m-d");
        }
        */
       // echo $startdate;
       // echo $year.'-'.date("07-01");

        //print_r(auth()->user());

        $user = auth()->user();

//        echo $user->com_training_center_id;
//        DB::connection()->enableQueryLog();
        $totalFEMALE = DB::table('reg_participant')
            ->leftJoin('trn_participant_enroll', 'reg_participant.id', '=', 'trn_participant_enroll.reg_participant_id')
            ->leftJoin('trn_batch', 'trn_participant_enroll.trn_batch_id', '=', 'trn_batch.id')
            ->leftJoin('trn_course', 'trn_participant_enroll.trn_course_id', '=', 'trn_course.id')
            ->where('reg_participant.com_gender', 'FEMALE')
            ->where('reg_participant.is_active', 1)
            ->whereDate('trn_batch.training_start_date','>=', $startdate)
            ->whereDate('trn_batch.training_end_date','<=', $enddate)
            ->where('trn_batch.com_training_center_id', $user->com_training_center_id)
            ->count();
//        $queries = DB::getQueryLog();
//        print_r($queries);
        $totalTMALE = DB::table('reg_participant')
            ->leftJoin('trn_participant_enroll', 'reg_participant.id', '=', 'trn_participant_enroll.reg_participant_id')
            ->leftJoin('trn_batch', 'trn_participant_enroll.trn_batch_id', '=', 'trn_batch.id')
            ->leftJoin('trn_course', 'trn_participant_enroll.trn_course_id', '=', 'trn_course.id')
            ->where('trn_batch.com_training_center_id', $user->com_training_center_id)
            ->where('reg_participant.com_gender', 'MALE')
            ->where('reg_participant.is_active', 1)
            ->whereDate('trn_batch.training_start_date','>=', $startdate)
            ->whereDate('trn_batch.training_end_date','<=', $enddate)
            ->count();

        $trn_batch = DB::table('trn_batch')
            ->where('trn_batch.com_training_center_id', $user->com_training_center_id)
            ->whereDate('trn_batch.training_start_date','>=', $startdate)
            ->whereDate('trn_batch.training_end_date','<=', $enddate)
            ->count();

        $trn_course = DB::table('trn_batch')
            ->where('trn_batch.com_training_center_id', $user->com_training_center_id)
            ->whereDate('trn_batch.training_start_date','>=', $startdate)
            ->whereDate('trn_batch.training_end_date','<=', $enddate)
            ->distinct('trn_course_id')
            ->count('trn_course_id');

        $locations = DB::table('com_location')
            ->select('com_location.name', DB::raw('count(reg_participant.id) as participant_count'))
            ->leftJoin('reg_participant', 'com_location.id', '=', 'reg_participant.division_id')
            ->leftJoin('trn_participant_enroll', 'reg_participant.id', '=', 'trn_participant_enroll.reg_participant_id')
            ->leftJoin('trn_batch', 'trn_participant_enroll.trn_batch_id', '=', 'trn_batch.id')
            ->where('trn_batch.com_training_center_id', $user->com_training_center_id)
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
            ->where('trn_batch.com_training_center_id', $user->com_training_center_id)
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
                ['trn_batch.com_training_center_id', $user->com_training_center_id],
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
                ['trn_batch.com_training_center_id', $user->com_training_center_id],
                ['trn_batch.training_start_date','>=', $startdate],
                ['trn_batch.training_end_date','<=', $enddate],
            ])
            ->groupBy('trn_participant_enroll.trn_course_id')
            ->orderBy('participant_count', 'desc')
            ->having('participant_count', '>', 1)
            ->take(8)
            ->get();

        return view('dashboard.home.index',[
            'totalFEMALE'=>$totalFEMALE,
            'totalTMALE'=>$totalTMALE,
            'batch'=>$trn_batch,
            'course'=>$trn_course,
            'locations'=>$locations,
            'courses'=>$courses,
            'completed'=>$completed,
            'ongoing'=>$ongoing,

        ]);
    }
}
