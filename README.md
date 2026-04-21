## About This Project

This project is a simple bicycle parts management website. Its features entails, dashboard that shows bike parts stock quantity divided based on categories and shows the top 5 lowest stock. It also implements simple seach and filter based on category, and brand name. Other than that it also features simple bikeparts CRUD, stock change with history.  

## Prerequisites 
- Composer 
- Node Package Manager (NPM) 
- Database services (MySQL, Postgre, etc)

## Installation
- Clone the repository using the following link
```bash
git clone https://github.com/FransiscusSuhargo/Technical_Test.git 
```
- Move inside the project directory  
```bash 
cd technical_test
```
- Install the laravel and node package requirements 
```bash 
composer install
npm install 
```
- Copy and paste .env-example and rename into .env 
- Edit the following database configuration inside .env 
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=technical_test
DB_USERNAME=root
DB_PASSWORD=
```
- Run migration and seeder 
```bash
php artisan migrate:fresh --seed
```

- Run front end 
```bash 
npm run dev
```

- Run back end in separate terminal 
```bash 
php artisan serve
```
- Visit the link
```bash
 http://localhost:8000
```

- Login with the following default account 
```bash
email: admin@example.com 
password: password 
```
## Assumption 
- This project assumes brand and category are separate entities in database, and to be manually added in a separate service.
- This project assumes the user always has admin role and able to register 

## Future Improvement 
- Given more time, and experience it would be nice to add bar chart to dashboard to visualize category stock count better 
- Instead of using base white color pallete, it would be better to use more user friendly and intuitive color, and make use of fontgraphy to highlight special text like input. 
