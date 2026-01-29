# Connect JriDev - Portfolio Website

Welcome to the official repository for **Connect JriDev**, my personal portfolio website built with **Laravel 12**. This project showcases my skills, projects, and professional philosophy as a Web Developer & Designer.

## 🚀 About the Project

This application is designed to be a fast, responsive, and visually appealing showcase of my work. It features:
-   **Portfolio Showcase**: Displaying selected projects with images and descriptions.
-   **Admin Dashboard**: A secure backend to manage portfolio items and profile information.
-   **Modern UI/UX**: Built with Tailwind CSS and Alpine.js for a seamless user experience.

## 🛠 Tech Stack

-   **Framework**: [Laravel 12](https://laravel.com)
-   **Language**: PHP 8.2+
-   **Frontend**: Blade Templates, Tailwind CSS, Alpine.js
-   **Database**: MySQL
-   **Environment**: MAMP (Local Development)

## 📦 Installation

To run this project locally, follow these steps:

1.  **Clone the repository**
    ```bash
    git clone https://github.com/FAJRIAG/Laravel12_portofolio_project.git
    cd Laravel12_portofolio_project
    ```

2.  **Install PHP dependencies**
    ```bash
    composer install
    ```

3.  **Install Node.js dependencies**
    ```bash
    npm install
    ```

4.  **Configure Environment**
    Copy the example environment file and update your database credentials:
    ```bash
    cp .env.example .env
    ```
    Then, generate the application key:
    ```bash
    php artisan key:generate
    ```

5.  **Run Migrations**
    Set up your database tables:
    ```bash
    php artisan migrate
    ```

6.  **Start Development Server**
    Run the Laravel server and Vite build process:
    ```bash
    php artisan serve
    npm run dev
    ```
    Visit `http://localhost:8000` in your browser.

## 🤝 Contributing

This is a personal portfolio project, but suggestions and feedback are always welcome!

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---
&copy; 2026 JriDev. All rights reserved.
