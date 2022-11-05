
# Todo Planner

This application calculates and presents how much effort the developers should spend for each job.


## Intallation

1. Clone project

```bash
  git clone git@github.com:sewox/todo.git
```
2. Prepare .env
```bash
  cp .env.example .env
```
3. Install Composer
```bash
  composer install
```
3. Generate KEY
```bash
  php artisan key:generate 
```
4. Run migrations to fill the database
```bash
  php artisan migrate:fresh --seed
```
5. Import Tasks List
```bash
  php artisan import:provider --provider FirstProvider
  php artisan import:provider --provider SecondProvider 
```
5. Run Project
```bash
  php artisan serve
```
## Environment Variables

To run this project, you will need to add the following environment variables to your .env file

`DB_CONNECTION=mysql`

`DB_HOST=127.0.0.1`

`DB_PORT=3306`

`DB_DATABASE=todoplanner`

`DB_USERNAME=YourDBUser`

`DB_PASSWORD=YourDBPass`

`DB_ROOT_PASSWORD=YourDBRootPass`
## URL

Follow this URL : http://127.0.0.1:8000/
