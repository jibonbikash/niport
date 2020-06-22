<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table = 'trn_trainer';
    protected $guarded = [];

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

    public function training_center()
    {
        return $this->belongsTo('App\TrainingCenter','com_training_center_id');
    }
    public function session_detail()
    {
        return $this->hasMany('App\SessionDetail','trn_trainer_id');
    }



}
