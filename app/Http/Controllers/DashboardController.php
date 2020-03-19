<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //

    public function index(Request $request){

        $totalFEMALE = DB::table('reg_participant')->where('com_gender', 'FEMALE')->where('is_active', 1)->count();
        $totalTALE = DB::table('reg_participant')->where('com_gender', 'MALE')->where('is_active', 1)->count();
        $totalparticipant = DB::table('reg_participant')->where('is_active', 1)->count();
        $trn_batch = DB::table('trn_batch')->count();
        $trn_course = DB::table('trn_course')->where('is_active', 1)->count();
        $trn_trainer = DB::table('trn_trainer')->where('is_active', 1)->count();

        $locations = DB::table('com_location')
            ->select('com_location.name', DB::raw('count(reg_participant.id) as participant_count'))
            ->leftJoin('reg_participant', 'com_location.id', '=', 'reg_participant.division_id')
            ->where('com_location.is_active', 1)
            ->where('com_location.location_type', '=','DIVISION')
            ->groupBy('reg_participant.division_id')
            ->orderBy('participant_count', 'desc')
            ->get();
//dd($locations);
        return view('dashboard.index',[
            'totalFEMALE'=>$totalFEMALE,
            'totalTALE'=>$totalTALE,
            'totalparticipant'=>$totalparticipant,
            'batch'=>$trn_batch,
            'course'=>$trn_course,
            'trainer'=>$trn_trainer,
            'locations'=>$locations,
        ]);
    }


    public function division(Request $request){
        $locations = DB::table('com_location')
            ->select('com_location.name', DB::raw('count(reg_participant.id) as participant_count'))
            ->leftJoin('reg_participant', 'com_location.id', '=', 'reg_participant.division_id')
            ->where('com_location.is_active', 1)
            ->where('com_location.location_type', '=','DIVISION')
            ->groupBy('reg_participant.division_id')
            ->orderBy('participant_count', 'desc')
            ->get();

        return view('dashboard.division',[
            'locations'=>$locations,
        ]);

    }


    public function district(Request $request){

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
        $user = auth()->user();

        $locations = DB::table('com_location')
            ->select('com_location.name', DB::raw('count(reg_participant.id) as participant_count'))
            ->leftJoin('reg_participant', 'com_location.id', '=', 'reg_participant.district_id')
            ->leftJoin('trn_participant_enroll', 'reg_participant.id', '=', 'trn_participant_enroll.reg_participant_id')
            ->leftJoin('trn_batch', 'trn_participant_enroll.trn_batch_id', '=', 'trn_batch.id')
            ->leftJoin('trn_course', 'trn_participant_enroll.trn_course_id', '=', 'trn_course.id')

            ->where('com_location.is_active', 1)
            ->where('com_location.location_type', '=','DISTRICT')
            ->where('trn_batch.com_training_center_id', $user->com_training_center_id)
            ->whereDate('trn_batch.training_start_date','>=', $startdate)
            ->whereDate('trn_batch.training_end_date','<=', $enddate)

            ->groupBy('reg_participant.district_id')
            ->orderBy('participant_count', 'desc')
            ->get();

        return view('dashboard.district',[
            'locations'=>$locations,
        ]);

    }

    public function training(Request $request)
    {
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
        $user = auth()->user();
        $courses = DB::table('trn_course')
            ->select('trn_course.name', DB::raw('count(trn_participant_enroll.id) as participant_count'))
            ->leftJoin('trn_participant_enroll', 'trn_course.id', '=', 'trn_participant_enroll.trn_course_id')
            ->leftJoin('trn_batch', 'trn_participant_enroll.trn_batch_id', '=', 'trn_batch.id')
            ->where('trn_course.is_active', 1)
            ->where('trn_batch.com_training_center_id', $user->com_training_center_id)
            ->whereDate('trn_batch.training_start_date','>=', $startdate)
            ->whereDate('trn_batch.training_end_date','<=', $enddate)
            ->groupBy('trn_participant_enroll.trn_course_id')
            ->orderBy('participant_count', 'desc')
            ->having('participant_count', '>', 0)
            ->get();
        return view('dashboard.training', [
            'courses' => $courses,
        ]);

    }

    public function designation(Request $request){

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
        $user = auth()->user();

        $designations = DB::table('set_up_data_com')
            ->select('set_up_data_com.name', DB::raw('count(reg_participant.id) as participant_count'))
            ->leftJoin('reg_participant', 'set_up_data_com.id', '=', 'reg_participant.com_designation_id')
            ->leftJoin('trn_participant_enroll', 'reg_participant.id', '=', 'trn_participant_enroll.reg_participant_id')
            ->leftJoin('trn_batch', 'trn_participant_enroll.trn_batch_id', '=', 'trn_batch.id')
            ->leftJoin('trn_course', 'trn_participant_enroll.trn_course_id', '=', 'trn_course.id')
            ->where('set_up_data_com.is_active', 1)
            ->where('reg_participant.is_active', 1)
            ->where('trn_batch.com_training_center_id', $user->com_training_center_id)
            ->whereDate('trn_batch.training_start_date','>=', $startdate)
            ->whereDate('trn_batch.training_end_date','<=', $enddate)

            ->where('set_up_data_com.keyword', '=','COM_DESIGNATION')
            ->groupBy('reg_participant.com_designation_id')
            ->orderBy('participant_count', 'desc')
            ->having('participant_count', '>', 3)
            ->limit(20)
            ->get();

        return view('dashboard.designation',[
            'designations'=>$designations,
        ]);


    }

    public function gender(Request $request){
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
        $user = auth()->user();

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

//        $totalFEMALE = DB::table('reg_participant')->where('com_gender', 'FEMALE')->where('is_active', 1)->count();
//        $totalTALE = DB::table('reg_participant')->where('com_gender', 'MALE')->where('is_active', 1)->count();
        return view('dashboard.gender',[
            'totalFEMALE'=>$totalFEMALE,
            'totalTALE'=>$totalTMALE,
        ]);
    }


    public function highesttraining(Request $request){

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
        $user = auth()->user();

        $highesttrainings = DB::table('reg_participant')
            ->select('reg_participant.name', DB::raw('count(trn_participant_enroll.reg_participant_id) as participant_count'))
            ->leftJoin('trn_participant_enroll', 'reg_participant.id', '=', 'trn_participant_enroll.reg_participant_id')
            ->leftJoin('trn_batch', 'trn_participant_enroll.trn_batch_id', '=', 'trn_batch.id')
            ->leftJoin('trn_course', 'trn_participant_enroll.trn_course_id', '=', 'trn_course.id')
            ->where('trn_batch.com_training_center_id', $user->com_training_center_id)
            ->whereDate('trn_batch.training_start_date','>=', $startdate)
            ->whereDate('trn_batch.training_end_date','<=', $enddate)
            ->where('reg_participant.is_active', 1)
            ->groupBy('trn_participant_enroll.reg_participant_id')
            ->orderBy('participant_count', 'desc')
            ->having('participant_count', '>', 1)
            ->limit(20)
            ->get();
        return view('graph.highesttraining',[
            'highesttrainings'=>$highesttrainings,
        ]);
    }

    public function maxtrainner(Request $request){
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
        $user = auth()->user();

        $maxtrainners = DB::table('trn_trainer')
            ->select('trn_trainer.trainer_name', DB::raw('count(trn_session_detail.trn_trainer_id) as trainer_count'))
            ->leftJoin('trn_session_detail', 'trn_trainer.id', '=', 'trn_session_detail.trn_trainer_id')
            ->where('trn_trainer.is_active', 1)
            ->where('trn_session_detail.is_active', 1)
            ->where('trn_trainer.com_training_center_id', $user->com_training_center_id)
            ->groupBy('trn_session_detail.trn_trainer_id')
            ->orderBy('trainer_count', 'desc')
            ->having('trainer_count', '>', 1)
            ->limit(20)
            ->get();
        return view('graph.maxtrainner',[
            'maxtrainners'=>$maxtrainners,
        ]);


    }

    public function ongoingtraining( Request $request){

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
        $user = auth()->user();

        $ongoingtrainings = DB::table('trn_batch')
            ->select('trn_batch.*','com_training_center.name as training_center_name', 'trn_course.name as course_name')
            ->leftJoin('com_training_center', 'trn_batch.com_training_center_id', '=', 'com_training_center.id')
            ->leftJoin('trn_course', 'trn_batch.trn_course_id', '=', 'trn_course.id')
            ->where('com_training_center.is_active', 1)
            ->where('trn_course.is_active', 1)
            ->where('trn_batch.is_approved', 1)
            ->where('trn_batch.com_training_center_id', $user->com_training_center_id)
            ->whereDate('trn_batch.training_start_date','>=', $startdate)
            ->whereDate('trn_batch.training_end_date','<=', $enddate)

            ->orderBy('trn_batch.name', 'asc')
            ->paginate(20);
     //   dd($ongoingtrainings);
        return view('dashboard.ongoingtraining',[
            'ongoingtrainings'=>$ongoingtrainings,
        ]);


    }
}
