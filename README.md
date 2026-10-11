# KavyaSetu — a bridge connecting poets and poems

A poem sharing web app built with **Laravel (PHP)**. Poets can publish poems, keep drafts private, and browse a public feed of published work.

## Features

- **Publish poems** — title + body, with clean slug-based URLs (`/poems/{slug}`)
- **Drafts stay private** — unpublished poems are visible only to their author (404 for everyone else)
- **Ownership policies** — only the author can edit or delete a poem
- **Auth** — register, login, logout; poem management routes are behind `auth` middleware
- **Public feed** — latest published poems, 12 per page
- **My poems** — a personal dashboard of everything you've written

## Tech

Laravel, Eloquent ORM, Blade views, Form Requests for validation, Policies for authorization.

## Setup

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
composer run dev        # or: php artisan serve
```

Open `http://127.0.0.1:8000`, register an account, and publish your first poem.

## Project structure

| Path | What it is |
|---|---|
| `app/Http/Controllers/PoemController.php` | Poem CRUD, publishing, ownership checks |
| `app/Http/Controllers/AuthController.php` | Register / login / logout |
| `app/Models/Poem.php` | Poem model — slugs, publishing, soft deletes |
| `routes/web.php` | Public poem feed + guest/auth route groups |
| `AUTHENTICATION_GUIDE.md` | How authentication works in this app |
| `CHANGELOG.md` | Dated history of what was built |
