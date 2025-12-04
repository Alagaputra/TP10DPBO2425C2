# TP10DPBO2425C2

/*saya Ajipati Alaga Putra dengan NIM 2409682
mengerjakan TP10 dalam mata kuliah DPBO
untuk keberkahannya maka saya tidak akan melakukan kecurangan
sepertu yang telah di spesifikasikan Aamiin.*/

# 🏋️ GYM MANAGEMENT SYSTEM (PHP + MVVM)

Sistem ini dibuat untuk mengelola data **Member, Pelatih, Paket Latihan, dan Jadwal Latihan** menggunakan arsitektur **MVVM (Model – View – ViewModel)** di PHP.

---

## 📌 Fitur Utama
- CRUD Member
- CRUD Pelatih
- CRUD Paket Latihan
- CRUD Jadwal Latihan
- Dashboard navigasi
- Routing halaman otomatis
- Pemisahan struktur folder sesuai arsitektur MVVM

---

## 🏛 Arsitektur Program — MVVM

```txt
███████████████████████████████████████████████████████████████████
│                          MVVM ARCHITECTURE                       │
│                                                                  │
│   [MODEL] <── menyimpan & query database ─────────────────────┐  │
│                                                                  │
│   Member.php                                                     │
│   Pelatih.php                                                    │
│   Paket.php                                                      │
│   Jadwal.php                                                     │
│                                                                  │
│                                                                  │
│                                  menerima request form           │
│   [VIEW] ── memegang UI & form ─────────────────────────────┐    │
│                                                                  │
│   member_list.php                                                │
│   member_form.php                                                │
│   pelatih_list.php                                               │
│   pelatih_form.php                                               │
│   paket_list.php                                                 │
│   paket_form.php                                                 │
│   jadwal_list.php                                                │
│   jadwal_form.php                                                │
│                                                                  │
│                                                                  │
│                     memvalidasi & menjalankan logika CRUD         │
│   [VIEWMODEL] ───────────────────────────────────────────────┐    │
│                                                                  │
│   MemberViewModel.php                                            │
│   PelatihViewModel.php                                           │
│   PaketLatihanViewModel.php                                      │
│   JadwalLatihanViewModel.php                                     │
│                                                                  │
│                                                                  │
│   index.php ⟶ sebagai router utama & action handler              │
│                                                                  │
███████████████████████████████████████████████████████████████████

███████████████████████████████████████████████████████████████████
│                           FLOW PROGRAM                           │
├───────────────────────────────────────────────────────────────────┤
│ ① User membuka `index.php`                                        │
│ ② Routing membaca parameter `page`                                │
│ ③ Menampilkan halaman List / Form                                │
│ ④ User menekan Submit Form                                       │
│ ⑤ index.php mendeteksi action (create/update/delete)             │
│ ⑥ ViewModel memproses data (validasi + logic)                    │
│ ⑦ Model melakukan query ke database                              │
│ ⑧ Redirect kembali ke halaman List                               │
├───────────────────────────────────────────────────────────────────┤
│ Alur CRUD contoh:                                                │
│     List → Form → Submit → ViewModel → Model → DB → Redirect     │
███████████████████████████████████████████████████████████████████

███████████████████████████████████████████████████████████████████
│                             ERD                                  │
│                                                                  │
│   MEMBER (1) ──────────────── (M) JADWAL LATIHAN                 │
│                                                                  │
│       MEMBER: id_member PK                                       │
│                nama                                              │
│                umur                                              │
│                alamat                                            │
│                                                                  │
│   PELATIH (1) ─────────────── (M) JADWAL LATIHAN                  │
│                                                                  │
│       PELATIH: id_pelatih PK                                     │
│                 nama                                             │
│                 spesialisasi                                     │
│                                                                  │
│   PAKET LATIHAN (1) ──────── (M) MEMBER                           │
│                                                                  │
│       PAKET: id_paket PK                                         │
│              nama_paket                                          │
│              harga                                               │
│                                                                  │
│   JADWAL LATIHAN: id_jadwal PK                                   │
│                    id_member FK                                  │
│                    id_pelatih FK                                 │
│                    tanggal_latihan                               │
│                    jam_latihan                                   │
███████████████████████████████████████████████████████████████████


##Dokumentasi

https://github.com/user-attachments/assets/9980058f-620c-4fc5-a6a5-804e52f5d7e5

