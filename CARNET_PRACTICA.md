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