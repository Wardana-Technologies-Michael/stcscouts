# STCSCOUTS — 16th Colombo Scout Group Web Portal

Official web portal of the 16th Colombo Scout Group of S. Thomas' College, Mount Lavinia
("The Tribe of the Evening Star"). Built with **Laravel 10**.

The site's Year Reports are stored in a database and managed through a
password-protected admin area, so reports can be **added, edited and removed
through the website itself** — no code changes or redeployment needed.

---

## Requirements

- **PHP 8.1+** (with the usual extensions enabled: `pdo_sqlite`, `mbstring`, `openssl`, `fileinfo`)

That's all you need to run it. The PHP dependencies (`vendor/`), the
configuration (`.env`) and the SQLite database (already populated with every
report) are included in this repository, so the project runs straight after a
clone — no `composer install` or extra setup required.

## Running it locally

```bash
git clone <this-repo-url>
cd stcscouts
php artisan serve
```

Then open **http://127.0.0.1:8000** in your browser.

> If you ever get a "no application encryption key" error, run `php artisan key:generate`.

---

## Managing Year Reports (admin)

1. Go to **`/admin`** (e.g. `http://127.0.0.1:8000/admin`) and log in with the
   admin password.
2. The dashboard lists every report. From there you can:
   - **Add** a new report — title, year, type (annual report / event), and the
     content. Upload images with the built-in upload button, and add videos by
     pasting a YouTube/Vimeo embed.
   - **Edit** or **Delete** any existing report.
   - Save as a hidden **draft** until it's ready to publish.
3. Published reports appear immediately on the public **Year Reports** timeline
   (`/recent-year-reports`) under the correct year, and are added to
   `sitemap.xml` automatically.

### The admin password

The password is read from `ADMIN_PASSWORD` in the `.env` file. **Change it from
the default before going live:**

```dotenv
ADMIN_PASSWORD=your-strong-password-here
```

After editing `.env`, run `php artisan config:clear`.

---

## How it's built (quick map)

| Area | Where |
|------|-------|
| Routes | `routes/web.php` |
| Public report pages | `app/Http/Controllers/ReportController.php`, `resources/views/report-show.blade.php` |
| Reports timeline | `resources/views/recent-year-reports.blade.php` |
| Admin login + CRUD | `app/Http/Controllers/Admin/`, `resources/views/admin/` |
| Report data | `app/Models/Report.php`, `database/database.sqlite` |
| Uploaded images | `public/uploads/` |

Reports are stored in the `reports` table. The original reports were migrated in
with `php artisan reports:import` (a one-time command).

---

© 2003–2026 16th Colombo Scout Group of S. Thomas' College, Mount Lavinia. All rights reserved.
