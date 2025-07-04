<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model {
   
    protected $fillable = [
        'role','company_id','application_date','status_id','notes','job_link','user_id'
    ];

    public function user() {
        return $this->belongsTo( User::class );
    }

    public function company() {
        return $this->belongsTo( Company::class );
    }

    public function status() {
        return $this->belongsTo( Status::class );
    }

    public function reminders() {
        return $this->hasMany( Reminder::class );
    }

}
