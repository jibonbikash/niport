<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParticipantEnroll extends Model
{
    //
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table = 'trn_participant_enroll';
    protected $guarded = [];

    public function participant()
    {
        return $this->belongsTo('App\Participant');
    }

    public function batch()
    {
        return $this->belongsTo('App\Batch', 'trn_batch_id');
    }

    public function course()
    {
        return $this->belongsTo('App\Course', 'trn_course_id');
    }


}
