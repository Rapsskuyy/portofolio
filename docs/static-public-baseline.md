# Static public-site baseline

Recorded before the static/public split.

| Area | Current observation | Target after phases 1-3 |
| --- | --- | --- |
| Public route rendering | Laravel Blade behind a Vercel Node-to-PHP function | Pre-rendered HTML at the Vercel CDN |
| Initial backend work | PHP bootstrap plus Supabase database queries | No PHP or database work for initial public render |
| Cache behavior | `Cache-Control: no-cache, private` and Laravel session cookies | Public cacheable HTML with no Laravel session cookie |
| Measured navigation response | Approximately 6.2 seconds during investigation | Re-measure on static preview before cutover |

Public routes included in the snapshot: `/`, `/portfolio`, `/about`, `/skills`, `/experience`, and `/guestbook`.

The guestbook and testimonial forms intentionally remain a phase 4 migration. Static output must not be promoted before their dedicated public endpoints exist.
