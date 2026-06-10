# PowerShell helper to launch and deploy the app to Fly.io
# Prereqs: flyctl installed and authenticated

Param(
    [string]$AppName = "my-uas-spk"
)

# Check if app exists
$appList = flyctl apps list 2>$null
if ($LASTEXITCODE -ne 0) {
    Write-Host "Ensure you're logged in: flyctl auth login"
    exit 1
}

if (-not ($appList -match $AppName)) {
    Write-Host "Creating app '$AppName'..."
    flyctl launch --name $AppName --no-deploy
}

Write-Host "Deploying app '$AppName'..."
flyctl deploy

if ($LASTEXITCODE -eq 0) {
    Write-Host "Deploy successful. Run: flyctl open"
} else {
    Write-Host "Deploy failed. Check output above for errors." -ForegroundColor Red
}
