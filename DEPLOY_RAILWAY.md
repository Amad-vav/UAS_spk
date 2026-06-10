# Deploy Gratis tanpa kartu kredit: Railway

Railway biasanya bisa digunakan tanpa kartu kredit dengan login GitHub, dan cocok untuk aplikasi Docker seperti Laravel.

Langkah:
1. Buka https://railway.app
2. Login dengan GitHub.
3. Klik `New Project`.
4. Pilih `Deploy from GitHub`.
5. Hubungkan repo `UAS_spk`.
6. Railway akan mendeteksi `Dockerfile` dan membangun image.
7. Isi environment variables jika perlu:
   - `APP_ENV=production`
   - `APP_DEBUG=false`

Jika Railway tidak otomatis mendeteksi Docker, gunakan konfigurasi manual:
- Build Command: kosong
- Start Command: `apache2-foreground`

Catatan:
- `Dockerfile` sudah disiapkan di repo.
- Railway akan membuat URL publik setelah deploy selesai.
- Untuk menjalankan migrasi, gunakan Railway Console atau SSH di antarmuka Railway.

Jika Anda mengalami error build, kirimkan pesan errornya dan saya bantu perbaiki.
