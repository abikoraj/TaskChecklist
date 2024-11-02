# Task Checklist with Completion Status application

A simple task management application built with Laravel and Bootstrap 5. This app allows users to create, update, delete, and filter tasks, with real-time status updates and progress tracking.

## Features

- Add, edit, and delete tasks.
- Toggle task status with real-time updates to the progress bar.
- Confirmation alerts for delete actions.
- Filter tasks by status.
- Responsive layout and Bootstrap 5 styling.

## Requirements

- **PHP**: >= 8.1
- **Composer**: Latest version
- **Laravel**: 10.x (included in dependencies)
- **Node.js & npm**: For front-end dependencies (optional)
- **Database**: MySQL or compatible database
- **Web Server**: Apache/Nginx or Laravel's built-in server for local development

## Installation

### Step 1: Clone the Repository

```bash
git clone https://github.com/your-username/your-repo-name.git
cd your-repo-name


### Step 2: Install PHP Dependencies

Make sure you have Composer installed, then run:

```bash
composer install


### Step 3: Set Up Environment Variables

Copy the `.env.example` file to `.env` and update the necessary configurations for your environment:

```bash
cp .env.example .env


### Step 4: Generate Application Key

Run the following command to generate an application key. This key is used by Laravel to encrypt data and secure sessions.

```bash
php artisan key:generate


### Step 5: Run Database Migrations

Set up the necessary tables by running the database migrations:

```bash
php artisan migrate


### Step 6: Run the Application

You can now run the application using Laravel's built-in server:

```bash
php artisan serve

The application will be accessible at [http://localhost:8000](http://localhost:8000). Open this URL in your web browser to start using the Task Management Application.

