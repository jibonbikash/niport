<?php

namespace App\Http\Controllers;

use App\Batch;
use App\Course;
use App\Trainer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrainerController extends Controller
{
    //
    public function index( Request $request){
        $user = auth()->user();

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

        $trainers = Trainer::with(['designation', 'organization', 'grade', 'training_center', 'session_detail' => function ($query) use ($startdate, $enddate) {
            $query->whereDate('session_date', '>=', $startdate)
                ->whereDate('session_date', '<=', $enddate);
        }])->where('com_training_center_id', $user->com_training_center_id)
            ->paginate(20);

        return view('trainer.index',[
            'trainers'=>$trainers,
        ]);

    }


    public function admin( Request $request){
        $user = auth()->user();
$trainingcenterlist= User::with(['training_center'])->whereNotNull('com_training_center_id')->get();
//dd($trainingcenterlist);
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

        $trainers = Trainer::with(['designation', 'organization', 'grade', 'training_center', 'session_detail' => function ($query) use ($startdate, $enddate) {
            $query->whereDate('session_date', '>=', $startdate)
                ->whereDate('session_date', '<=', $enddate);
        }])
            ->when($request->input('com_training_center_id'), function ($q) use ($request){
                return  $q->where('com_training_center_id', $request->input('com_training_center_id'));
            })

            ->paginate(20);

        return view('trainer.admin',[
            'trainers'=>$trainers,
            'trainingcenters'=>$trainingcenterlist,
        ]);

    }
    public function details(Request $request, $id){

        $trainerDetails = Trainer::with(['designation', 'organization', 'grade', 'training_center', 'session_detail'])->find($id);
        return view('trainer.details',[
            'trainerDetails'=>$trainerDetails,
        ]);
    }

    public function preprotest( Request $request){

       $batches= Batch::with(['Course','training_center'])
           ->when($request->input('course_id'), function ($q) use ($request){
               return  $q->where('trn_course_id', $request->input('course_id'));
           })
           ->paginate(20);

        $batcheslist= Batch::all()->pluck('name', 'id')->toArray();
        $courseslist= Course::all()->pluck('name', 'id')->toArray();
        return view('trainer.preprotest',[
            'batches'=>$batches,
            'batcheslist'=>$batcheslist,
            'courseslist'=>$courseslist,
        ]);
    }

}
