<?php


namespace App\Helpers;

use Illuminate\Support\Facades\DB;
class Participant
{
    public static function totaltraining($participantID)
    {
        return DB::table('trn_participant_enroll')->where('reg_participant_id', $participantID)->count();

    }
}
