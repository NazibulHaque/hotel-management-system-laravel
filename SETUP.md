# Casa Ulika — Laravel Setup

This folder contains the Laravel-specific files (migrations, models,
controllers, routes, views, and assets) for converting the static
Casa Ulika site into a dynamic Laravel app with a content admin panel.

It is **not** a full Laravel installation — I can't run `composer` or
`php` in this sandbox (no package registry access), so you'll create
a fresh Laravel project locally and merge these files in.

## 1. Create a fresh Laravel app

```bash
composer create-project laravel/laravel casa-ulika
cd casa-ulika
```

Set up your `.env` with a database (MySQL/SQLite/Postgres — SQLite is
fastest to get started):

```bash
touch database/database.sqlite
```
In `.env`, set:
```
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/casa-ulika/database/database.sqlite
```
(remove/comment the other DB_* lines)

## 2. Copy these files in

Copy the contents of this package into your new project, **overwriting**
`routes/web.php` and `database/seeders/DatabaseSeeder.php`:

- `app/Models/*` → `app/Models/`
- `app/Http/Controllers/*` (including `Admin/`) → `app/Http/Controllers/`
- `database/migrations/*` → `database/migrations/`
- `database/seeders/*` → `database/seeders/`
- `resources/views/*` → `resources/views/`
- `routes/web.php` → `routes/web.php` (overwrite)
- `public/css`, `public/js`, `public/images` → `public/`

## 3. Migrate and seed

```bash
php artisan migrate --seed
```

This creates the tables and seeds:
- The 4 rooms, 12 gallery images, and 6 testimonials from the original static site
- An admin user: **admin@casaulika.example / password**
  (change this immediately — see step 5)

## 4. Run it

```bash
php artisan serve
```

- Public site: http://127.0.0.1:8000
- Admin login: http://127.0.0.1:8000/admin/login

## 5. Change the seeded admin password

```bash
php artisan tinker
>>> $u = App\Models\User::first();
>>> $u->password = Hash::make('a-new-strong-password');
>>> $u->save();
```

## What's included

| Area | Details |
|---|---|
| **Public pages** | Home, About, Rooms, Gallery, Testimonials, Contact — all pulling from the database instead of hardcoded HTML |
| **Contact form** | Server-validated, stores each submission as an `Enquiry`, shows a success message |
| **Admin panel** | `/admin` — login required. CRUD for Rooms, Gallery images, Testimonials. View/update-status/delete for Enquiries. Dashboard with counts + recent enquiries |
| **Auth** | Laravel's built-in session auth (`Auth::attempt`), no extra packages (Breeze/Jetstream) — kept deliberately minimal |
| **Styling** | Original `styles.css` reused as-is for the public site; admin panel has its own small inline stylesheet so it doesn't depend on the public theme |

## Notes / things you may want to adjust

- Gallery and room images that were already remote (picsum.photos URLs)
  are stored as full URLs in the DB and rendered directly. Local images
  (jpg/webp files) are stored as relative paths and resolved via
  `asset()` — swap these for real photography whenever you have it.
- The `Room` → `Enquiry` link is via `room_id` (nullable), matched from
  the contact form's room `slug`.
- No booking/availability logic is included (rooms don't get "blocked"
  by dates) — you chose the content + admin panel scope. Let me know if
  you want to extend to real availability later.
- Route names all follow Laravel resource conventions (`admin.rooms.edit`,
  etc.) so `php artisan route:list` gives you the full map.
