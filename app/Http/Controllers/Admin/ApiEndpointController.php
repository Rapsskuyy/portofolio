<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ApiEndpoint;
use Illuminate\Http\Request;

class ApiEndpointController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if ($request->query('key') !== 'raffa') {
                abort(403, 'Unauthorized');
            }
            return $next($request);
        });
    }

    public function index(Request $request)
    {
        $endpoints = ApiEndpoint::orderBy('order')->get();
        return view('admin.api-endpoints.index', compact('endpoints'));
    }

    public function create(Request $request)
    {
        return view('admin.api-endpoints.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'method' => 'required|in:GET,POST,PUT,DELETE',
            'endpoint' => 'required|string|max:255',
            'description' => 'nullable|string',
            'example_response' => 'nullable|string',
            'is_active' => 'boolean',
            'order' => 'integer',
        ]);

        ApiEndpoint::create($validated);

        return redirect()->route('admin.api-endpoints.index', ['key' => 'raffa'])
            ->with('success', 'API Endpoint created successfully.');
    }

    public function edit(Request $request, ApiEndpoint $apiEndpoint)
    {
        return view('admin.api-endpoints.edit', compact('apiEndpoint'));
    }

    public function update(Request $request, ApiEndpoint $apiEndpoint)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'method' => 'required|in:GET,POST,PUT,DELETE',
            'endpoint' => 'required|string|max:255',
            'description' => 'nullable|string',
            'example_response' => 'nullable|string',
            'is_active' => 'boolean',
            'order' => 'integer',
        ]);

        $apiEndpoint->update($validated);

        return redirect()->route('admin.api-endpoints.index', ['key' => 'raffa'])
            ->with('success', 'API Endpoint updated successfully.');
    }

    public function destroy(Request $request, ApiEndpoint $apiEndpoint)
    {
        $apiEndpoint->delete();

        return redirect()->route('admin.api-endpoints.index', ['key' => 'raffa'])
            ->with('success', 'API Endpoint deleted successfully.');
    }
}
