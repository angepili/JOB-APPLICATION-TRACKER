<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Company::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'industry' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
        ]);

        return Company::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show( Company $company ) {
        return $company;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company ) {
        $data = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'industry' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255'
        ]);

        $company->update( $data );

        return $company;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Company $company ) {
        $company->delete();
        return response()->noContent();
    }
}
