# Job Portal

A Laravel-based job portal application for posting job listings and receiving candidate applications with CV attachments.

## Overview

This project provides a simple job board where employers can create and manage jobs, and authenticated users can apply by uploading a PDF CV. Applications trigger an email notification to the employer with the candidate details and a downloadable CV attachment.

## Key Features

- Job creation, editing, and deletion
- Public job listings and individual job pages
- Authenticated job application workflow
- CV upload in PDF format
- Email notifications for new applications
- Application details with applicant name, email, and job title
- Secure CV download route

## Technology Stack

- PHP 8.3
- Laravel 13
- Tailwind CSS / Vite for frontend assets
- MySQL / SQLite / any supported Laravel database
- Laravel Queue for email delivery
- Pest for testing

## Installation

1. Clone the repository:

```bash
git clone <repository-url>
cd job-portal
```

2. Install PHP dependencies:

```bash
composer install
```

3. Install JavaScript dependencies:

```bash
npm install
```

4. Copy the environment file and generate an app key:

```bash
cp .env.example .env
php artisan key:generate
```

5. Configure your database in `.env`.

6. Run database migrations:

```bash
php artisan migrate
```

7. Build frontend assets:

```bash
npm run build
```

8. Start the application locally:

```bash
php artisan serve
npm run dev
```

> For email testing, set `MAIL_MAILER=log` or configure a local mail driver in `.env`.

## Usage

- Visit `/register` to create a new user account.
- Employers can create job listings from `/jobs/create` once authenticated.
- Candidates can view job details on `/jobs/{job}` and apply using the upload form.
- Employers receive email notifications when an application is submitted.
- The application email includes a direct CV download button and attached PDF resume.

## Project Structure

- `app/Models` - Eloquent models for `Job`, `Employer`, `Application`, `User`, etc.
- `app/Http/Controllers` - Controller logic for jobs and applications.
- `app/Mail` - Mail classes for application and job notifications.
- `resources/views` - Blade templates, including email templates under `resources/views/mail`.
- `database/migrations` - Database schema definitions.

## Routes

Key routes in `routes/web.php`:

- `GET /jobs` - job listings
- `GET /jobs/{job}` - view a single job
- `POST /jobs/{job}/apply` - apply to a job
- `GET /applications/{application}/cv` - download the attached CV
- `GET /jobs/create` - create a new job (authenticated)

## Email and File Handling

- Applications are sent via queued email using `ApplicationSubmittedMail`.
- CV files are stored locally under `storage/app/cvs`.
- Employers can download CVs using a generated route link included in the email.



## Best Practices

- Keep environment secrets out of version control.
- Use `php artisan migrate` for schema changes.
- Store uploaded CVs securely and validate file uploads.
- Use queues for time-consuming tasks like email delivery.
- Keep mail templates simple and accessible.

## Notes

- Ensure the `storage` directory is writable.
- If you change mail routing, update the email templates and mail classes accordingly.
- For production deployment, configure a proper mail driver and queue worker.

---

## 🌐 Deployment & Live Demo

The application is fully deployed and running in a live production environment. You can access the microservice and interact with the production API using the following details:

- **Production API Base URL:** `https://job-portal-ctc4.onrender.com/`
- **Environment Status:** Active 🟢

<img width="1919" height="909" alt="image" src="https://github.com/user-attachments/assets/f778feb1-75da-4964-8757-7a3851605d5a" />
<img width="1919" height="910" alt="image" src="https://github.com/user-attachments/assets/06d9deb4-ba64-407c-add1-4ae2a7ce5eab" />

