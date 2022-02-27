# Bagnolista

## Projet d'application de gestion de location de véhicules

### Requirements
- PHP 8.x
- Composer 2.x
- Node 14.x
- Yarn 1.22.x

In cases you do not satisfy the requirements, 
it's possible to run the application in Docker containers via Laravel Sail.

### Setup
```bash
composer install
yarn install
yarn dev
cp .env.example .env
./artisan key:generate
./artisan db:seed # Fill your dev DB with dummy data
./artisan serve # Starts the project locally
# Or with Sail
./sail up -d # ./sail is a symlink to vendor/bin/sail
```
