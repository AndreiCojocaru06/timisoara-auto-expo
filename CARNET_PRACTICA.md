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

**Ore lucrate:** 4h  
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

**Ore lucrate:** 4h  
**Faza:** 2 — Modelare date (continuare)  

### Ce am făcut
- Am creat modelele Eloquent: Category, Exhibitor, Car, CarImage
- Am definit relațiile între modele: hasMany, belongsTo
- Am adăugat câmpurile `$fillable` pentru fiecare model
- Am testat relațiile cu `php artisan tinker`

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
- Am creat Seeders: CategorySeeder, ExhibitorSeeder, CarSeeder
- Am configurat DatabaseSeeder să ruleze toate seeder-ele în ordine
- Am populat baza de date cu `php artisan db:seed`
- Am verificat datele cu Tinker: 6 categorii, 4 expozanți, 4 mașini

### Ce am învățat
- Ce sunt Seeders și cum populezi baza de date cu date de test
- Ordinea contează la seeders — trebuie să existe categorii și expozanți înainte de mașini
- Cum folosești `Str::slug()` pentru a genera slug-uri URL-friendly

### Probleme întâmpinate și rezolvări
- Nicio problemă majoră

---

## Săptămâna 2 — Ziua 3 — 21.05.2026

**Ore lucrate:** 5h  
**Faza:** 2 — Modelare date (continuare)  

### Ce am făcut
- Am studiat conceptul de Factory în Laravel
- Am creat UserFactory și am testat generarea de date false cu Faker
- Am documentat schema bazei de date în README.md
- Am desenat diagrama relațiilor între tabele
- Am studiat diferența dintre `migrate:fresh` și `migrate:refresh`

### Ce am învățat
- Cum funcționează Factories și Faker pentru generarea datelor de test
- Comenzi utile: `migrate:fresh --seed`, `migrate:rollback`
- Cum documentezi o schemă de baze de date

### Probleme întâmpinate și rezolvări
- Nicio problemă majoră

---

## Săptămâna 3 — Ziua 1 — 23.05.2026

**Ore lucrate:** 5h  
**Faza:** 3 — Frontend public  

### Ce am făcut
- Am instalat TailwindCSS și Alpine.js cu npm
- Am configurat Vite pentru compilarea assets-urilor
- Am adăugat Node.js în Dockerfile și rebuildat containerul
- Am studiat documentația TailwindCSS
- Am creat layout-ul principal al site-ului cu navbar și footer

### Ce am învățat
- Cum funcționează TailwindCSS utility-first
- Cum se configurează Vite cu Laravel
- Diferența dintre `npm run dev` și `npm run build`
- Cum structurezi un layout reutilizabil în Laravel

### Probleme întâmpinate și rezolvări
- Containerul PHP nu avea Node.js — rezolvat prin adăugarea în Dockerfile și rebuild

---

## Săptămâna 3 — Ziua 2 — 26.05.2026

**Ore lucrate:** 5h  
**Faza:** 3 — Frontend public (continuare)  

### Ce am făcut
- Am creat HomeController și view-ul homepage
- Am implementat secțiunile: hero banner, categorii, mașini featured, expozanți
- Am creat CarController cu lista mașini și pagina de detaliu
- Am implementat filtrare după categorie cu query string

### Ce am învățat
- Blade templating: @extends, @section, @yield, @foreach
- Cum funcționează rutele în Laravel: GET, POST, parametri dinamici
- Cum filtrezi query-uri cu `when()` în Eloquent
- Eager loading cu `with()` pentru a evita problema N+1

### Probleme întâmpinate și rezolvări
- Nicio problemă majoră

---

## Săptămâna 3 — Ziua 3 — 28.05.2026

**Ore lucrate:** 5h  
**Faza:** 3 — Frontend public (continuare)  

### Ce am făcut
- Am creat ExhibitorController cu lista expozanți și pagina de profil
- Am creat view-urile exhibitors/index.blade.php și exhibitors/show.blade.php
- Am implementat `withCount('cars')` pentru a afișa numărul de mașini per expozant
- Am creat ProgramController cu programul evenimentului pe 3 zile

### Ce am învățat
- Cum funcționează `withCount()` în Eloquent
- Cum afișezi date relaționale în Blade
- Cum construiești pagini de profil în Laravel

### Probleme întâmpinate și rezolvări
- Nicio problemă majoră

---

## Săptămâna 4 — Ziua 1 — 02.06.2026

**Ore lucrate:** 6h  
**Faza:** 3 — Frontend public (continuare)  

### Ce am făcut
- Am creat ContactController cu formularul de contact și validare
- Am creat view-urile program.blade.php și contact.blade.php
- Am configurat toate rutele în `web.php`
- Am testat toate paginile în browser
- Am rezolvat problema cu view-ul Program

### Ce am învățat
- Validare formulare cu `$request->validate()`
- Cum afișezi erori de validare în Blade cu `@error`
- Cum funcționează `session()->flash()` pentru mesaje de succes

### Probleme întâmpinate și rezolvări
- Pagina Program apărea albă — VS Code nu salva corect fișierele .blade.php
- Rezolvat prin rescrierea fișierului direct din terminal cu comanda `cat >`

---

## Săptămâna 4 — Ziua 2 — 04.06.2026

**Ore lucrate:** 6h  
**Faza:** 3 — Frontend public (continuare)  

### Ce am făcut
- Am rafinat design-ul tuturor paginilor
- Am verificat că site-ul e responsive pe mobil
- Am testat formularul de contact end-to-end
- Am verificat că datele din formular se salvează corect în baza de date
- Am făcut code review și curățat codul
- Am urcat tot codul pe GitHub cu commit-uri descriptive

### Ce am învățat
- Importanța testării manuale a fiecărei funcționalități
- Cum verifici datele salvate în DB cu Tinker
- Principii de responsive design cu TailwindCSS
- Bune practici pentru commit messages în Git

### Probleme întâmpinate și rezolvări
- Nicio problemă majoră