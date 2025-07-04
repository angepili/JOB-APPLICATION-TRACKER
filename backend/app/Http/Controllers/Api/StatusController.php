<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Status;

class StatusController extends Controller {
    
    public function index() {
        return Status::class();
    }

    public function show( Status $status ) {
        return $status;
    }

}
