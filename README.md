## Development

Install `composer` and `nodejs` then using this below commands

1. Project Settings:
```
git clone https://github.com/phamhyta/HOMEPS
cd HOMEPS/HOMEPS
composer install
npm install 
cp .env.example .env
```
2. Update `.env` :

```
DB_CONNECTION=mysql          
DB_HOST=127.0.0.1            
DB_PORT=3306                 
DB_DATABASE=HOMEPS       
DB_USERNAME=root             
DB_PASSWORD=   
```
3. Generate key for the project:
```
php artisan key:generate
```
4. Create tables and sample data for the database:
```
php artisan migrate
php artisan db:seed
```
5. Start server:
```
npm run watch
php artisan serv
```
And then access to `http://localhost:{WEB_PORT}`

## Gitflow

### New feature development

-   Create a new branch from `develop` with name prefix `feature/{feature_description}`
-   Create a pull request to `develop` branch
-   Assign a PR to reviewer

### Bugs

-   Create a new branch from `main` with name prefix `bugs/{bugs_description}`
-   Create a pull request to `main` branch
-   Assign a PR to reviewer
