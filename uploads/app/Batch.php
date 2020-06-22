<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table = 'trn_batch';
    protected $fillable = [
        'version', 'code', 'com_training_center_id', 'created_by_id', 'created_date','duration','initialization_date','is_approved','modified_by_id','modified_date',
        'name','no_of_participant','no_of_participant_reg','training_end_date','training_start_date','trn_batch_status','trn_course_id','trn_training_schedule_id', 'batch_coordinator_id', 'batch_no'

    ];

    public function training_center()
    {
        return $this->belongsTo('App\TrainingCenter','com_training_center_id');
    }

    public function Course()
    {
        return $this->belongsTo('App\Course','trn_course_id');
    }


}
