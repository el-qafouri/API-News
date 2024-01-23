Laravel News API with Admin Panel <br>

git clone(project branch) <br>
composer install or composer update <br>
cp .env.example .env <br>
php artisan key:generate <br>
Set your database credentials in .env file <br>
php artisan migrate:fresh --seed <br>
php artisan storage:link <br>
npm install && npm run dev <br>
php artisan serve <br>
Visit localhost:8000/login in your browser <br>
Choose one email id from users table & Password is password or login with admin date: <br>
email: admin@admin.com <br>
password: secret <br>  <br>


## Used in the Project:<br>

- **Seeder:** Used for generating random and initial admin data in the database.<br>
- **HTTP Schedules:** Used for scheduling and executing on time.<br>
- **Breeze Package:** Used for implementing authentication and access control features.<br>
- **API for NewsApi:** Connection to NewsApi for fetching news.<br>
- **Jobs:** Using job skeletons for running processes.<br>

