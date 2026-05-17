# 📒 Catatku - CodeIgniter 4

Catatku is a personal journal application built as a demo project for the Learn CodeIgniter 4 for Beginners course.

The application is built from scratch across 12 structured lessons, following modern CodeIgniter 4 conventions and PHP 8.3 best practices. By following this project, you will understand how different CodeIgniter components connect to form a real-world application.

**Course URL:** [Learn CodeIgniter 4 for Beginners: Build a Personal Journal App from Scratch](https://qadrlabs.com/course/learn-codeigniter-4-for-beginners-build-a-personal-journal-app-from-scratch)

## 📋 Requirements

Make sure your environment meets the following requirements before getting started:

- PHP >= 8.1
- Composer
- MySQL / MariaDB
- Git

## 🚀 Local Setup

### 1. Clone the Repository

```bash
git clone https://github.com/qadrLabs/catatku-codeigniter4.git
cd catatku-codeigniter4
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Configure Environment

Copy the `env` file to `.env`, then adjust the database and base URL configuration:

```bash
cp env .env
```

Open the `.env` file and update the following values:

```env
app.baseURL = 'http://localhost:8080/'

database.default.hostname = localhost
database.default.database = catatku
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
```

### 4. Create the Database

Create a new database in MySQL/MariaDB named `catatku` (or whatever you set in your `.env` file).

### 5. Run Migrations

```bash
php spark migrate
```

### 6. (Optional) Run Seeders

```bash
php spark db:seed DatabaseSeeder
```

### 7. Start the Application

```bash
php spark serve
```

Open your browser and navigate to: [http://localhost:8080](http://localhost:8080)

---

## 📁 Directory Structure

```
catatku-codeigniter4/
├── app/
│   ├── Controllers/
│   ├── Models/
│   ├── Views/
│   └── Database/
│       ├── Migrations/
│       └── Seeds/
├── public/
├── writable/
├── env
└── composer.json
```

## 🛠️ Tech Stack

- [CodeIgniter 4](https://codeigniter.com/) - PHP Framework
- MySQL / MariaDB - Database
- Bootstrap - Frontend CSS Framework

## 📄 License

This project is licensed under the [MIT License](LICENSE).
