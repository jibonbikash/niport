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
    public function index()
    {
        //print_r(auth()->user());
        $user = auth()->user();
        $totalFEMALE = DB::table('reg_participant')
            ->leftJoin('trn_participant_enroll', 'reg_participant.id', '=', 'trn_participant_enroll.reg_participant_id')
            ->leftJoin('trn_batch', 'trn_participant_enroll.trn_batch_id', '=', 'trn_batch.id')
            ->leftJoin('trn_course', 'trn_participant_enroll.trn_course_id', '=', 'trn_course.id')
            ->where('reg_participant.com_gender', 'FEMALE')
            ->where('reg_participant.is_active', 1)
            ->where('trn_batch.com_training_center_id', $user->com_training_center_id)
            ->count();

        $totalTMALE = DB::table('reg_participant')
            ->leftJoin('trn_participant_enroll', 'reg_participant.id', '=', 'trn_participant_enroll.reg_participant_id')
            ->leftJoin('trn_batch', 'trn_participant_enroll.trn_batch_id', '=', 'trn_batch.id')
            ->leftJoin('trn_course', 'trn_participant_enroll.trn_course_id', '=', 'trn_course.id')
            ->where('trn_batch.com_training_center_id', $user->com_training_center_id)
            ->where('reg_participant.com_gender', 'MALE')
            ->where('reg_participant.is_active', 1)
            ->count();

        $trn_batch = DB::table('trn_batch')
            ->where('trn_batch.com_training_center_id', $user->com_training_center_id)
            ->count();

        $trn_course = DB::table('trn_batch')
            ->where('trn_batch.com_training_center_id', $user->com_training_center_id)
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
