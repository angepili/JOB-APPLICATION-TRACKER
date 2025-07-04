<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model {

    public function up() {
        Schema::create('reminders', function( Blueprint $table ) {
            $table->id();
            $table->foreignId('application_id')->constrained()->onDelete('cascade');
            $table->dateTime('reminder_date');
            $table->string('type')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

}
