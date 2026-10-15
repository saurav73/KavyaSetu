# KavyaSetu Changelog

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
