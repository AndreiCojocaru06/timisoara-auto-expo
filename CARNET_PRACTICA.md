# Carnet de Practică — Timișoara Auto Expo

**Student:** Andrei Cojocaru  
**Facultate:** UVT — Facultatea de Informatică  
**Tutore:** Ionuț Alexuc  
**Companie:** MX Consulting SRL  
**Perioadă:** Mai — Iulie 2026  
**Total ore:** 120h  

---

## Săptămâna 1 — Ziua 1 — 09.05.2026

**Ore lucrate:** 3h  
**Faza:** 1 — Setup & Docker  

### Ce am făcut
- Am instalat Docker Desktop pe macOS
- Am creat structura proiectului `timisoara-auto-expo`
- Am configurat `docker-compose.yml` cu 3 containere: PHP 8.4, Nginx, PostgreSQL 16
- Am creat `Dockerfile` pentru containerul aplicației
- Am configurat Nginx cu `default.conf`
- Am instalat Laravel 13 în container
- Am conectat Laravel la baza de date PostgreSQL
- Am rulat migrările inițiale
- Am creat cont GitHub și am urcat proiectul

### Ce am învățat
- Cum funcționează Docker Compose și comunicarea dintre containere
- Diferența dintre PHP-FPM și Nginx și cum lucrează împreună
- Cum se configurează Laravel pentru PostgreSQL în loc de SQLite
- Comenzi de bază Git: init, add, commit, push

### Probleme întâmpinate și rezolvări
- La instalarea Laravel, folderul nu era gol — rezolvat prin instalare în `/tmp` și copiere ulterioară
- Token GitHub necesar în loc de parolă pentru autentificare din terminal

---

## Săptămâna 1 — Ziua 2 — 09.05.2026

**Ore lucrate:** 3h  
**Faza:** 2 — Modelare date  

### Ce am făcut
- Am creat 5 migrări: categories, exhibitors, cars, car_images, contacts
- Am definit modelele Eloquent cu relații între ele
- Am creat Seeders cu date fictive (6 categorii, 4 expozanți, 4 mașini)
- Am rulat `php artisan db:seed` și verificat datele cu Tinker

### Ce am învățat
- Cum funcționează migrările în Laravel
- Relații Eloquent: hasMany, belongsTo
- Ce sunt Seeders și cum populezi baza de date cu date de test
- Cum verifici datele din DB cu `php artisan tinker`

### Probleme întâmpinate și rezolvări
- Nicio problemă majoră