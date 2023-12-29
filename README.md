# Aquexpress Laravel Project

Welcome to the Aquexpress Laravel project! This repository contains the source code for the Aquexpress web application.

## Prerequisites

Before you begin, ensure you have the following installed on your local machine:

- [PHP](https://www.php.net/) (>= 7.4)
- [Composer](https://getcomposer.org/)
- [npm](https://www.npmjs.com/) or [Yarn](https://yarnpkg.com/) (for managing frontend dependencies)
- [MySQL](https://www.mysql.com/) or any other database of your choice

## Getting Started

1. **Clone the Repository:**

    ```bash
    git clone (https://github.com/rajafawady/aquexpress.git)
    ```

2. **Install Dependencies:**

    ```bash
    cd aquexpress
    composer install
    npm install # or yarn install
    ```

3. **Configure Environment:**

    - Copy the `.env.example` file to `.env`:

        ```bash
        cp .env.example .env
        ```

    - Configure the database and other environment variables in the `.env` file.

4. **Generate Application Key:**

    ```bash
    php artisan key:generate
    ```

5. **Run Migrations:**

    ```bash
    php artisan migrate
    ```

6. **Start the Development Server:**

    ```bash
    php artisan serve
    ```

    Your application will be accessible at `http://localhost:8000`.

7. **Compile Frontend Assets:**

    ```bash
    npm run dev # or yarn dev
    ```

## Additional Configuration

- For more advanced configuration options and customization, refer to the [Laravel Documentation](https://laravel.com/docs).

## Contributing

If you'd like to contribute to this project, please follow our [contribution guidelines](CONTRIBUTING.md).

## License

This project is licensed under the [MIT License](LICENSE).
