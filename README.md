## Installation
Clone the repo locally:

```sh
git clone https://github.com/rajeshdewle/square1-blog-assignment.git
```

Install PHP dependencies:

```sh
composer install
```

Setup configuration:

```sh
cp .env.example .env
```

Generate application key:

```sh
php artisan key:generate
```

Add database credentials in `.env` file.
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=my_blog
DB_USERNAME=root
DB_PASSWORD=
```

Run database migrations:

```sh
php artisan migrate
```

Install NPM dependencies:

```sh
npm install
```

Build assets:

```sh
npm run build
```

## Create an admin user
Create an admin user needs to run following command:
```sh
php artisan create:admin
```
It will show you confirmation message to create user manually. If you say yes then follow the instructions. Otherwise system create by default.
which is:
- **Username:** admin@admin.com
- **Password:** admin@123

## Import posts from the REST API
In this application we can auto import posts from [https://candidate-test.sq1.io/api.php](https://candidate-test.sq1.io/api.php) API.
Run the follwing command:

```sh
php artisan import:posts
```
It will auto import an every hour.

## Running tests
To run tests just run the following command.
```sh
php artisan test
```