<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model {

    protected $fillable = ['application_id','reminder_date','type','notes'];

    public function application() {
        return $this->belongsTo( Application::class );
    }

}
