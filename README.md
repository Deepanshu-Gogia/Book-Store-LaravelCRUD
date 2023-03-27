# project

## Clone Repository
```
git clone https://github.com/your-username/your-project.git
```

### Set Path to your project
```
cd your-project
```

### Install the project dependencies using Composer
```
composer install
```

### Generate a new Laravel application key using the following command
```
php artisan key:generate
```

### Create a database for the project and update the DB_* variables in the .env file with your database credentials & Migrate the database tables using the following command
```
php artisan migrate
```

### Seed the database with sample data (optional)
```
php artisan db:seed
```

### To start the development server, run the following command:
```
php artisan serve
```

### To check Books list api please use postman:
```
http://localhost:8000/api/books
```
