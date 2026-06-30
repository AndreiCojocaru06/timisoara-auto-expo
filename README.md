# Timisoara Auto Expo 2026

Site de prezentare pentru expozitia auto Timisoara Auto Expo 2026, construit cu Laravel 13, Docker si PostgreSQL ca proiect de practica.

## Tech Stack

- **Backend:** PHP 8.4, Laravel 13
- **Baza de date:** PostgreSQL 16
- **Frontend:** Blade, TailwindCSS, Alpine.js
- **Infrastructura:** Docker, Docker Compose, Nginx
- **Testare:** PHPUnit (31 teste)
- **Autentificare:** Laravel Breeze

## Functionalitati

### Site public
- Homepage cu mașini featured și expozanți
- Listă mașini cu filtrare după categorie și paginare
- Pagină de detaliu mașină cu specificații complete
- Listă expozanți cu pagini de profil individuale
- Program eveniment pe 3 zile
- Formular de contact cu validare

### Funcționalități avansate
- Căutare live (după brand, model, culoare, combustibil)
- Comparare mașini (până la 3 simultan, salvat în sesiune)
- Favorite (utilizatori autentificați pot salva mașini)

### Panou de administrare
- Autentificare securizată (Laravel Breeze + middleware custom)
- Dashboard cu statistici generale
- CRUD complet pentru mașini
- CRUD complet pentru expozanți
- Inbox mesaje de contact

## Instalare locală

### Cerinte
- Docker Desktop instalat și pornit

### Pași

```bash
git clone https://github.com/AndreiCojocaru06/timisoara-auto-expo.git
cd timisoara-auto-expo
docker compose up -d --build
docker compose exec app composer install
docker compose exec app php artisan migrate --seed
docker compose exec app npm install
docker compose exec app npm run build
```

Site-ul va fi disponibil la `http://localhost:8080`

### Cont admin de test
- Email: `admin@tae.ro`
- Parola: `admin123`

## Rulare teste

```bash
docker compose exec app php artisan test
```

31 de teste acoperă: pagini publice, CRUD mașini, formular contact, autentificare, securitate panou admin.

## Structura bazei de date

- `categories` - categorii mașini (SUV, Sedan, Electric, etc.)
- `exhibitors` - expozanți (dealeri auto)
- `cars` - mașini expuse, cu relații către category și exhibitor
- `car_images` - imagini per mașină
- `contacts` - mesaje primite prin formular
- `users` - utilizatori (admin și vizitatori autentificați)
- `car_user` - tabelă pivot pentru favorite

## Arhitectură
Browser -> Nginx -> PHP-FPM (Laravel) -> PostgreSQL

Trei containere Docker separate (app, nginx, db) comunicând printr-o rețea internă bridge.

## Autor

Andrei Cojocaru — student UVT, Facultatea de Informatică, Anul II
Proiect de practică realizat pentru MX Consulting SRL, sub îndrumarea tutorelui Ionuț Alexuc.
