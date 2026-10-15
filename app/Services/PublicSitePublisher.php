<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PublicSitePublisher
{
    /**
     * Queue a new static deployment only after the caller has persisted its
     * database change. A failed hook never rolls back editorial work.
     */
    public function trigger(string $source): string
    {
        $hookUrl = (string) config('public-site.deploy_hook_url');

        if ($hookUrl === '') {
            return 'Konten tersimpan. Publikasi otomatis belum dikonfigurasi.';
        }

        if (! filter_var($hookUrl, FILTER_VALIDATE_URL)) {
            Log::warning('Public-site deploy hook is invalid.', ['source' => $source]);

            return 'Konten tersimpan, tetapi URL publikasi belum valid.';
        }

        try {
            $response = Http::acceptJson()->timeout(10)->post($hookUrl);

            if ($response->successful()) {
                return 'Konten tersimpan dan publikasi website sudah dijadwalkan.';
            }

            Log::warning('Public-site deploy hook was rejected.', [
                'source' => $source,
                'status' => $response->status(),
            ]);
        } catch (\Throwable) {
            Log::warning('Public-site deploy hook could not be reached.', [
                'source' => $source,
            ]);
        }

        return 'Konten tersimpan, tetapi publikasi website belum dapat dijadwalkan. Coba lagi dari tombol Publish website.';
    }
}
