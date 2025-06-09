# ProTrack

**ProTrack** is a powerful Laravel-based Admin Panel designed to efficiently manage clients, projects, tasks, and users. It includes built-in charts, role-based access control, and project reporting capabilities.

---

## 🚀 Features

- 🧑‍💼 **Admin Panel** for managing:
  - Clients
  - Projects
  - Tasks
  - Users

- 📊 **Dashboard** with:
  - Dynamic Bar Chart (Projects/Tasks)
  - Circle Chart (Project Status or Distribution)

- 🔐 **Role & Permission Management**
  - Integrated with [Spatie Laravel-Permission](https://spatie.be/docs/laravel-permission)
  - Restrict access to views, actions, and routes based on roles

- 📝 **Project Report Generation**
  - Downloadable report includes:
    - Project details
    - Associated tasks
    - Linked clients

---

## 🛠️ Tech Stack

- **Laravel 12**
- **Spatie Laravel-Permission**
- **Blade Templates**
- **Chart.js** for data visualization
- **Bootstrap 5**
- **DOMPDF** for PDF report generation

---

## 🔧 Installation

```bash
git clone https://github.com/MohammadMashaikh/protrack.git
cd protrack
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan storage:link

Make sure to set your DB credentials in the .env file.



👤 Admin Login
Default seeded admin credentials (from DatabaseSeeder.php):

Email: admin@admin.com
Password: password

You can change them later from the Users section.

📁 Folder Structure Highlights
app/Models/ — Eloquent Models (User, Project, Client, Task)

app/Http/Controllers/ — Core logic for resources

resources/views/dashboard.blade.php — Dashboard with charts

routes/web.php — Routes for admin and frontend access



🧩 Permissions
Handled by Spatie Roles & Permissions. You can assign:

view projects, edit tasks, manage users, etc.

Manage roles & permissions via UI or artisan commands.


📄 License
This project is open-source and available under the MIT license.



🙌 Contributions
Pull requests are welcome. For major changes, please open an issue first.






