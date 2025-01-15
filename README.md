# Todo Laravel Application

A task management application built with Laravel, featuring task tracking, ES entries, and calendar functionality.

## Prerequisites

Before you begin, ensure you have the following installed on your system:
- PHP ^8.2
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/) (with npm)
- MySQL or any other database supported by Laravel

## Installation Steps

1. Clone the repository
```bash
git clone https://github.com/ryotasuyama/todo_laravel.git
cd todo_laravel
```

2. Install PHP dependencies
```bash
composer install
```

3. Install Node.js dependencies
```bash
npm install
```

4. Environment Setup
```bash
# Copy the example environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

5. Configure your database
Edit the `.env` file and update the following variables with your database credentials:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

6. Run database migrations
```bash
php artisan migrate
```

## Running the Application

1. Start the Laravel development server
```bash
php artisan serve
```

2. In a separate terminal, compile and watch for asset changes
```bash
npm run dev
```

The application will be available at `http://localhost:8000`

## Features

- Task Management
- Calendar View
- ES Entry System

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
