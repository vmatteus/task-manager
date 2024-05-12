## About Task Manager

This is my task manager 

[Specifics find here](https://github.com/dbspt/phptest)

## Setup

This project use laravel sail. [Please read this](https://laravel.com/docs/11.x/sail).

For the setup, fallow the steps  

1. Clone this repository: 
    ```
   $ git clone git@github.com:vmatteus/task-manager.git && cd task-manager
   ```
   
2. Copy file `.env.example` to `.env` The env `APP_PORT`, define what port the project use. Maybe need to change, if another program using this port.
    ```
   $ cp .env.example .env
   ```
3. For the first installation, for no local configuration, install using this command:
    ```dockerfile
    docker run --rm \
        -u "$(id -u):$(id -g)" \
        -v "$(pwd):/var/www/html" \
        -w /var/www/html \
        laravelsail/php83-composer:latest \
        composer install --ignore-platform-reqs
    ```
    This command run composer install and generate the vendors requirements.

4. After the Composer installation, run the up command: 
    ```
   $ ./vendor/bin/sail up -d
   ```
5. Run the migrations command: 
    ```
   $ ./vendor/bin/sail php artisan migrate
   ```
6. Install the modules from vue:
   ```
   ./vendor/bin/sail npm install
   ```
7. Run the vue client:
    ```
   ./vendor/bin/sail npm rum dev
   ```
8. The project is ready to access. https://localhost:8080 (this port is APP_PORT env).
