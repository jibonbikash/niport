<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrainingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function ongoing(Request $request, $slug){
        $user = auth()->user();
        $ongoingtrainings = DB::table('trn_batch')
            ->select('trn_batch.*','com_training_center.name as training_center_name', 'trn_course.name as course_name')
            ->leftJoin('com_training_center', 'trn_batch.com_training_center_id', '=', 'com_training_center.id')
            ->leftJoin('trn_course', 'trn_batch.trn_course_id', '=', 'trn_course.id')
            ->where('com_training_center.is_active', 1)
            ->where('trn_course.is_active', 1)
            ->where([
                ['trn_batch.is_approved', 1],
                ['trn_batch.trn_batch_status', $slug],
                ['trn_batch.com_training_center_id', $user->com_training_center_id],
            ])
            ->orderBy('trn_batch.name', 'asc')
            ->get();
        return view('dashboard.home.ongoing',[
            'ongoingtrainings'=>$ongoingtrainings,


        ]);

        //dd($ongoingtrainings);
    }
}
