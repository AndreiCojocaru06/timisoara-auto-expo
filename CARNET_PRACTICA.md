# Carnet de Practică — Timișoara Auto Expo

**Student:** Andrei Cojocaru  
**Facultate:** UVT — Facultatea de Informatică  
**Tutore:** Ionuț Alexuc  
**Companie:** MX Consulting SRL  
**Perioadă:** Mai — Iulie 2026  
**Total ore:** 120h  

---

## Săptămâna 1 — Ziua 1 — 09.05.2026

**Ore lucrate:** 4h  
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

## Săptămâna 1 — Ziua 2 — 12.05.2026

**Ore lucrate:** 4h  
**Faza:** 1 — Setup & Docker (continuare)  

### Ce am făcut
- Am studiat structura unui proiect Laravel 13
- Am explorat fișierele de configurare: `config/database.php`, `config/app.php`
- Am testat conexiunea la PostgreSQL cu `php artisan tinker`
- Am scris primul `README.md` cu descrierea proiectului și instrucțiuni de instalare
- Am făcut cunoștință cu structura MVC în Laravel

### Ce am învățat
- Structura folderelor într-un proiect Laravel: app, config, database, resources, routes
- Cum funcționează fișierul `.env` și de ce nu se urcă pe GitHub
- Conceptul de MVC (Model-View-Controller)

### Probleme întâmpinate și rezolvări
- Nicio problemă majoră

---

## Săptămâna 1 — Ziua 3 — 14.05.2026

**Ore lucrate:** 5h  
**Faza:** 1 — Setup & Docker (continuare)  

### Ce am făcut
- Am studiat documentația oficială Laravel 13
- Am înțeles ciclul de viață al unui request HTTP în Laravel
- Am explorat serviciile din `bootstrap/app.php`
- Am configurat `.gitignore` corect pentru proiect
- Am testat că `docker compose down` și `docker compose up` repornesc totul corect

### Ce am învățat
- Ciclul de viață al unui request: index.php → Kernel → Router → Controller → Response
- De ce `.env` și `vendor/` nu se urcă pe GitHub
- Cum funcționează Service Providers în Laravel

### Probleme întâmpinate și rezolvări
- Nicio problemă majoră

---

## Săptămâna 1 — Ziua 4 — 15.05.2026

**Ore lucrate:** 5h  
**Faza:** 2 — Modelare date  

### Ce am făcut
- Am proiectat schema bazei de date pe hârtie înainte de cod
- Am creat 5 migrări: categories, exhibitors, cars, car_images, contacts
- Am definit câmpurile și tipurile de date pentru fiecare tabelă
- Am definit cheile străine și relațiile între tabele
- Am rulat `php artisan migrate` cu succes

### Ce am învățat
- Cum funcționează migrările în Laravel
- Tipuri de câmpuri în Schema Builder: string, text, integer, decimal, boolean, foreignId
- Cum se definesc relații între tabele cu chei străine
- Importanța planificării schemei înainte de implementare

### Probleme întâmpinate și rezolvări
- Nicio problemă majoră

---

## Săptămâna 2 — Ziua 1 — 16.05.2026

**Ore lucrate:** 5h  
**Faza:** 2 — Modelare date (continuare)  

### Ce am făcut
- Am creat modelele Eloquent: Category, Exhibitor, Car, CarImage
- Am definit relațiile între modele: hasMany, belongsTo
- Am adăugat câmpurile `$fillable` pentru fiecare model
- Am testat relațiile cu `php artisan tinker`
- Am creat Seeders: CategorySeeder, ExhibitorSeeder, CarSeeder

### Ce am învățat
- Relații Eloquent: hasMany, belongsTo
- Ce este `$fillable` și de ce e important pentru securitate (Mass Assignment)
- Cum interoghezi relații cu Eloquent: `Car::with('category', 'exhibitor')->get()`

### Probleme întâmpinate și rezolvări
- Nicio problemă majoră

---

## Săptămâna 2 — Ziua 2 — 19.05.2026

**Ore lucrate:** 4h  
**Faza:** 2 — Modelare date (continuare)  

### Ce am făcut
- Am configurat DatabaseSeeder să ruleze toate seeder-ele în ordine
- Am populat baza de date cu `php artisan db:seed`
- Am verificat datele cu Tinker: 6 categorii, 4 expozanți, 4 mașini
- Am documentat schema bazei de date în README.md

### Ce am învățat
- Ce sunt Seeders și cum populezi baza de date cu date de test
- Ordinea contează la seeders — trebuie să existe categorii și expozanți înainte de mașini
- Cum folosești `Str::slug()` pentru a genera slug-uri URL-friendly
- Cum documentezi o schemă de baze de date

### Probleme întâmpinate și rezolvări
- Nicio problemă majoră

---

## Săptămâna 2 — Ziua 3 — 21.05.2026

**Ore lucrate:** 6h  
**Faza:** 3 — Frontend public  

### Ce am făcut
- Am instalat TailwindCSS și Alpine.js cu npm
- Am configurat Vite pentru compilarea assets-urilor
- Am adăugat Node.js în Dockerfile și rebuildat containerul
- Am creat layout-ul principal al site-ului cu navbar și footer
- Am creat HomeController și view-ul homepage cu hero banner, categorii, mașini featured

### Ce am învățat
- Cum funcționează TailwindCSS utility-first
- Cum se configurează Vite cu Laravel
- Diferența dintre `npm run dev` și `npm run build`
- Blade templating: @extends, @section, @yield

### Probleme întâmpinate și rezolvări
- Containerul PHP nu avea Node.js — rezolvat prin adăugarea în Dockerfile și rebuild

---

## Săptămâna 3 — Ziua 1 — 23.05.2026

**Ore lucrate:** 6h  
**Faza:** 3 — Frontend public (continuare)  

### Ce am făcut
- Am creat CarController cu lista mașini și pagina de detaliu
- Am implementat filtrare după categorie cu query string
- Am creat view-urile cars/index.blade.php și cars/show.blade.php
- Am implementat paginare cu `paginate(12)`

### Ce am învățat
- Cum funcționează rutele în Laravel: GET, POST, parametri dinamici
- Cum filtrezi query-uri cu `when()` în Eloquent
- Eager loading cu `with()` pentru a evita problema N+1
- Cum funcționează paginarea în Laravel

### Probleme întâmpinate și rezolvări
- Nicio problemă majoră

---

## Săptămâna 3 — Ziua 2 — 26.05.2026

**Ore lucrate:** 6h  
**Faza:** 3 — Frontend public (continuare)  

### Ce am făcut
- Am creat ExhibitorController cu lista expozanți și pagina de profil
- Am creat view-urile exhibitors/index.blade.php și exhibitors/show.blade.php
- Am implementat `withCount('cars')` pentru numărul de mașini per expozant
- Am creat ProgramController cu programul evenimentului pe 3 zile

### Ce am învățat
- Cum funcționează `withCount()` în Eloquent
- Cum afișezi date relaționale în Blade
- Cum construiești pagini de profil în Laravel

### Probleme întâmpinate și rezolvări
- Nicio problemă majoră

---

## Săptămâna 3 — Ziua 3 — 28.05.2026

**Ore lucrate:** 6h  
**Faza:** 3 — Frontend public (continuare)  

### Ce am făcut
- Am creat ContactController cu formularul de contact și validare
- Am creat view-urile program.blade.php și contact.blade.php
- Am configurat toate rutele în `web.php`
- Am testat toate paginile în browser

### Ce am învățat
- Validare formulare cu `$request->validate()`
- Cum afișezi erori de validare în Blade cu `@error`
- Cum funcționează `session()->flash()` pentru mesaje de succes

### Probleme întâmpinate și rezolvări
- Pagina Program apărea albă — VS Code nu salva corect fișierele .blade.php
- Rezolvat prin rescrierea fișierului direct din terminal cu comanda `cat >`

---

## Săptămâna 4 — Ziua 1 — 02.06.2026

**Ore lucrate:** 6h  
**Faza:** 3 — Frontend public (continuare)  

### Ce am făcut
- Am rafinat design-ul tuturor paginilor
- Am verificat că site-ul e responsive pe mobil
- Am testat formularul de contact end-to-end
- Am optimizat query-urile Eloquent
- Am urcat tot codul pe GitHub cu commit-uri descriptive

### Ce am învățat
- Importanța testării manuale a fiecărei funcționalități
- Cum verifici datele salvate în DB cu Tinker
- Principii de responsive design cu TailwindCSS
- Bune practici pentru commit messages în Git

### Probleme întâmpinate și rezolvări
- Nicio problemă majoră

---

## Săptămâna 5 — Ziua 1 — 09.06.2026

**Ore lucrate:** 5h  
**Faza:** 4 — Admin Panel  

### Ce am făcut
- Am instalat Laravel Breeze pentru autentificare
- Am creat userul admin în baza de date cu `php artisan tinker`
- Am creat și configurat AdminMiddleware pentru protecția rutelor
- Am înregistrat middleware-ul în `bootstrap/app.php`
- Am creat rutele admin grupate cu prefix și middleware

### Ce am învățat
- Cum funcționează autentificarea în Laravel cu Breeze
- Ce este un Middleware și cum protejezi rutele
- Cum grupezi rutele cu prefix și middleware în `web.php`

### Probleme întâmpinate și rezolvări
- bootstrap.js lipsea după instalarea Breeze — rezolvat manual prin creare și instalare axios

---

## Săptămâna 5 — Ziua 2 — 11.06.2026

**Ore lucrate:** 5h  
**Faza:** 4 — Admin Panel (continuare)  

### Ce am făcut
- Am creat DashboardController cu statistici: mașini, expozanți, categorii, mesaje
- Am creat Admin CarController cu CRUD complet
- Am creat formulare create și edit pentru mașini
- Am creat layout-ul admin cu sidebar și navigare

### Ce am învățat
- Cum structurezi controllere în subfoldere: `Admin/CarController`
- CRUD complet: Create, Read, Update, Delete
- Cum folosești `@method('PUT')` și `@method('DELETE')` în formulare Blade

### Probleme întâmpinate și rezolvări
- Nicio problemă majoră

---

## Săptămâna 5 — Ziua 3 — 13.06.2026

**Ore lucrate:** 5h  
**Faza:** 4 — Admin Panel (continuare)  

### Ce am făcut
- Am creat Admin ExhibitorController cu CRUD complet
- Am creat formulare create și edit pentru expozanți
- Am creat Admin ContactController pentru inbox mesaje
- Am creat view-urile admin pentru expozanți și contacte

### Ce am învățat
- Cum construiești un layout admin cu sidebar în Blade
- Cum afișezi mesaje flash de succes după acțiuni CRUD
- Cum marchezi mesajele ca citite automat la vizualizare

### Probleme întâmpinate și rezolvări
- Modelul Contact lipsea — rezolvat cu `php artisan make:model Contact`

---

## Săptămâna 6 — Ziua 1 — 16.06.2026

**Ore lucrate:** 5h  
**Faza:** 4 — Admin Panel (continuare)  

### Ce am făcut
- Am testat toate funcționalitățile CRUD din panoul admin
- Am adăugat o mașină nouă din admin și am verificat că apare pe site
- Am editat și șters mașini din admin
- Am testat inbox-ul de mesaje
- Am rafinat design-ul panoului de administrare

### Ce am învățat
- Importanța testării end-to-end a funcționalităților
- Cum verifici că datele se propagă corect între admin și site-ul public
- Debugging în Laravel cu mesaje de eroare descriptive

### Probleme întâmpinate și rezolvări
- Nicio problemă majoră

---

## Săptămâna 6 — Ziua 2 — 18.06.2026

**Ore lucrate:** 5h  
**Faza:** 4 — Admin Panel (continuare)  

### Ce am făcut
- Am securizat toate rutele admin cu middleware auth și admin
- Am testat că un utilizator neautentificat nu poate accesa `/admin`
- Am verificat că logout funcționează corect
- Am urcat tot codul pe GitHub cu commit-uri descriptive
- Am actualizat README.md cu instrucțiuni pentru admin panel

### Ce am învățat
- Cum testezi securitatea rutelor în Laravel
- Importanța protejării rutelor sensibile cu middleware
- Bune practici de documentare pentru panouri de administrare

### Probleme întâmpinate și rezolvări
- Nicio problemă majoră