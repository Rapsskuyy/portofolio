# Vercel preview setup for the public/static split

This repository now contains two Vercel project roots. Do not move the production domain until preview validation has passed.

## 1. Admin and backend project

Keep the current Laravel Vercel project as the backend. Its preview and eventual admin domain serve Laravel routes, the authenticated content export, Storage uploads, and the public submission endpoints.

Set these server-only environment variables in the Laravel project:

- Existing production-only database, Storage, and `APP_KEY` values.
- `APP_ENV=production`, `APP_DEBUG=false`, and the eventual `APP_URL=https://admin.raffanm17.my.id`.
- `PUBLIC_CONTENT_EXPORT_TOKEN`, a long unique random secret.
- `PUBLIC_SITE_DEPLOY_HOOK_URL`, the Vercel deploy hook created in the static public project.

Keep `SESSION_SECURE_COOKIE=true` in production and leave `SESSION_DOMAIN` scoped to the admin host unless there is a documented reason to share it. Never expose database credentials, Supabase service-role keys, Storage S3 keys, or the deploy hook in browser variables.

## 2. Static public project

Create a second Vercel project with **Root Directory** `static-site` and no framework preset. It uses `static-site/vercel.json` and its build output is `dist`.

Set these build-time environment variables in that project:

- `PUBLIC_CONTENT_EXPORT_URL=https://<backend-preview-or-admin-domain>/_internal/public-site-export`
- `PUBLIC_CONTENT_EXPORT_TOKEN`, exactly matching the backend secret.

They are build credentials only. Do not prefix them with `VITE_`, and do not place them in source files. The generated browser output contains rendered HTML and `public-content.json`, never the export token.

The static project proxies `/public-api/*` and `/api/v1/*` to `https://admin.raffanm17.my.id`. Before production cutover, update the static project configuration only if the chosen admin host differs.

## 3. Preview verification order

1. Deploy the backend preview, configure the export token, and request the internal export using its bearer token. It must return JSON only for an authorized request.
2. Deploy the static preview using that backend preview URL. Confirm each public route renders as a static document, without a Laravel session cookie.
3. Submit both public forms through the static preview. Verify validation, moderation, throttling, and success/error messages.
4. Sign in to the backend admin preview. Test CRUD, Supabase Storage upload, and the `Publish website` action. A successful hook queues a deployment but does not itself prove that the deployment completed.
5. Test 390px, tablet, and desktop views, keyboard focus, modal Escape behavior, and public API playground.
6. Run Lighthouse mobile and desktop on the static preview. Only proceed when Performance is at least 90 and no functional regression appears.

## 4. Production cutover, later

First bind and test `admin.raffanm17.my.id` on the Laravel project. Only after a separate approval, move apex and `www` to the static project using the exact DNS records shown by Vercel. Keep the previous Laravel deployment/domain assignment available for rollback.
