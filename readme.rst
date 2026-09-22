# SPK Pemilihan Laptop — Metode SAW

Aplikasi **Sistem Pendukung Keputusan (SPK) Pemilihan Laptop** berbasis web yang digunakan untuk membantu pengguna menentukan rekomendasi laptop berdasarkan beberapa kriteria menggunakan metode **Simple Additive Weighting (SAW)**.

Project ini dikembangkan menggunakan **CodeIgniter 3, PHP, dan MySQL**.

## ✨ Features

- Menampilkan daftar alternatif laptop
- Pengelolaan data laptop
- Pengelolaan kriteria dan bobot
- Perhitungan menggunakan metode **Simple Additive Weighting (SAW)**
- Normalisasi nilai setiap kriteria
- Perankingan alternatif laptop
- Menampilkan **5 laptop dengan peringkat teratas**
- Pencarian dan pengurutan data laptop
- Riwayat hasil rekomendasi
- Tampilan hasil rekomendasi berdasarkan nilai akhir

## 🎯 Criteria

Sistem menggunakan beberapa kriteria dalam proses penilaian laptop:

| Kriteria | Keterangan | Jenis |
|---|---|---|
| Harga | Harga laptop | Cost |
| Processor | Performa processor | Benefit |
| RAM | Kapasitas RAM | Benefit |
| SSD | Kapasitas penyimpanan | Benefit |
| Baterai | Kapasitas/daya tahan baterai | Benefit |
| Berat | Berat laptop | Cost |

Bobot masing-masing kriteria digunakan dalam proses perhitungan untuk menentukan nilai akhir setiap alternatif.

## 🧮 Metode SAW

Metode **Simple Additive Weighting (SAW)** dilakukan melalui beberapa tahapan:

1. Menentukan alternatif laptop.
2. Menentukan kriteria dan bobot.
3. Memberikan nilai pada setiap alternatif berdasarkan kriteria.
4. Melakukan normalisasi matriks keputusan.
5. Mengalikan nilai hasil normalisasi dengan bobot masing-masing kriteria.
6. Menjumlahkan seluruh nilai untuk mendapatkan nilai preferensi.
7. Melakukan perangkingan berdasarkan nilai preferensi.
8. Menampilkan laptop dengan peringkat tertinggi sebagai rekomendasi.

### Rumus Normalisasi

Untuk kriteria **Benefit**:

```text
Rij = Xij / Max(Xij)
```

Untuk kriteria **Cost**:

```text
Rij = Min(Xij) / Xij
```

Nilai akhir alternatif dihitung dengan:

```text
Vi = Σ(Wj × Rij)
```

Alternatif dengan nilai **Vi** yang lebih tinggi memiliki peringkat yang lebih tinggi.

## 🛠️ Tech Stack

- **PHP**
- **CodeIgniter 3**
- **MySQL**
- **HTML**
- **CSS**
- **JavaScript**
- **Bootstrap**

## 📊 Dataset

Dataset yang digunakan terdiri dari **50 alternatif laptop** yang dikumpulkan dari marketplace seperti Shopee dan Tokopedia.

Setiap laptop dinilai berdasarkan:

- Harga
- Processor
- RAM
- SSD
- Baterai
- Berat

