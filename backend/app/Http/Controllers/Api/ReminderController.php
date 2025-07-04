<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Reminder;

class ReminderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return Reminder::with('application')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $data = $request->validate([
            'application_id' => 'required|exists:applications,id',
            'reminder_date' => 'required|date',
            'type' => 'nullable|string|max:255',
            'notes' => 'nullable|string'
        ]);
        return Reminder::create( $data );
    }

    /**
     * Display the specified resource.
     */
    public function show( Reminder $reminder ) {
        return $reminder->load('application');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reminder $reminder ) {
        $data = $request->validate([
            'reminder_date' => 'sometimes|required|date',
            'type' => 'nullable|string|max:255',
            'notes' => 'nullable|string'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Reminder $reminder ) {
        $reminder->delete();
        return response()->noContent();
    }
}
