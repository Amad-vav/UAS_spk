Quick Fly.io deployment steps (free tier)

Prerequisites:
- Install `flyctl`: https://fly.io/docs/hands-on/install-flyctl/
- Have a Fly account and be logged in: `flyctl auth login`

Commands:

1. From project root (where `Dockerfile` is):

```bash
flyctl launch --name my-uas-spk --no-deploy
# Edit fly.toml if needed, then deploy:
flyctl deploy
```

Notes:
- The `Dockerfile` in this repo builds an Apache+PHP container.
- The first deploy will build the image locally and push it to Fly; Fly provides a small free allocation suitable for testing.
- If you want CI-based deploys, connect the Fly app to your GitHub repo from the Fly dashboard.

Local test using Docker Compose:

```bash
docker-compose up --build
# open http://localhost:8080
```

Sample `fly.toml` and PowerShell helper:

See `fly.toml` in repo root — it's configured to expose port 80/443 for Fly.

Use the PowerShell helper `deploy_fly.ps1` to launch and deploy:

```powershell
# from project root
.\deploy_fly.ps1 -AppName my-uas-spk
```

If you prefer manual commands:

```bash
flyctl auth login
flyctl launch --name my-uas-spk --no-deploy
flyctl deploy
flyctl open

Database & migrations (recommended):

- The container no longer runs migrations automatically. For safety, run migrations manually after deploy.

Run migrations on Fly (one-off) with SSH:

```bash
flyctl deploy
flyctl ssh console -a my-uas-spk -- php artisan migrate --force
flyctl ssh console -a my-uas-spk -- php artisan db:seed --force
```

Or run migrations during a release by setting `RUN_MIGRATIONS=true` for a one-time deploy (use with caution):

```bash
# set env for this release locally before deploy
flyctl secrets set RUN_MIGRATIONS=true
flyctl deploy
# then remove the secret or set it to false
flyctl secrets unset RUN_MIGRATIONS
```

For production, prefer a managed database (Postgres) and run migrations as a controlled release step rather than on container startup.
```
