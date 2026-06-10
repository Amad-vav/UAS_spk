# Deploy ke Render (opsi gratis dan lebih mudah)

Render dapat men-deploy aplikasi Docker langsung dari GitHub tanpa perlu `flyctl` atau token Fly.

1. Buat akun di https://render.com dan login.
2. Hubungkan akun GitHub Anda ke Render.
3. Pilih "New Web Service".
4. Pilih repository `UAS_spk`.
5. Pilih "Docker" sebagai Environment.
6. Untuk Service name, isi misalnya `uas-spk`.
7. Biarkan Build Command dan Start Command kosong jika Render mendeteksi `Dockerfile` dengan benar.
8. Deploy. Render akan membangun Docker image dari `Dockerfile`.

Catatan:
- `Dockerfile` sudah tersedia di repo dan menggunakan Apache + PHP.
- Jika diperlukan, jalankan migrasi manual di server setelah deploy.
- Ini adalah opsi yang paling mudah bila Anda tidak ingin mengelola token CLI.
