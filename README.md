# BeerMachine
> [!IMPORTANT]
> Husk at opdater `.env` fil i /beer-app
> `DB_HOST=db`
> `DB_USERNAME=postgres`
> `DB_PASSWORD=` står i docker-compose.yaml filen

## Setup
**Byg Docker containerne:**
Kør i project root:
```bash
docker compose build
```

For at kører containerne i baggrunden:
```bash
docker compose up -d
```

Åbn applicationen på http://localhost:8000


> [!TIP]
> Andre brugbare commands
For at se logs i realtid:
```bash
docker compose logs -f web
```

Hvis du laver ændringer i `.env`, skal du genstarte web-containeren:
```bash
docker compose restart web
```

For at få shell på en container:
```bash
docker compose exec db bash
```

> [!TIP]
> `entrypoint.sh` skriptet håndterer automatisk:
> - Opretter .env hvis den mangler
> - Composer dependencies (`composer install`)
> - Installere node dependencies (`npm install` & `npm run build`)
> - Generering af APP_KEY (`php artisan key:generate`)
> - Database migrations (`php artisan migrate --force`)
