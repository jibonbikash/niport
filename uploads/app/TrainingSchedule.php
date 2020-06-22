<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingSchedule extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table = 'trn_training_schedule';
    protected $fillable = [
        'version', 'com_training_center_id', 'created_by_id', 'created_date', 'end_date','is_active','modified_by_id','modified_date','remarks','schedule_code',
        'start_date','trn_course_id'

    ];

}
