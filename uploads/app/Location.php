<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table = 'com_location';
    protected $fillable = [
        'code', 'is_active', 'is_disbursable', 'location_type', 'name','name_bn','description',

    ];
}
