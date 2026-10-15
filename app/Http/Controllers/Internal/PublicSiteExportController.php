<?php

namespace App\Http\Controllers\Internal;

use App\Http\Controllers\Controller;
use App\Services\PublicSiteSnapshot;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PublicSiteExportController extends Controller
{
    public function __invoke(Request $request, PublicSiteSnapshot $snapshot): JsonResponse
    {
        $configuredToken = (string) config('public-site.export_token');
        $providedToken = (string) ($request->bearerToken() ?: $request->header('X-Public-Export-Token'));

        abort_unless($configuredToken !== '' && hash_equals($configuredToken, $providedToken), 404);

        return response()->json([
            'version' => 1,
            'generated_at' => now()->toIso8601String(),
            'data' => $snapshot->data(),
            'pages' => $snapshot->renderedPages(),
        ])->header('Cache-Control', 'no-store, private');
    }
}
