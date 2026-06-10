# Deploy Gratis ke Replit (tanpa kartu kredit)

Replit adalah cara gratis dan mudah untuk menjalankan aplikasi PHP/Laravel kecil. Anda tidak perlu memasang `flyctl`, `railway`, atau kartu kredit.

Langkah:
1. Buka https://replit.com
2. Login dengan GitHub akun Anda.
3. Klik `Create` → `Import from GitHub`.
4. Tempel URL repo Anda atau pilih repo `UAS_spk`.
5. Replit akan membuka proyek. Jika diminta, pastikan file `.replit` tersedia.
6. Tekan tombol `Run`.

Replit akan menjalankan `run.sh` dan membuka server Laravel di port yang diberikan. Jika tidak otomatis:
- Pastikan file `run.sh` executable.
- Pastikan `.replit` berisi `run = "bash run.sh"`.

Catatan:
- Database SQLite akan tersimpan di workspace Replit.
- Aplikasi akan tidur saat tidak digunakan, tapi ini gratis dan tanpa kartu kredit.
- Jika Anda melihat error, kirimkan log Replit agar saya bantu perbaiki.
