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
