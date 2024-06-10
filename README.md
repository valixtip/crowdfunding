# Donation Platform Project

This project is a platform for collecting donations for various projects. Users can create projects, make donations, and add progress reports.

## Requirements

- PHP >= 8.0
- Composer
- Laravel >= 8.x
- MySQL

## Installation

1. Clone the repository to your local environment:
    ```bash
    git clone https://github.com/yourusername/yourproject.git
    ```

2. Navigate to the project directory:
    ```bash
    cd yourproject
    ```

3. Create an `.env` file based on `.env.example`:
    ```bash
    cp .env.example .env
    ```

4. Configure your database connection in the `.env` file.

5. Run the migrations to create the database tables:
    ```bash
    php artisan migrate
    ```

6. Start the server:
    ```bash
    php artisan serve
    ```

## Usage

### Creating a Project

1. Log in or register.
2. Navigate to the project creation page.
3. Fill out the project creation form, providing the title, description, and goal amount.
4. After creating the project, you can view it on the projects page.

### Making a Donation

1. Navigate to the project page.
2. Fill out the donation form.
3. After successfully making a donation, your amount will be added to the project's current balance.

### Adding a Report

1. Navigate to the project page.
2. If you are the author of the project, fill out the form to add a report.
3. After successfully adding a report, you will see it on the project page.

## Routes

- `GET /projects` - View the list of projects
- `GET /projects/{project}` - View a specific project
- `POST /projects` - Create a new project
- `POST /projects/{project}/donations` - Make a donation to a project
- `POST /projects/{project}/reports` - Add a report to a project (available only to the project author)

## Project Filtering

On the main page, you can filter projects by status (completed/incomplete) using the filter buttons.

## Contribution

You can contribute to the project by submitting a Pull Request. Please review the existing issues and suggestions for improvements before making a contribution.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
