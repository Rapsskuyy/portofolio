<?php

return [
    /*
     * Used only by the static-site build to fetch the public content snapshot.
     * Leave this unset until a unique server-side value is configured in Vercel.
     */
    'export_token' => env('PUBLIC_CONTENT_EXPORT_TOKEN'),

    /* A server-side Vercel deploy hook for the separate static project. */
    'deploy_hook_url' => env('PUBLIC_SITE_DEPLOY_HOOK_URL'),
];
