<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table = 'trn_course';
    protected $fillable = [
        'version', 'attachment', 'code', 'coordinator_id', 'created_by_id','created_date','description','duration','exam_source_fund_id','is_active',
        'is_attendance_taken','modified_by_id','modified_date','name','objective','trn_collaboration_id','post_test_mark','pre_test_mark'

    ];

}
