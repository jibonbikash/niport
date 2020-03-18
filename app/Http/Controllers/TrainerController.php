<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrainerController extends Controller
{
    //
    public function index( Request $request){
        $user = auth()->user();
        $trainers = DB::table('trn_trainer')
            ->where('com_training_center_id', $user->com_training_center_id)
            ->get();
        dd($trainers);

    }
}
