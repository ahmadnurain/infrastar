# 🌟 InfraStar — Smart Infrastructure Reporting & AI-Driven Prioritization System

[![Laravel](https://img.shields.io/badge/Laravel-12.0-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![React](https://img.shields.io/badge/React-19.0-61DAFB?style=for-the-badge&logo=react&logoColor=black)](https://react.dev)
[![Inertia.js](https://img.shields.io/badge/Inertia.js-2.0-9553E9?style=for-the-badge&logo=inertia&logoColor=white)](https://inertiajs.com)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-v4.0-06B6D4?style=for-the-badge&logo=tailwindcss&logoColor=white)](https://tailwindcss.com)
[![Python Flask](https://img.shields.io/badge/Python_Flask-3.0-000000?style=for-the-badge&logo=flask&logoColor=white)](https://flask.palletsprojects.com)
[![TensorFlow / Keras](https://img.shields.io/badge/TensorFlow_Keras-2.x-FF6F00?style=for-the-badge&logo=tensorflow&logoColor=white)](https://tensorflow.org)
[![TypeScript](https://img.shields.io/badge/TypeScript-5.7-3178C6?style=for-the-badge&logo=typescript&logoColor=white)](https://www.typescriptlang.org)

**InfraStar** adalah platform pelaporan dan manajemen infrastruktur publik cerdas yang dirancang untuk mempercepat identifikasi, klasifikasi, dan penanganan kerusakan fasilitas umum (seperti jalan berlubang dan jembatan rusak). 

Sistem ini menggabungkan **Peta Geospasial Interaktif (Geo-tagging)** dengan **Kecerdasan Buatan (Machine Learning)** untuk mengklasifikasikan tipe kerusakan secara otomatis dari gambar serta menghitung **Skor Urgensi (Urgency Score)** secara real-time berdasarkan tingkat keparahan dan kerapatan laporan warga.

---

## 📌 Fitur Utama

- 📸 **AI-Powered Visual Classification**: Menggunakan model Deep Learning (MobileNetV2 CNN) untuk mendeteksi secara otomatis jenis kerusakan infrastruktur (`Jalan`, `Jembatan`) dari foto yang diunggah pelapor.
- 🎯 **Smart Urgency Score**: Algoritma cerdas yang menghitung skor prioritas perbaikan (skala 1-100) berdasarkan kombinasi tingkat keparahan fisik dan jumlah akumulasi laporan di koordinat geospasial yang sama.
- 🗺️ **Interactive Geo-Tagging**: Penandaan lokasi kerusakan secara presisi menggunakan peta interaktif berbasis Leaflet & OpenStreetMap.
- 📧 **Automated Mail Notification**: Pengiriman konfirmasi dan pembaruan status laporan secara otomatis ke email pelapor.
- 👥 **Role-Based Management**: Hak akses terpisah untuk Warga (Pelapor) dan Petugas / Admin Dinas Terkait.
- 📊 **Monitoring Dashboard**: Panel navigasi interaktif bagi Admin untuk memantau, memverifikasi, dan mengubah status penanganan laporan (*Menunggu*, *Dalam Proses*, *Selesai*).

---

## 🏗️ Arsitektur Sistem

```
[ Warga / User ] 
       │
       ▼ (Foto + Lokasi Lat/Long)
┌────────────────────────────────────────────────────────┐
│  Web Application (Laravel 12 + React 19 + Inertia.js) │
└──────────────────────────┬─────────────────────────────┘
                           │
             (Base64 Image + Report Count)
                           │
                           ▼
┌────────────────────────────────────────────────────────┐
│    Machine Learning Microservice (Python Flask API)    │
│  ├── Model 1: Damage Classifier (MobileNetV2 .h5)      │
│  └── Model 2: Urgency Predictor (Scikit-Learn .joblib)  │
└──────────────────────────┬─────────────────────────────┘
                           │
            (Prediction & Urgency Score)
                           │
                           ▼
┌────────────────────────────────────────────────────────┐
│     Database Storage & Email Dispatch (Mailables)     │
└──────────────────────────┬─────────────────────────────┘
```

---

## 🛠️ Teknologi & Stack

### Web Application (`/application`)
- **Backend Framework**: Laravel 12 (PHP 8.2+)
- **Frontend Framework**: React 19, Inertia.js v2, TypeScript
- **Styling & UI**: Tailwind CSS v4, Radix UI, Lucide Icons
- **Interactive Maps**: Leaflet.js & React-Leaflet
- **Autentikasi & Otorisasi**: Laravel Sanctum, Spatie Permission
- **Email Dispatcher**: Laravel Mail (SMTP / Log Driver)

### Machine Learning Service (`/machine-learning`)
- **API Server**: Flask (Python 3.10+) dengan Flask-CORS
- **Image Classification**: MobileNetV2 Transfer Learning (`model1.h5`)
- **Urgency Regression**: Scikit-Learn Model (`model2.joblib`)
- **Image Preprocessing**: Pillow (PIL), NumPy, Pandas

---

## 📁 Struktur Direktori

```
infrastar/
├── application/              # Aplikasi Utama (Laravel + React Inertia)
│   ├── app/                  # Controller, Models, Mailables, Middleware
│   ├── config/               # Konfigurasi Aplikasi & Service
│   ├── database/             # Migrasi & Seeder Database
│   ├── resources/            # React Pages (Inertia), Components, Styles
│   ├── routes/               # Web, API, Auth, & Settings Routes
│   ├── package.json          # Dependency Node.js / React
│   └── composer.json         # Dependency PHP / Laravel
│
└── machine-learning/         # Microservice Machine Learning (Python Flask)
    ├── apiml.py              # Server Flask REST API (/predict)
    ├── model1.h5             # Model TensorFlow CNN Klasifikasi Kerusakan
    ├── model2.joblib         # Model Scikit-Learn Prediksi Urgensi
    ├── class_names.json      # Label Kelas ("jalan", "jembatan")
    ├── model_1.ipynb         # Notebook Pelatihan Model 1 (CNN)
    ├── model_2.ipynb         # Notebook Pelatihan Model 2 (Urgensi)
    └── dataset/              # Datasets untuk Training & Validation
```

---

## 🚀 Panduan Instalasi & Penggunaan

### Prasyarat System:
- **PHP** >= 8.2
- **Composer** >= 2.x
- **Node.js** >= 18.x & NPM
- **Python** >= 3.10 & PIP

---

### Langkah 1: Jalankan Machine Learning API

1. Masuk ke direktori `machine-learning`:
   ```bash
   cd machine-learning
   ```

2. Buat dan aktifkan Virtual Environment (opsional):
   ```bash
   python -m venv venv
   # Windows:
   venv\Scripts\activate
   # Linux/macOS:
   source venv/bin/activate
   ```

3. Install dependensi Python:
   ```bash
   pip install flask flask-cors numpy pandas joblib pillow keras tensorflow scikit-learn
   ```

4. Jalankan Flask API Server (Port 5000):
   ```bash
   python apiml.py
   ```
   *Server ML akan berjalan di `http://localhost:5000`.*

---

### Langkah 2: Jalankan Web Application (Laravel + React)

1. Masuk ke direktori `application`:
   ```bash
   cd application
   ```

2. Install dependency PHP & Node.js:
   ```bash
   composer install
   npm install
   ```

3. Salin file lingkungan `.env`:
   ```bash
   cp .env.example .env
   ```

4. Generate App Key & Jalankan Migrasi Database:
   ```bash
   php artisan key:generate
   php artisan migrate --seed
   ```

5. Hubungkan Storage Link (untuk penyimpanan foto laporan):
   ```bash
   php artisan storage:link
   ```

6. Jalankan Server Aplikasi & Vite Compiler:
   ```bash
   npm run dev
   ```
   *Atau jika ingin menjalankan secara terpisah:*
   ```bash
   # Terminal 1
   php artisan serve

   # Terminal 2
   npm run dev
   ```

7. Buka browser dan akses aplikasi di: `http://localhost:8000`

---

## 🔌 API Reference (Machine Learning Service)

### `POST /predict`
Mengirimkan gambar infrastruktur yang rusak dan jumlah laporan serupa di lokasi tersebut untuk mendapatkan hasil klasifikasi dan skor urgensi.

#### Request Body (JSON):
```json
{
  "image_base64": "data:image/jpeg;base64,/9j/4AAQSkZJRg...",
  "num_similar_reports": 3
}
```

#### Response Success (200 OK):
```json
{
  "success": true,
  "message": "Prediction successful",
  "prediction_results": {
    "classification_result": "jalan",
    "confidence": 98,
    "Keparahan_Numerik": 2,
    "urgency_prediction": 85
  }
}
```

---

## 📄 Lisensi

Proyek ini dikembangkan untuk keperluan Hackathon dan dilisensikan di bawah [MIT License](LICENSE).
