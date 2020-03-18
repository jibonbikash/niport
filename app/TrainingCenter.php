<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingCenter extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table = 'com_training_center';
    protected $fillable = [
        'version', 'address', 'email', 'location', 'name','phone_no','is_active','latitude','longitude',
    ];

    public function training_center()
    {
        return $this->hasMany('App\User','com_training_center_id');
    }

}
