<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    //
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table = 'reg_participant';
    protected $fillable = [
        'version', 'auth_user_id', 'birth_reg_no', 'com_designation_id', 'com_gender','com_grade_id','com_organization_id','com_religion','created_by_id','created_date',
        'date_of_birth','district_id','division_id','email','emergency_contact','house','hris_id','is_active','joining_date','mobile_no',
        'modified_by_id','modified_date','name','name_bn','nid','niport_code','road','staff_id','union_parishad_id','upazila_id','village','ward_id'

    ];
    public function participantEnroll()
    {
        return $this->hasMany('App\ParticipantEnroll','reg_participant_id');
    }

    public function participantCOMPLETED()
    {
        return $this->hasMany('App\ParticipantEnroll','reg_participant_id')->where('trn_participant_status', 'COMPLETED');
    }


    public function participantENROLLED()
    {
        return $this->hasMany('App\ParticipantEnroll','reg_participant_id')->where('trn_participant_status', 'ENROLLED');
    }

    public function participantCLOSE()
    {
        return $this->hasMany('App\ParticipantEnroll','reg_participant_id')->where('trn_participant_status', 'CLOSED');
    }


    public function designation()
    {
        return $this->belongsTo('App\SetUpdataCom','com_designation_id');
    }
    public function organization()
    {
        return $this->belongsTo('App\SetUpdataCom','com_organization_id');
    }

    public function grade()
    {
        return $this->belongsTo('App\SetUpdataCom','com_grade_id');
    }


    public function district()
    {
        return $this->belongsTo('App\Location','district_id');
    }

    public function division()
    {
        return $this->belongsTo('App\Location','division_id');
    }
    public function upazila()
    {
        return $this->belongsTo('App\Location','upazila_id');
    }




}
