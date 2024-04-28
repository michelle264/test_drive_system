**git bash command to clone laravel project from Git Hub**
1. git clone https://github.com/michelle264/test_drive_system.git or manually download zip project
2. composer install
3.To make duplicate of .env.example:   cp .env.example .env
4. Make the DB_CONNECTION as mysql
5. Go to http://localhost/phpmyadmin/ and create a new database with same name stated in the DB_DATABASE in .env
6. php artisan key:generate
7. php artisan migrate
8. php artisan serve

In my Test Drive system, I have implemented registration for test drives, as well as registration and login functionality specifically for staff members.

Once a staff member registers and logs in, they gain access to various features, including lookup a customer to check for promotion eligibility, update the down payment amount and purchase status, and check the loan amount.
