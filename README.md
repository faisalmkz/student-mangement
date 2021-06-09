# student-management
## Assuming you've already installed on your machine: PHP (>= 7.0.0), Laravel, Composer and Node.js.

###### Clone the repository
```
git clone https://github.com/faisalmkz/student-mangement.git
```
###### Switch to the repo folder
```
cd student-mangement
```
###### Install all the dependencies using composer
```
composer install
npm install
```
###### create .env file and generate the application key

```
php artisan key:generate
```
###### build CSS and JS assets
```
npm run dev
```
###### Run the database migrations (Set the database connection in .env before migrating)
```
php artisan migrate
```
###### Run the database seeder
```
php artisan db:seed
```

###### Start the local development server
```
php artisan serve
```
###### You can now access the server at http://localhost:8000

###### Login with email and password

email : **admin@gmail.com**
password : **Admin@123**

