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

Demo: [http://bagnolista.herokuapp.com](http://bagnolista.herokuapp.com/login)

**Compte Lambda:**

*User:* brenner@example.net

*Password:* password

### Captures des pages developpées

- Accueil
  ![Home Capture 1](captures/home-1.png)
  ![Home Capture 2](captures/home-2.png)
  ![Home Capture 3](captures/home-3.png)

- Login & Inscription
  ![Login](captures/login.png)
  ![Signup](captures/signup.png)

- Admin Dashboard
  ![Admin DashBoard 1](captures/dash1.png)
  ![Admin DashBoard 1](captures/dash2.png)
  ![Admin DashBoard 1](captures/dash3.png)
- Liste des vehicules (admin)
    ![Car List](captures/carlist.png)
- Liste des reservations (admin)
    ![Resa List](captures/list-resas.png)
- Ajout de voitures (admin)
    ![New Car 1](captures/newcar1.png)
    ![New Car 1](captures/newcar2.png)

- Page de details d'une voiture
    ![Car View 1](captures/car-view1.png)
    ![Car View 2](captures/car-view2.png)
    ![Car View 3](captures/car-view3.png)

- Mise a jour de voiture
    ![Update Car](captures/update-delete-car.png)

- HomePage Utilisateur
    ![User Homepage](captures/home-lambda-user.png)
- Liste des voitures reservees (user lambda)
    ![List Resas](captures/list-reserved-cars.png)
- Formulaire de reservation de voiture
    ![Resa Form](captures/resa-form.png)
- Notification de la reservation
    ![Resa Notif](captures/confirmation-resa.png)
