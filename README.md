# Job Application Tracker

Applicazione fullstack per gestire le candidature di lavoro, con backend Laravel e frontend React.

---

## Struttura del progetto

- `/backend` — API backend sviluppato con Laravel  
- `/frontend` — Interfaccia utente sviluppata con React  

---

## Requisiti

- PHP 8.1+  
- Composer  
- Node.js 16+  
- MySQL

---

## Setup

### Backend

1. Spostati nella cartella backend:

   ```bash
   cd backend
   ```

2. Installa le dipendenze PHP:

    ```bash
    composer install
    ```
3. Copia il file di ambiente e configura il database:

    ```bash
    cp .env.example .env
    ```

4. Genera la chiave dell’app:

    ```bash
    php artisan key:generate
    ```

5. Esegui le migration e i seeder:
    ```bash
    php artisan migrate --seed
    ```

6. Avvia il server di sviluppo:

    ```
    php artisan serve
    ```

### Frontend

1. Spostati nella cartella frontend:
    ```bash
    cd ../frontend
    ```

2. Installa le dipendenze npm:

    ```bash
    npm install
    ````

3. Avvia l’app React in modalità sviluppo:
    ```bash
    npm start
    ```

## Struttura database (modello dati)
- users — utenti dell’app
- companies — aziende a cui si applica
- statuses — stati della candidatura
- applications — candidature inserite
- reminders — promemoria associati alle candidature


### Contatti
Angelo Pili - https://www.linkedin.com/in/angelopili/