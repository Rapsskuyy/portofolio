<?php

namespace App\Http\Controllers;

use App\Models\MockApi;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class MockApiController extends Controller
{
    /**
     * Admin: List all mock APIs
     */
    public function index(Request $request)
    {
        if ($request->query('key') !== 'raffa') {
            abort(403, 'Akses Ditolak. Gunakan kunci yang benar.');
        }

        $apis = MockApi::latest()->get();
        return view('admin.mock_apis', compact('apis'));
    }

    /**
     * Admin: Store new mock API
     */
    public function store(Request $request)
    {
        if ($request->query('key') !== 'raffa') {
            abort(403, 'Akses Ditolak. Gunakan kunci yang benar.');
        }

        $validated = $request->validate([
            'path' => 'required|string|max:100',
            'method' => 'required|in:GET,POST',
            'response_body' => 'required|string',
            'description' => 'nullable|string|max:500',
        ]);

        // Validate JSON
        $decoded = json_decode($validated['response_body'], true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return back()->withErrors(['response_body' => 'Response body harus berupa JSON yang valid.'])->withInput();
        }

        $validated['response_body'] = $decoded;
        $validated['is_active'] = true;

        MockApi::create($validated);

        return back()->with('success', 'Mock API berhasil ditambahkan!');
    }

    /**
     * Admin: Update mock API
     */
    public function update(Request $request, MockApi $mockApi)
    {
        if ($request->query('key') !== 'raffa') {
            abort(403, 'Akses Ditolak. Gunakan kunci yang benar.');
        }

        $validated = $request->validate([
            'path' => 'required|string|max:100',
            'method' => 'required|in:GET,POST',
            'response_body' => 'required|string',
            'description' => 'nullable|string|max:500',
            'is_active' => 'boolean',
        ]);

        $decoded = json_decode($validated['response_body'], true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return back()->withErrors(['response_body' => 'Response body harus berupa JSON yang valid.'])->withInput();
        }

        $validated['response_body'] = $decoded;
        $validated['is_active'] = $request->has('is_active');

        $mockApi->update($validated);

        return back()->with('success', 'Mock API berhasil diperbarui!');
    }

    /**
     * Admin: Delete mock API
     */
    public function destroy(Request $request, MockApi $mockApi)
    {
        if ($request->query('key') !== 'raffa') {
            abort(403, 'Akses Ditolak. Gunakan kunci yang benar.');
        }

        $mockApi->delete();
        return back()->with('success', 'Mock API berhasil dihapus!');
    }

    /**
     * Public: Handle API playground requests
     */
    public function handleRequest(string $path): JsonResponse
    {
        $method = request()->method();

        $api = MockApi::where('path', $path)
            ->where('method', $method)
            ->where('is_active', true)
            ->first();

        if (!$api) {
            return response()->json([
                'error' => true,
                'message' => 'Endpoint not found',
                'path' => "/api/v1/{$path}",
                'method' => $method,
                'timestamp' => now()->toIso8601String(),
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $api->response_body,
            'meta' => [
                'endpoint' => "/api/v1/{$path}",
                'method' => $method,
                'timestamp' => now()->toIso8601String(),
                'powered_by' => 'Raffa Portfolio API',
            ],
        ]);
    }
}
