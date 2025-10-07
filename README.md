# BeerMachine
> [!IMPORTANT]
> Husk at have en `.env` fil i /beer-app

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

Når containerne er oppe skal du oprette tabellerne i PostgreSQL:
```bash
docker compose exec web php artisan migrate
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