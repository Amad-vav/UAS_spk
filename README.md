# 📊 SPK Pemilihan Influencer UMKM (Metode SAW)

Sistem Pendukung Keputusan (SPK) Pemilihan Influencer UMKM adalah aplikasi berbasis web yang dirancang untuk membantu pemilik UMKM menentukan influencer media promosi yang paling tepat dan optimal untuk campaign mereka menggunakan metode **SAW (Simple Additive Weighting)**.

---

## 🛠️ Tech Stack & Desain
- **Framework & Core**: Laravel, PHP (>= 8.3)
- **Database**: SQLite (sangat mudah digunakan secara lokal)
- **Desain UI/UX (IMK)**: 
  - **Aesthetic**: Perpaduan warna *Deep Emerald Green* (#097969) untuk Sidebar, *Soft Sage Green* (#F0F4F1) untuk Latar Belakang, dan *Warm Ochre/Gold* (#D4AF37) sebagai penanda Juara/VIP.
  - **Tipografi**: Font modern (Inter/Roboto) untuk antarmuka pengguna, dan Times New Roman (standar akademik) untuk tabel hasil analisis perhitungan.

---

## 🧮 Algoritma SAW & Kriteria Penilaian
Metode **Simple Additive Weighting (SAW)** sering dikenal sebagai metode penjumlahan terbobot. Sistem ini menilai influencer berdasarkan 5 kriteria utama berikut:

| Kode | Kriteria Penilaian | Jenis Atribut | Bobot Kriteria |
| :--- | :--- | :---: | :---: |
| **C1** | Engagement Rate | Benefit | 25% |
| **C2** | Jumlah Followers | Benefit | 20% |
| **C3** | Kesesuaian Niche | Benefit | 20% |
| **C4** | Biaya per Post | Cost | 20% |
| **C5** | Attitude & Profesionalisme | Benefit | 15% |

### Langkah Perhitungan SAW dalam Sistem:
1. **Normalisasi Matriks Keputusan**:
   - Jika atribut Benefit: $r_{ij} = \frac{x_{ij}}{\max(x_{ij})}$
   - Jika atribut Cost: $r_{ij} = \frac{\min(x_{ij})}{x_{ij}}$
2. **Perhitungan Preferensi ($V_i$)**:
   - $V_i = \sum_{j=1}^{n} (w_j \times r_{ij})$
3. **Perankingan**:
   - Influencer diurutkan berdasarkan nilai preferensi tertinggi ke terendah. Influencer dengan nilai $V_i$ terbesar menjadi rekomendasi utama.

---

## 📱 Fitur Utama
1. **Dashboard**: Statistik ringkas jumlah campaign aktif, influencer terdaftar, dan panduan penggunaan sistem.
2. **Manajemen Campaign**: CRUD Campaign dengan detail UMKM, tipe UMKM, dan nama proyek.
3. **Form Input Dinamis**: Formulir penginputan influencer dengan baris yang dapat ditambah atau dihapus secara dinamis di halaman web.
4. **Analisis Perhitungan SAW Otomatis**: Menyajikan 4 tabel akademik:
   - Matriks Keputusan Awal
   - Matriks Normalisasi
   - Nilai Preferensi & Ranking Akhir
   - Bobot Kriteria
5. **Rekomendasi Utama (Juara #1)**: Dekorasi khusus pada pemenang dengan badge "👑 Rekomendasi Utama", warna border emas (Warm Ochre), dan teks tebal untuk visual feedback yang jelas.
6. **VIP Feature Lock**: Metode WP (Weighted Product) dan AHP (Analytic Hierarchy Process) dikunci dengan modal notifikasi premium/VIP sebagai elemen interaksi manusia komputer (IMK).

---

## 🚀 Panduan Setup & Menjalankan Aplikasi Secara Lokal

Ikuti langkah-langkah di bawah ini untuk menjalankan aplikasi di komputer Anda:

### 1. Prasyarat (Prerequisites)
Pastikan Anda sudah menginstal:
- **PHP** (versi 8.3 atau yang lebih baru)
- **Composer** (untuk manajemen package PHP)
- **Node.js & NPM** (untuk frontend compilation)

### 2. Instalasi Dependensi & Setup Project
Buka terminal/command prompt di folder project `UAS_spk`, kemudian jalankan perintah berikut:

1. **Salin File Environment**:
   ```bash
   copy .env.example .env
   ```

2. **Instal Dependensi PHP**:
   ```bash
   composer install
   ```
   *(Atau gunakan `php composer.phar install` jika Anda menggunakan file phar lokal)*

3. **Generate Application Key**:
   ```bash
   php artisan key:generate
   ```

4. **Instal & Build Aset Frontend**:
   ```bash
   npm install
   npm run build
   ```

### 3. Migrasi Database & Seeder
Buat database SQLite kosong (atau Laravel akan menanyakannya secara otomatis saat migrasi dijalankan). Jalankan perintah berikut untuk membuat tabel dan mengisi data kriteria dasar serta campaign contoh:
```bash
php artisan migrate:fresh --seed
```

### 4. Menjalankan Server Development
Jalankan perintah berikut untuk mengaktifkan local server Laravel:
```bash
php artisan serve
```
Buka browser Anda dan akses aplikasi melalui tautan:
👉 **[http://localhost:8000](http://localhost:8000)**
