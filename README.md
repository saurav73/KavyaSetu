# KavyaSetu — a bridge connecting poets and poems

A poem sharing web app built with **Laravel 12 (PHP 8.2)**. Poets can publish poems, keep drafts private, and browse a public feed of published work.

## Features

- **Publish poems** — title + body, with clean slug-based URLs (`/poems/{slug}`)
- **Drafts stay private** — unpublished poems are visible only to their author (404 for everyone else)
- **Ownership policies** — only the author can edit or delete a poem
- **Auth** — register, login, logout; poem management routes are behind `auth` middleware
- **Public feed** — latest published poems, 12 per page
- **My poems** — a personal dashboard of everything you've written (10 per page, vs 12 on the public feed)

## Tech

Laravel, Eloquent ORM, Blade views, Form Requests for validation, Policies for authorization.

## Setup

```bash
composer install
cp .env.example .env
php artisan key:generate
# The default .env points at MySQL — create the `kavyasetu` database first
# (skip this step if you switch DB_CONNECTION to sqlite):
#   mysql -u root -p -e "CREATE DATABASE kavyasetu;"
php artisan migrate
composer run dev        # or: php artisan serve
```

Open `http://127.0.0.1:8000`, register an account, and publish your first poem.

## Tests

```bash
php artisan test
```

The suite is currently only the Laravel scaffold `ExampleTest`s (one Feature,
one Unit); there are no app-specific tests yet. Tests run on PHPUnit 11.

## Project structure

| Path | What it is |
|---|---|
| `app/Http/Controllers/PoemController.php` | Poem CRUD, publishing, ownership checks |
| `app/Http/Controllers/AuthController.php` | Register / login / logout |
| `app/Http/Controllers/Controller.php` | Base controller composing Laravel helper traits |
| `app/Http/Requests/` | PoemStoreRequest / PoemUpdateRequest input validation |
| `app/Policies/PoemPolicy.php` | Author-only edit/delete ownership rules |
| `app/Models/Poem.php` | Poem model — slugs, publishing, soft deletes |
| `routes/web.php` | Public poem feed + guest/auth route groups |
| `AUTHENTICATION_GUIDE.md` | How authentication works in this app |
| `CHANGELOG.md` | Dated history of what was built |
