# KavyaSetu Changelog


## 2026-10-28
- README: noted the test runner - the scaffold ExampleTests run on PHPUnit 11 (composer.json requires ^11.5.3)
- Re-verified pagination and slugs: public feed `simplePaginate(12)`, My Poems `simplePaginate(10)`, slugs auto-generated from titles

## 2026-10-27
- README: pinned PHP to 8.2 (composer.json requires ^8.2) and documented the test suite honestly - currently only the Laravel scaffold ExampleTests, no app-specific tests yet

## 2026-10-26
- README: pinned the framework to Laravel 12, matching `laravel/framework: ^12.0` in `composer.json`
- Re-verified the setup guide against `.env.example`: `DB_CONNECTION=mysql` and `DB_DATABASE=kavyasetu` match the documented MySQL defaults

## 2026-10-25
- README: documented that My Poems paginates 10 per page (`PoemController::myPoems` uses `simplePaginate(10)`), distinct from the public feed's 12
- Re-verified the authentication guide's claims against `AuthController`: remember-me is passed to `Auth::attempt`, login regenerates the session, logout invalidates it and regenerates the CSRF token — docs accurate

## 2026-10-24
- Re-verified README feature claims against `PoemController`: public feed is `simplePaginate(12)` as documented, draft visibility returns 404 for non-authors, publish/unpublish flows through `PoemUpdateRequest`'s `is_published` boolean; `AUTHENTICATION_GUIDE.md` route tables still match `routes/web.php` — no changes needed

## 2026-10-23
- Re-verified `AUTHENTICATION_GUIDE.md` against `routes/web.php`: all 15 routes (guest auth, poem CRUD, publish flow, `/my-poems`) documented accurately; `.env.example` MySQL defaults match the README setup guide — no doc changes needed


## 2026-10-22
- Removed the unused `Illuminate\Http\Request` import from `PoemController` (no method type-hints it; form requests carry the validation) — small hygiene fix

## 2026-10-21
- Fixed stale wording in `AUTHENTICATION_GUIDE.md`: the `POST /poems` row and the local-try steps said the create flow "publishes" a poem, but `PoemController@store` saves drafts — both now say the poem is saved as a draft; the `PUT /poems/{slug}` row notes the form's Publish checkbox as the real publish path
- Added the missing class-level docblock on `AppServiceProvider`, completing the class-docblock pass across models, controllers, form requests, and the poem policy

## 2026-10-20
- Fixed misleading create-flow copy: the create form's "Publish Poem" button and the "has been published" flash message implied new poems go live, but `PoemController@store` saves drafts (`is_published` defaults to false; publishing happens via the edit-form checkbox) — button now reads "Save Poem", flash says "saved as a draft"

## 2026-10-19
- README setup now notes that the `kavyasetu` MySQL database must exist before `php artisan migrate` runs
- Added a file-level docblock to `routes/web.php` describing the three route groups and why the authenticated routes must be registered before the public generic ones

## 2026-10-17
- Added class-level PHPDoc blocks to `Controller`, `PoemController`, and `AuthController`
- Added class-level PHPDoc blocks to `PoemStoreRequest` and `PoemUpdateRequest` (notes that `authorize()` returns true because auth is enforced by route middleware and ownership by `PoemPolicy`)
- Added class-level PHPDoc blocks to the `Poem` and `User` models
- Removed spurious `user_id` from `User` fillable (the users table has no such column; `user_id` lives on the poems table)
- Extended the README project-structure table with `Controller.php`, `app/Http/Requests/`, and `app/Policies/PoemPolicy.php`

## 2026-10-15
- Removed dead commented-out like/comment relationship stubs from `Poem` and `User` models
- Added docblock to `Poem::booted()` describing the auto slug generation hooks

## 2026-10-13
- Fixed `.env.example` leftovers from the original Todo-app template (`APP_NAME`, `DB_DATABASE`)
- Removed orphaned `TaskController` (unrouted, referenced the nonexistent `Task` model)
- Unified branding: `Poetry Haven` → `KavyaSetu` in layouts, auth views, welcome page, and the registration success message
- Documented the "Remember me" login option and session handling in `AUTHENTICATION_GUIDE.md`
- Added docblocks to `PoemPolicy` describing the author-only ownership rules

## 2026-10-11
- Rewrote stock Laravel README into a KavyaSetu project README
- Rewrote the template `AUTHENTICATION_GUIDE` (was for a Todo app) for KavyaSetu's auth
- Set `composer.json` project name/description (`saurav73/kavyasetu`)
- Added PHPDoc blocks to `PoemController` actions
- Added CHANGELOG covering the February 2026 build history

## 2026-02-13
- Defined the poem ownership policy and slug-based routing (`Define basic policy and the slug`)
- Adjusted the poem flow through the system (`change in the flow of the system`)

## 2026-02-09
- Laravel project setup for the Poem Sharing App (`Laravel Project setup for Poem Sharing App`)
- Initial setup fixes plus poem functionality: create/store poems, public feed (`fixing the initial setup and adding poem functionality`)
