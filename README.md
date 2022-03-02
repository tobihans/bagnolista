# Bagnolista

## Projet d'application de gestion d'emprunt de véhicules

## Membres:
- AVADEME Harold
- TOGNON Hans

### Requirements
- PHP 8.x
- Composer 2.x
- Node 14.x
- Yarn 1.22.x
- 
*Ou avec Laravel sail*
- docker-compose 
- Docker 

### Setup
```bash
composer install
yarn install
cp .env.example .env
./artisan key:generate
./artisan migrate
./artisan db:seed
yarn watch # Lance mix watch & srtisan serve en mm temps
# Or with Sail
./sail up -d
```

### Captures des pages developpées
- Accueil
![Home ShowCase](captures/home.gif)
![Home Capture 1](captures/home-1.png)
![Home Capture 2](captures/home-2.png)
