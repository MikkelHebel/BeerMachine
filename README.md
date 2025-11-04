# BeerMachine
> [!IMPORTANT]
> Husk at opdater `DB_PASSWORD=` i `.env` fil i /beer-app

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

For at fixe når db har problemer med volume:
```bash
docker compose down -v
```

> [!TIP]
> `entrypoint.sh` skriptet håndterer automatisk:
> - Opretter .env hvis den mangler
> - Composer dependencies (`composer install`)
> - Installere node dependencies (`npm install` & `npm run build`)
> - Generering af APP_KEY (`php artisan key:generate`)
> - Database migrations og seeding af databasen (`php artisan migrate` & `php artisan db:seed`)
