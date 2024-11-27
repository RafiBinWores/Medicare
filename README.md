# Medicare

**Medicare** is a web application that allows users to book doctors, ambulances, and find blood donors. It also provides a platform for doctors and ambulance service providers to register their services. Admins can approve these registrations to ensure only verified services are listed. Additionally, users can update their profile to become blood donors.

## Features

-   **Doctor Booking**: Users can search for and book appointments with registered doctors.
-   **Ambulance Booking**: Users can find and book ambulance services in their area.
-   **Blood Donor Finder**: Users can search for blood donors by blood type and location.
-   **Doctor & Ambulance Provider Registration**: Service providers can register on the platform. Their registrations are subject to admin approval.
-   **Blood Donor Registration**: After logging in, users can choose to become blood donors by updating their profile and checking the "Become a Donor" option.

## Getting Started

Follow these instructions to get a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

-   PHP (version >= 8.2)
-   MySQL database
-   Apache or Nginx web server
-   Composer (for dependency management)

### Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/RafiBinWores/Medicare.git
    cd medicare
    ```

2. Install dependencies:

    ```bash
    composer install
    ```

3. Set up the database:

    - Create a database in your MySQL database.
    - Rename `.env.example` to `.env` and update the database credentials.
    - Run migrations to set up the tables:
        ```bash
        php artisan migrate
        ```

4. Generate the application key:

    ```bash
    php artisan key:generate

    ```
    
5. Serve the application:

    ```bash
    php artisan serve
    ```

5. Generate the application key:

    ```bash
    php artisan key:generate

    ```

6. Access the application in your browser:
    ```
    http://localhost:8000
    ```

### Usage

1. **User Registration and Login**:

    - Users can register and log in to the system to access all features.

2. **Doctor & Ambulance Provider Registration**:

    - Service providers must register through the platform.
    - Admins can review and approve or reject their registration requests.

3. **Book Services**:

    - Once logged in, users can search for and book doctors or ambulance services.

4. **Blood Donor Registration**:
    - After logging in, users can update their profile to become a blood donor by checking the "Become a Donor" option.

## Admin Panel

-   Admins can log in to the admin panel to manage user registrations, approve or reject service provider requests, and manage the overall application settings.
-   Access the admin panel in your browse
    ```
    http://localhost:8000/admin/login
    ```
-   For adding an admin, you can either use Tinker or log in as a user and change your role from the database from 'user' to 'admin'.
-   If you want to use Tinker, here are the Tinker commands:
    ```bash
    php artisan tinker
    ```
    ```php
    $user = new User();
    $user->name = 'My Name';
    $user->email = 'email@example.com';
    $user->password = Hash::make('password');
    $user->role = ('admin');
    $user->save();
    ```
