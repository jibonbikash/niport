<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SetUpdataCom extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table = 'set_up_data_com';
    protected $guarded = [];
}
