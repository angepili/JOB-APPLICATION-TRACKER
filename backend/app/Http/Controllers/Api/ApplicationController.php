<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Application::with(['company', 'status', 'reminders'])->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'role'             => 'required|string|max:255',
            'company_id'       => 'required|exists|companies,id',
            'application_date' => 'nullable|date',
            'status_id'        => 'required|exists:statuses,id',
            'notes'            => 'nullable|string',
            'job_link'         => 'nullable|url',
        ]);

        $data['user_id'] = auth()->id();

        return Application::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $application->load(['company', 'status', 'reminders']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Application $application)
    {
        $this->authorize('update', $application);

        $data = $request->validate([
            'role'             => 'required|string|max:255',
            'company_id'       => 'required|exists|companies,id',
            'application_date' => 'nullable|date',
            'status_id'        => 'required|exists:statuses,id',
            'notes'            => 'nullable|string',
            'job_link'         => 'nullable|url',
        ]);

        $application->update( $data );

        return $application->fresh();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Application $application ) {
        $this->authorize('delete', $application);
        $application->delete();

        return response()->noContent();
    }
}
