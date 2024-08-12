
# Currency Management System !!

## Overview
This project is a Currency Exchange Management System designed to allow users to manage their financial records and exchange rates. Users can add, update, and delete their exchange rates and amounts, as well as view their financial records in an organized manner.
## Description

The Currency Exchange Management System provides a user-friendly dashboard where users can:
- Add, view, update, and delete exchange rates for different currencies.
- Manage their financial records, including adding new amounts and viewing them with their respective exchange rates.
- Ensure that all data is kept private and accessible only to the user who created it.

## Solution Overview

- **User Dashboard:** Allows users to interact with their exchange rates and financial records.
- **Exchange Rates Management:** Users can manually add, update, and delete exchange rates from a configuration file.
- **Financial Records Management:** Users can manage their financial records, including adding, updating, and deleting amounts.

## Features

- **Add New Exchange Rates:** Users can add new exchange rates through their dashboard.
- **Update Existing Exchange Rates:** Users can update existing exchange rates.
- **Delete Exchange Rates:** Users can remove exchange rates that are no longer needed.
- **View Exchange Rates:** Users can view all configured exchange rates.
- **Add New Financial Records:** Users can add new financial amounts and associate them with a currency.
- **Update Financial Records:** Users can update existing financial records.
- **Delete Financial Records:** Users can delete financial records.
- **View Financial Records:** Users can view a list of all their financial records with calculated exchange values.

## Backend Highlights

- **Configuration-Based Exchange Rates:** Exchange rates are stored in a configuration file (`config/exchangeRates.php`) which is not tracked in GitHub to protect sensitive data.
- **Database Management:** Financial records are managed through a database, allowing CRUD (Create, Read, Update, Delete) operations.
- **Dynamic File Creation:** The application dynamically creates the `exchangeRates.php` file with default values if it does not exist.
- **Authorization:** Basic checks are implemented to ensure users can only modify their own records.
## Technical Choices

- **Laravel Framework**
- **Configuration File for Exchange Rates**
- **Blade Templating Engine**
- **jQuery for JavaScript Functionality**
- **Git for Version Control**
- **Database Management**
- **Security and Authorization**
## How to Run the Program
1. Clone the repository.
   ```bash
   git clone https://github.com/HebaElshamy/Currency-Exchange-Manager.git

   ```
 2. Install project dependencies using Composer:
    ```bash
     composer install
    ```
3. Copy the .env.example file and rename it to .env:
   ```bash
    cp .env.example .env
   ```
4. Generate the application key:
   ```bash
    php artisan key:generate
5. Configure the .env file with your database connection details
6.  Install Dependencies
    ```bash
    npm install
    ```
     ```bash
    npm run dev
    ```
8. Run the database migrations to create tables:
    ```bash
    php artisan migrate
9. Populate the database with the required data.
    ```bash
    php artisan db:seed --class=UsersTableSeeder
10. Start the local server:
    ```bash
    php artisan serve    
    
11. Open the project in the browser at http://localhost:8000
   or http://localhost/Currency-Exchange-Manager/public/
12. To login as an user, use the following credentials:
    
    - Email: user1@example.com
    - Password: 123456789
    - Email: user2@example.com
    - Password: 123456789
13. Enjoy your experience!
## Interview Task Link
https://github.com/HebaElshamy/Currency-Exchange-Manager/blob/main/task.todo

![Screenshot (16)](https://github.com/user-attachments/assets/84f60079-ba17-4981-b54a-fc41fa300b28)

![Screenshot (17)](https://github.com/user-attachments/assets/15ea677c-ace4-44e9-b460-1ae934749605)

![Screenshot (18)](https://github.com/user-attachments/assets/d8f135fe-a316-4d6d-a742-a00d51097408)

![Screenshot (19)](https://github.com/user-attachments/assets/d563d62f-e9a1-4dbc-ad08-1a2eb94b5aab)

![Screenshot (20)](https://github.com/user-attachments/assets/cbd9e750-0485-4925-9db6-e112abc1039b)














