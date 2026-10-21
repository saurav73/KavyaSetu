# Authentication Guide — KavyaSetu

How user authentication works in the KavyaSetu poem sharing app.

## Routes

**Guest only** (`guest` middleware — logged-in users are redirected away):

| Method | URL | Action |
|---|---|---|
| GET | `/register` | Show registration form |
| POST | `/register` | Create the account |
| GET | `/login` | Show login form |
| POST | `/login` | Sign in |

**Logged-in users** (`auth` middleware):

| Method | URL | Action |
|---|---|---|
| POST | `/logout` | Sign out |
| GET | `/poems/create` | New poem form |
| POST | `/poems` | Save a new poem as a draft (visible only to its author) |
| GET | `/poems/{slug}/edit` | Edit form (author only) |
| PUT | `/poems/{slug}` | Update (author only), incl. publish/unpublish via the form's "Publish" checkbox |
| DELETE | `/poems/{slug}` | Delete (author only) |

## Rules

- Anyone can read the public feed and published poems — no account needed.
- Writing, editing, and deleting poems requires an account.
- Drafts (`is_published = false`) return 404 for everyone except the author.
- Edit/delete additionally go through the poem policy: only the author passes.
- The login form has a "Remember me" checkbox; checked logins persist across
  browser restarts via Laravel's remember-me cookie.
- Login regenerates the session ID, logout invalidates the session and its CSRF token.

## Trying it locally

1. `php artisan serve` and open `http://127.0.0.1:8000`
2. Go to `/register`, create an account (name, email, password min 8 chars)
3. Open `/poems/create`, write a poem — it saves as a draft, visible only to you
4. Log out — your published poem is still on the public feed; drafts are hidden
