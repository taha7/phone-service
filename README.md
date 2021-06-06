# Getting started

## Installation

Clone the repository

    git clone https://github.com/taha7/phone-service.git

Switch to the repo folder

    cd phone-service

Install all the dependencies using composer

    composer install

Install all the dependencies using npm

    npm install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Run the database seeder and you're done

    php artisan db:seed

Compile javascript files

    npm run dev
    
Start the local development server

    php artisan serve


You can now access the page at http://localhost:8000/phones
 
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan db:seed
    php artisan serve

    


## Folders


- `database/migrations` - Contains the migrations files to get started with this service.
- `database/seeds` - Seeder class to seed data into DB is here
- `app/Http/Controllers` - Contains The PhonesController
- `app/Models` - Contains 2 Models, one for customer and another one for the generated view
- `app/Filters` - The application filters are here for now we have 2 filters country and status
- `app/Traits` - Added a trait for any filterable model
