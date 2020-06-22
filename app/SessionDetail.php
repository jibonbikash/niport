<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SessionDetail extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table = 'trn_session_detail';
    protected $guarded = [];

    public function batch()
    {
        return $this->belongsTo('App\Batch','trn_batch_id');
    }

}
