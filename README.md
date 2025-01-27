# Todo Laravel Application

A task management app built with Laravel, featuring task tracking, ES entries, and a calendar view.

## Prerequisites

Make sure the following are installed on your system before you begin:
- PHP ^8.2
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/) (with npm)
- MySQL or any other database supported by Laravel

## Installation Steps

1. **Clone the repository**
   ```bash
   git clone https://github.com/ryotasuyama/todo_laravel.git
   cd todo_laravel
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Set up the environment**
   ```bash
   # Copy the example environment file
   cp .env.example .env

   # Generate the application key
   php artisan key:generate
   ```

5. **Configure the database**
   Open the `.env` file and update the database settings with your credentials:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_user
   DB_PASSWORD=your_database_password
   ```

6. **Run database migrations**
   ```bash
   php artisan migrate
   ```

## Running the Application

1. **Start the Laravel development server**
   ```bash
   php artisan serve
   ```

2. **Compile assets and watch for changes**
   Open a new terminal and run:
   ```bash
   npm run dev
   ```

Your application will be available at `http://localhost:8000`.

---

## Additional Setup Instructions

### Tools Required

Ensure these tools are installed:

- [PHP](https://www.php.net/manual/ja/install.windows.php)
- [Node.js](https://qiita.com/sefoo0104/items/0653c935ea4a4db9dc2b)
- [XAMPP](https://www.apachefriends.org/jp/download.html)

### Setting up the Environment

If the `cp` command is unavailable, you can manually create a `.env` file and copy the contents from `.env.example`. Update the following in the file:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

### Generate Application Key

Run the following to generate the application key:

```bash
php artisan key:generate
```

### Set Up Session Storage

In the `.env` file, ensure this setting is present:

```env
SESSION_DRIVER=database
```

Then create the session table and migrate:

```bash
php artisan session:table
php artisan migrate
```

Afterwards, change the session driver to `file`:

```env
SESSION_DRIVER=file
```

Clear the cache to apply changes:

```bash
php artisan config:cache
```

If you update the database settings, clear the cache again:

```bash
php artisan config:clear
```

Finally, run migrations to ensure everything is up to date:

```bash
php artisan migrate
```

### Starting Servers

Start the Laravel server:

```bash
php artisan serve
```

Start the frontend development server:

```bash
npm run dev
```

---

## Features

- Task Management
- Calendar View
- ES Entry System

## License

This project is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
